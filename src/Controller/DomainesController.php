<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Domaines Controller
 *
 * @property \App\Model\Table\DomainesTable $Domaines
 *
 * @method \App\Model\Entity\Domaine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DomainesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentDomaines']
        ];
        $domaines = $this->paginate($this->Domaines);

        $this->set(compact('domaines'));
    }

    /**
     * View method
     *
     * @param string|null $id Domaine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $domaine = $this->Domaines->get($id, [
            'contain' => ['ParentDomaines', 'ChildDomaines']
        ]);

        $this->set('domaine', $domaine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $domaine = $this->Domaines->newEntity();
        if ($this->request->is('post')) {
            $domaine = $this->Domaines->patchEntity($domaine, $this->request->getData());
            if ($this->Domaines->save($domaine)) {
                $this->Flash->success(__('The domaine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domaine could not be saved. Please, try again.'));
        }
        $parentDomaines = $this->Domaines->ParentDomaines->find('list', ['limit' => 200]);
        $this->set(compact('domaine', 'parentDomaines'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Domaine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $domaine = $this->Domaines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $domaine = $this->Domaines->patchEntity($domaine, $this->request->getData());
            if ($this->Domaines->save($domaine)) {
                $this->Flash->success(__('The domaine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domaine could not be saved. Please, try again.'));
        }
        $parentDomaines = $this->Domaines->ParentDomaines->find('list', ['limit' => 200]);
        $this->set(compact('domaine', 'parentDomaines'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Domaine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $domaine = $this->Domaines->get($id);
        if ($this->Domaines->delete($domaine)) {
            $this->Flash->success(__('The domaine has been deleted.'));
        } else {
            $this->Flash->error(__('The domaine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
