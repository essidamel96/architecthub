<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<!DOCTYPE html>
<html>
    <head>
<?= $this->Html->css('stylepostsadd.css') ?>
</head>

<body>
<div class="form">
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post, ['type' => 'file']) ?> <!--#<form method="post" action="/Posts/add">-->
    
        <legend><h1><center><?= __('Add New Post') ?></center></h1></legend>
    
    <div class="form-group">
    <label>Description</label>
        <?php   echo $this->Form->textarea('content', ['placeholder' => 'Description','rows' => '5', 'class' => 'form-control']);//pour créer un élément de formulaire du même nom ?>
</div>
           <?php  echo"<br>"; ?>
           <div class="form-group">
                <label>Photo</label>
                <?php
                echo $this->Form->control('photo', ['type' => 'file', 'label' => false, 'class' => 'form-control']);
                ?>
                <?= $this->Form->control('domaine_id', ['options' => $domaines]) ?>
                </div>
           <?php  echo"<br>"; ?>          
       
    <button class='btn btn-primary'><i class="fas fa-plus"></i> Add</button>
    <?= $this->Form->end() ?> <!--pour fermer le formulaire-->
</div>
</div>

</body>
</html>