<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conveniencegrade[]|\Cake\Collection\CollectionInterface $conveniencegrades
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conveniencegrade'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conveniencegrades index large-9 medium-8 columns content">
    <h3><?= __('Conveniencegrades') ?></h3>
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
            <?php foreach ($conveniencegrades as $conveniencegrade): ?>
            <tr>
                <td><?= $this->Number->format($conveniencegrade->id) ?></td>
                <td><?= h($conveniencegrade->active) ?></td>
                <td><?= h($conveniencegrade->name) ?></td>
                <td><?= h($conveniencegrade->created) ?></td>
                <td><?= $this->Number->format($conveniencegrade->created_by) ?></td>
                <td><?= h($conveniencegrade->modified) ?></td>
                <td><?= $this->Number->format($conveniencegrade->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conveniencegrade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conveniencegrade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conveniencegrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conveniencegrade->id)]) ?>
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
