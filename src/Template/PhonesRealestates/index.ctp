<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhonesRealestate[]|\Cake\Collection\CollectionInterface $phonesRealestates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phones Realestate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phonesRealestates index large-9 medium-8 columns content">
    <h3><?= __('Phones Realestates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('realestate_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phonesRealestates as $phonesRealestate): ?>
            <tr>
                <td><?= $this->Number->format($phonesRealestate->id) ?></td>
                <td><?= $phonesRealestate->has('phone') ? $this->Html->link($phonesRealestate->phone->id, ['controller' => 'Phones', 'action' => 'view', $phonesRealestate->phone->id]) : '' ?></td>
                <td><?= $phonesRealestate->has('realestate') ? $this->Html->link($phonesRealestate->realestate->id, ['controller' => 'Realestates', 'action' => 'view', $phonesRealestate->realestate->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $phonesRealestate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phonesRealestate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phonesRealestate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phonesRealestate->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
