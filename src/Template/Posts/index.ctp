<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
 
?>

<?= $this->Html->css('fontawesome-all.css') ?>



<!DOCTYPE html>
<html>

<?php
$this->assign('title', "Posts");
?>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>

    
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <!--
    <?= $this->Html->css('cake.css') ?>
    -->
    <?= $this->Html->css('styleposts.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    

<div class="posts index large-12 medium-12 columns content">
    <h3><?= __('Posts') ?></h3>
    <center><table cellpadding="0" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('posted_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('likes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comments') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $this->Number->format($post->id) ?></td>
                <td><?= h($post->posted_at) ?></td>
                <td><?= h($post->created) ?></td>
                <td><?= h($post->modified) ?></td>
              
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $post->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?>
                </td>
                <td>
                <a type='button' class="b" href="<?= $this->Url->build(['action' => 'like', $post->id]) ?>">
                <i class="far fa-heart"></i>
                  Like  
                </a>
                </td>

<td>
<textarea name='text' placeholder="Add Comment"></textarea>
<button type="button" id="submit">  Add Comment </button>
</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</center>



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
</div>

</body>
</html>