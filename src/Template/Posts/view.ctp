<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->script('three/three.js'); ?>
    <?= $this->Html->script('three/controls/OrbitControls.js'); ?>
    <?= $this->Html->script('three/controls/DeviceOrientationControls.js'); ?>
    <?= $this->Html->script('three/loaders/GLTFLoader.js'); ?>
    <?= $this->Html->script('viewer.js'); ?>
    <?= $this->Html->css('stylepostsview.css') ?>
</head>

<body>

<div class="col-sm-9">
<div class="all">

      <div  style="width:750px; height:350px;overflow:hidden;" class="v" id="viewer" data-src="/files/Posts/photo/<?= $post->photo ?>">
      
      </div> </div> </div>
     

 <div class="r">
   <div class="desc" <?= $this->Text->autoParagraph(h($post->content)); ?>
</div>
  <?php  echo"<br>"; ?>
        

<?php  echo"<br>"; ?>
<a type='button' class="embed" href="<?= $this->Url->build(['action' => 'embed', $post->id]) ?>">
<i class="fas fa-code"></i>
                  Embed  
                </a>
            
                <a type='Submit' class="share" href="<?= $this->Url->build(['controller'=>'shares','action' => 'add', $post->id]) ?>">
                <i class="fas fa-share-square"></i>
                  Share  
                </a>
   
                <?php  echo"<br>"; ?>
           <?php  echo"<br>"; ?>
    <i class="far fa-clock"></i> &nbsp; <span class="text-muted"><?= h($post->posted_at) ?></span>


    

    
<?= $this->Form->create(null, ['url' => ['action' => 'comment', $post->id]]) ?>
<?php  echo"<br>"; ?>
<?php
/* echo $this->Form->control('comment', ['placeholder' => 'Add Comment', 'type' => 'textarea']);*/
echo $this->Form->textarea('comment', ['placeholder' => 'Add Comment','rows' => '4', 'cols' => '30']);
echo"<br>"; 
 echo $this->Form->button('Comment');
?>
<?= $this->Form->end() ?>

<ul>
<?php foreach ($comments as $comment): ?>
    <li><?= $comment->comment ?></li>
<?php endforeach; ?>
</ul>




</body>



