<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conditionofproperty $conditionofproperty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conditionofproperty'), ['action' => 'edit', $conditionofproperty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conditionofproperty'), ['action' => 'delete', $conditionofproperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conditionofproperty->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conditionofproperties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conditionofproperty'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conditionofproperties view large-9 medium-8 columns content">
    <h3><?= h($conditionofproperty->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($conditionofproperty->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conditionofproperty->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($conditionofproperty->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($conditionofproperty->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($conditionofproperty->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($conditionofproperty->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $conditionofproperty->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
