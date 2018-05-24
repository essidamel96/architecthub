<?php
// src/Controller/PostsController.php

namespace App\Controller;

use App\Controller\AppController;
    
use Cake\Network\Exception\NotFoundException;

use Cake\Http\ServerRequest;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
     public function index()
    {
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));//la méthode set() permet de passer les articles récupérés au Template 
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id) 
    { 
        // nous utilisons get() plutôt que find('all') parce que nous voulons seulement récupérer les informations d’un seul post
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        $this->loadModel("Comments");
        $comments = $this->Comments->find()->where(['post_id' => $id]);
        $this->set('post', $post);
        $this->set('comments', $comments);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity(); 
        if ($this->request->is('post')) {// pour vériﬁer que la requête est de type POST
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            $post->user_id = $this->Auth->user('user_id');
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) //s’assurer que l’utilisateur essaie d’accéder à un enregistrement existant
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($post->user_id != $this->Auth->user('user_id')) {
            throw new NotFoundException("Post Not Found");
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

             return $this->redirect(['action' => 'index']); 
          } 
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)//prend comme parametre l'id de l'element à supprimer
    {
        $this->request->allowMethod(['post', 'delete']);// la méthode allowMethod() lancera une exception Sil’utilisateuressaied’aller supprimer un article avec une requête GET
        $post = $this->Posts->get($id);
    
        if ($post->user_id != $this->Auth->user('user_id')) {
            throw new NotFoundException("Post Not Found");
        }
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
    } 

        return $this->redirect(['action' => 'index']);
    }

    public function like($id) {
    
        //$post = $this->Posts->get($id);
        $this->loadModel('Likes'); //utiliser une table de model/collection qui n’est pas le model du controller par défaut.
        $likes = $this->Likes->find()->where(
            ['post_id' => $id, 'user_id' => $this->Auth->user('user_id')])
            ->count();

        if ($likes > 0) { //si 1
            $this->Likes->query()->delete()
            ->where(['post_id' => $id, 'user_id' => $this->Auth->user('user_id')])
            ->execute();
        } else {
            $this->Likes->query()->insert(['user_id', 'post_id'])
            ->values([
                'user_id' => $this->Auth->user('user_id'),
                'post_id' => $id,
            ])->execute();
        }
        return $this->redirect($this->referer()); //actualiser la page 
    }

    public function comment($id){
        $comment = $this->request->getData('comment');
        $this->loadModel('Comments');
        
            $this->Comments->query()->insert(['user_id', 'post_id', 'comment'])
            ->values([
                'user_id' => $this->Auth->user('user_id'),
                'post_id' => $id,
                'comment'=>$comment,
            ])->execute();
        
        return $this->redirect($this->referer());
        
    }

    public function embed($id) 
    { 
        // nous utilisons get() plutôt que find('all') parce que nous voulons seulement récupérer les informations d’un seul post
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        $this->set('post', $post);
      
    }
}

