<?php
// src/Controller/PostsController.php

namespace App\Controller;

use App\Controller\AppController;
    
use Cake\Network\Exception\NotFoundException;

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
    public function view($id = null) 
    { 
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity(); 
        if ($this->request->is('post')) {// pour vériﬁer que la requête possède bien le verbe HTTP POST
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
        $this->request->allowMethod(['post', 'delete']);
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
}