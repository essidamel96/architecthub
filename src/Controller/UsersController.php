<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($id == null) {
            $id = $this->Auth->user('user_id');
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $id = $this->Auth->user('user_id');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $id = $this->Auth->user('user_id');
        $this->request->allowMethod(['post', 'delete']); //Définit les méthodes HTTP autorisées, si cela ne correspond pas, une exception MethodNotAllowedException sera lancée
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //connexion
    public function login() 
    {
        if ($this->request->is('post'))
         { 
             $user = $this->Auth->identify(); //connecter un utilisateur en utilisant les clés fournies dans la requête
             pr($user); 
             if ($user)
               { 
                   $this->Auth->setUser($user); //connecter l’utilisateur et sauvegarder ces infos
                   return $this->redirect($this->Auth->redirectUrl()); 
                }
                 $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
          }
        
      }

   //déconnexion
    public function logout()
    {
         $this->Flash->success('Vous êtes maintenant déconnecté.'); 
         return $this->redirect($this->Auth->logout());
    }

    public function initialize()
    {
         parent::initialize();
        // Ajoute l'action 'add' à la liste des actions autorisées.
         $this->Auth->allow(['logout', 'add']);
         $this->Auth->deny(['view']);
    }


}
