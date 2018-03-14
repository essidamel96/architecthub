<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Share $share
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Share'), ['action' => 'edit', $share->post_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Share'), ['action' => 'delete', $share->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $share->post_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shares'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Share'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shares view large-9 medium-8 columns content">
    <h3><?= h($share->post_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Post Id') ?></th>
            <td><?= $this->Number->format($share->post_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($share->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($share->created) ?></td>
        </tr>
    </table>
</div>
