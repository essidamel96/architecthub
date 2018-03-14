<!-- File: src/Template/Posts/add.ctp -->
<h1>Ajouter un post</h1>
 <?php
 echo $this->Form->create($post); //#<form method="post" action="/articles/add">
 echo $this->Form->control('content', ['rows' => '3']); 
 echo $this->Form->button(__("Sauvegarder le post"));
 echo $this->Form->end(); // cloture le formulaire
   ?>
