<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Domaine $domaine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Domaines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Domaines'), ['controller' => 'Domaines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Domaine'), ['controller' => 'Domaines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="domaines form large-9 medium-8 columns content">
    <?= $this->Form->create($domaine) ?>
    <fieldset>
        <legend><?= __('Add Domaine') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('parent_id', ['options' => $parentDomaines, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
