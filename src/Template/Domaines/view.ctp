<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Domaine $domaine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Domaine'), ['action' => 'edit', $domaine->domaine_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Domaine'), ['action' => 'delete', $domaine->domaine_id], ['confirm' => __('Are you sure you want to delete # {0}?', $domaine->domaine_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Domaines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Domaine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Domaines'), ['controller' => 'Domaines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Domaine'), ['controller' => 'Domaines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Domaines'), ['controller' => 'Domaines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Domaine'), ['controller' => 'Domaines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="domaines view large-9 medium-8 columns content">
    <h3><?= h($domaine->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($domaine->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Domaine') ?></th>
            <td><?= $domaine->has('parent_domaine') ? $this->Html->link($domaine->parent_domaine->name, ['controller' => 'Domaines', 'action' => 'view', $domaine->parent_domaine->domaine_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domaine Id') ?></th>
            <td><?= $this->Number->format($domaine->domaine_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Domaines') ?></h4>
        <?php if (!empty($domaine->child_domaines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Domaine Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($domaine->child_domaines as $childDomaines): ?>
            <tr>
                <td><?= h($childDomaines->domaine_id) ?></td>
                <td><?= h($childDomaines->name) ?></td>
                <td><?= h($childDomaines->parent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Domaines', 'action' => 'view', $childDomaines->domaine_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Domaines', 'action' => 'edit', $childDomaines->domaine_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Domaines', 'action' => 'delete', $childDomaines->domaine_id], ['confirm' => __('Are you sure you want to delete # {0}?', $childDomaines->domaine_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
