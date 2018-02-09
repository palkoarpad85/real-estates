<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Heatingtype $heatingtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Heatingtype'), ['action' => 'edit', $heatingtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Heatingtype'), ['action' => 'delete', $heatingtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $heatingtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Heatingtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Heatingtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="heatingtypes view large-9 medium-8 columns content">
    <h3><?= h($heatingtype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($heatingtype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($heatingtype->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($heatingtype->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($heatingtype->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($heatingtype->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($heatingtype->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $heatingtype->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
