<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone[]|\Cake\Collection\CollectionInterface $phones
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phones index large-9 medium-8 columns content">
    <h3><?= __('Phones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phoneNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phones as $phone): ?>
            <tr>
                <td><?= $this->Number->format($phone->id) ?></td>
                <td><?= h($phone->active) ?></td>
                <td><?= h($phone->phoneNumber) ?></td>
                <td><?= h($phone->created) ?></td>
                <td><?= $this->Number->format($phone->created_by) ?></td>
                <td><?= h($phone->modified) ?></td>
                <td><?= $this->Number->format($phone->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $phone->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phone->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phone->id)]) ?>
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
