<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Heatingtype $heatingtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Heatingtypes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="heatingtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($heatingtype) ?>
    <fieldset>
        <legend><?= __('Add Heatingtype') ?></legend>
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
