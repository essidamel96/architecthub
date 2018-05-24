<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<!DOCTYPE html>
<html>
    <head>
<?= $this->Html->css('stylepostsedit.css') ?>
</head>

<body>
<div class="form">
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post, ['type' => 'file']) ?> <!--#<form method="post" action="/Posts/add">-->
    
        <legend><h1><center><?= __('Edit Post') ?></center></h1></legend>
        <?php  echo"<br>"; ?>
    
       
        <div class="form-group">
    <label>Description</label>
        <?php   echo $this->Form->textarea('content', ['placeholder' => 'Description','rows' => '5', 'class' => 'form-control']);//pour créer un élément de formulaire du même nom 
                echo $this->Form->control('domaine_id', ['options' => $domaines, 'empty' => true]);
        ?>
</div>
           <?php  echo"<br>"; ?>
         
           

        <i class="far fa-clock"></i> &nbsp; <span class="text-muted"><?= h($post->posted_at) ?></span>
          
       <?php echo"<br>"?>
       <?php echo"<br>"?>


    <button class='btn btn-primary'><i class="fas fa-edit"></i> Edit</button>
    <?= $this->Form->end() ?> <!--pour fermer le formulaire-->
</div>
</div>

</body>
</html>


