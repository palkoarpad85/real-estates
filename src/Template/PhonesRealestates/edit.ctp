<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhonesRealestate $phonesRealestate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $phonesRealestate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $phonesRealestate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Phones Realestates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phonesRealestates form large-9 medium-8 columns content">
    <?= $this->Form->create($phonesRealestate) ?>
    <fieldset>
        <legend><?= __('Edit Phones Realestate') ?></legend>
        <?php
            echo $this->Form->control('phone_id', ['options' => $phones]);
            echo $this->Form->control('realestate_id', ['options' => $realestates]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
