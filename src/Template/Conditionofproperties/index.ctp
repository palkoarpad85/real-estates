<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conditionofproperty[]|\Cake\Collection\CollectionInterface $conditionofproperties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conditionofproperty'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conditionofproperties index large-9 medium-8 columns content">
    <h3><?= __('Conditionofproperties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conditionofproperties as $conditionofproperty): ?>
            <tr>
                <td><?= $this->Number->format($conditionofproperty->id) ?></td>
                <td><?= h($conditionofproperty->active) ?></td>
                <td><?= h($conditionofproperty->name) ?></td>
                <td><?= h($conditionofproperty->created) ?></td>
                <td><?= $this->Number->format($conditionofproperty->created_by) ?></td>
                <td><?= h($conditionofproperty->modified) ?></td>
                <td><?= $this->Number->format($conditionofproperty->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conditionofproperty->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conditionofproperty->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conditionofproperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conditionofproperty->id)]) ?>
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
