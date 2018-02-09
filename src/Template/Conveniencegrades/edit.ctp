<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conveniencegrade $conveniencegrade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conveniencegrade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conveniencegrade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Conveniencegrades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="conveniencegrades form large-9 medium-8 columns content">
    <?= $this->Form->create($conveniencegrade) ?>
    <fieldset>
        <legend><?= __('Edit Conveniencegrade') ?></legend>
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
