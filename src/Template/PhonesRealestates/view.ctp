<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhonesRealestate $phonesRealestate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phones Realestate'), ['action' => 'edit', $phonesRealestate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phones Realestate'), ['action' => 'delete', $phonesRealestate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phonesRealestate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phones Realestates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phones Realestate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phonesRealestates view large-9 medium-8 columns content">
    <h3><?= h($phonesRealestate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $phonesRealestate->has('phone') ? $this->Html->link($phonesRealestate->phone->id, ['controller' => 'Phones', 'action' => 'view', $phonesRealestate->phone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Realestate') ?></th>
            <td><?= $phonesRealestate->has('realestate') ? $this->Html->link($phonesRealestate->realestate->id, ['controller' => 'Realestates', 'action' => 'view', $phonesRealestate->realestate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phonesRealestate->id) ?></td>
        </tr>
    </table>
</div>
