<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>

    <?= $this->Html->script('three/three.js'); ?>
    <?= $this->Html->script('three/controls/OrbitControls.js'); ?>
    <?= $this->Html->script('three/loaders/GLTFLoader.js'); ?>
    <?= $this->Html->script('viewer.js'); ?>
    <nav class="col-sm-3" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="col-sm-9">
    <h1><?= h($post->id) ?></h1>
    <table class="table table-bordered">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($post->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posted At') ?></th>
            <td><?= h($post->posted_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($post->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($post->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h3><?= __('Content') ?></h3>
        <?= $this->Text->autoParagraph(h($post->content)); ?>
        
        <div style="width:300px; height:200px" class="viewer" id="viewer" data-src="/files/Posts/photo/<?= $post->photo ?>"></div>
          
    </div>
</div>
