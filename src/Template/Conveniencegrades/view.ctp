<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conveniencegrade $conveniencegrade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conveniencegrade'), ['action' => 'edit', $conveniencegrade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conveniencegrade'), ['action' => 'delete', $conveniencegrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conveniencegrade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Conveniencegrades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conveniencegrade'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conveniencegrades view large-9 medium-8 columns content">
    <h3><?= h($conveniencegrade->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($conveniencegrade->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conveniencegrade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($conveniencegrade->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($conveniencegrade->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($conveniencegrade->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($conveniencegrade->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $conveniencegrade->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
