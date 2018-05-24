<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<?= $this->Html->css('fontawesome-all.css') ?>


<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->script("jquery-3.3.1.js") ?><!-- importation de jQuery-->
    <?= $this->Html->script("bootstrap.js") ?>
    <?= $this->Html->css('bootstrap.css') ?>
<?= $this->Html->css('styleposts.css') ?>
    <?= $this->Html->meta('icon') ?>
  
    
</head>
	
<body class="d">

<?= $this->Form->create(null, ['type' => 'get']) ?>
<?= $this->Form->control('domaine_id', ['options' => $domaines]) ?>
<button>Filter</button>
<?= $this->Form->end() ?> 
<div class="posts">
    
  <div class="gallery">  
       
           
       
            <?php foreach ($posts as $post): ?>
            <div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
    <i class="far fa-clock"></i> &nbsp; <span class="text-muted"><?= h($post->posted_at) ?></span>

    <a href="<?= $this->Url->build(['controller' => 'Posts','action' => 'view', $post->id]) ?>">
               <?php  echo $this->Html->image('3d.jpg');?>
</a>

      <div class="caption">
                        <div class="actions">

                        <i class="fas fa-eye"></i>
      <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>&nbsp;

      <i class="fas fa-edit"></i>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>&nbsp;
                    <!--postLink() va créer un lien qui utilisera du JavaScript pour faire une requête POST et supprimer notre article-->
                    <i class="fas fa-eraser" ></i>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                </div><br>
               <div>
                <a type='button' class="b" href="<?= $this->Url->build(['action' => 'like', $post->id]) ?>">
                <i class="far fa-heart"></i>
                  Like  
                </a>
                </div><br>
               
<div class="c">

<?= $this->Form->create(null, ['url' => ['action' => 'comment', $post->id]]) ?>
<?php
 /*echo $this->Form->control('comment', ['placeholder' => 'Add Comment', 'type' => 'textarea']);*/

echo $this->Form->textarea('comment', ['placeholder' => 'Add Comment','rows' => '2', 'cols' => '9']);
echo"<br>";
echo $this->Form->button('Comment');
?>
<?= $this->Form->end() ?>
</div>
</div>
    </div>
  </div>
</div>
            <?php endforeach; ?>
        
    
</div>
</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>



</body>
</html>