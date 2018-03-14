<?php
// src/Controller/PostsController.php

namespace App\Controller;
use App\Controller\AppController;
    
class PostsController extends AppController
{
     public function index()
    {
        $posts = $this->Posts->find(); //definir la variable de vue
        $this->set(compact('posts')); // pour transmettre les données du controller à la vue 
    }

    public function view($id = null) 
    { 
        $post = $this->Posts->get($id); //on utilise get() plutôt que find('all') parce que nous voulons seulement récupérer les informations d’un seul article
         $this->set(compact('post')); 
    }


    public function add()
    {
        $post = $this->Posts->newEntity(); 
        if ($this->request->is('post')) //pour verifier que la requete est de type post
         { $post = $this->Posts->patchEntity($post, $this->request->getData());
         if ($this->Posts->save($post))
          { $this->Flash->success(__('Votre post a été sauvegardé.')); //définir des messages de notifications
             return $this->redirect(['action' => 'index']); 
          } 
        $this->Flash->error(__('Impossible d\'ajouter ce post.')); 
         } $this->set('post', $post); 
    } 

}
?>
