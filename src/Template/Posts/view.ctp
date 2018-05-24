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
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-theme.css') ?>
 
</head>

<body>

<div class="col-sm-9">
<div class="all">

      <div  style="width:750px; height:350px;overflow:hidden;" class="v" id="viewer" data-src="/files/Posts/photo/<?= $post->photo ?>">
      
      </div> </div> </div>
     

 <div class="r">
   <div class="desc" <?= $this->Text->autoParagraph(h($post->content)); ?>
   <i class="far fa-clock"></i> &nbsp; <span class="text-muted"><?= h($post->domaine->name) ?></span>
</div>
  <?php  echo"<br>"; ?>
        

<?php  echo"<br>"; ?>
<a type='button' class="embed" href="#"  data-toggle="modal" data-target=".bs-example-modal-lg">
<i class="fas fa-code"></i>
                  Embed  
                </a>

                <a type='Submit' class="share" href="<?= $this->Url->build(['controller'=>'shares','action' => 'add', $post->id]) ?>">
                <i class="fas fa-share-square"></i>
                  Share  
                </a>
                <a type='button' class="download" href="/files/Posts/photo/<?= $post->photo ?>">
<i class="fas fa-download"></i>
                  Download  
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







<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Code integration Model 3D</h4>
      </div>
      <div class="modal-body">
      
      <pre><code>
      &lt;iframe src="<?= $this->Url->build(['action' => 'embed', $post->id]) ?>"&gt;&lt;/iframe&gt;
      </code></pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
            

</body>



