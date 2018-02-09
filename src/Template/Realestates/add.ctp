<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate $realestate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Realestates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Convenience Grades'), ['controller' => 'Conveniencegrades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convenience Grade'), ['controller' => 'Conveniencegrades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Heating Types'), ['controller' => 'Heatingtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Heating Type'), ['controller' => 'Heatingtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Condition Of Properties'), ['controller' => 'Conditionofproperties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Condition Of Property'), ['controller' => 'Conditionofproperties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parkings'), ['controller' => 'Parkings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parking'), ['controller' => 'Parkings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="realestates form large-9 medium-8 columns content">
    <?= $this->Form->create($realestate) ?>
    <fieldset>
        <legend><?= __('Add Realestate') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('type_id', ['options' => $types, 'empty' => true]);
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('convenienceGrade_id', ['options' => $convenienceGrades, 'empty' => true]);
            echo $this->Form->control('heatingType_id', ['options' => $heatingTypes, 'empty' => true]);
            echo $this->Form->control('conditionOfProperty_id', ['options' => $conditionOfProperties, 'empty' => true]);
            echo $this->Form->control('parking_id', ['options' => $parkings, 'empty' => true]);
            echo $this->Form->control('price');
            echo $this->Form->control('rooms_numbers');
            echo $this->Form->control('half_room_numbers');
            echo $this->Form->control('floor_number');
            echo $this->Form->control('floor_number_sum');
            echo $this->Form->control('floor_area');
            echo $this->Form->control('land_area');
            echo $this->Form->control('elevator');
            echo $this->Form->control('external_storage');
            echo $this->Form->control('comment');
            echo $this->Form->control('premium', ['empty' => true]);
            echo $this->Form->control('visitors');
            echo $this->Form->control('built_year', ['empty' => true]);
            echo $this->Form->control('zipCode');
            echo $this->Form->control('state');
            echo $this->Form->control('city');
            echo $this->Form->control('street');
            echo $this->Form->control('houseNumber');
            echo $this->Form->control('district');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('active');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
            echo $this->Form->control('phones._ids', ['options' => $phones]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
