<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conditionofproperty $conditionofproperty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conditionofproperty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conditionofproperty->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conditionofproperties'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="conditionofproperties form large-9 medium-8 columns content">
    <?= $this->Form->create($conditionofproperty) ?>
    <fieldset>
        <legend><?= __('Edit Conditionofproperty') ?></legend>
        <?php
            echo $this->Form->control('active');
            echo $this->Form->control('name');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
