<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Heatingtype[]|\Cake\Collection\CollectionInterface $heatingtypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Heatingtype'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="heatingtypes index large-9 medium-8 columns content">
    <h3><?= __('Heatingtypes') ?></h3>
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
            <?php foreach ($heatingtypes as $heatingtype): ?>
            <tr>
                <td><?= $this->Number->format($heatingtype->id) ?></td>
                <td><?= h($heatingtype->active) ?></td>
                <td><?= h($heatingtype->name) ?></td>
                <td><?= h($heatingtype->created) ?></td>
                <td><?= $this->Number->format($heatingtype->created_by) ?></td>
                <td><?= h($heatingtype->modified) ?></td>
                <td><?= $this->Number->format($heatingtype->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $heatingtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $heatingtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $heatingtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $heatingtype->id)]) ?>
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
