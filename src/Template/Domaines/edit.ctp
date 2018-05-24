<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Domaine $domaine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $domaine->domaine_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $domaine->domaine_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Domaines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Domaines'), ['controller' => 'Domaines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Domaine'), ['controller' => 'Domaines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="domaines form large-9 medium-8 columns content">
    <?= $this->Form->create($domaine) ?>
    <fieldset>
        <legend><?= __('Edit Domaine') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('parent_id', ['options' => $parentDomaines, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
