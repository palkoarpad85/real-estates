<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate $realestate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Realestate'), ['action' => 'edit', $realestate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Realestate'), ['action' => 'delete', $realestate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $realestate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Realestates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Realestate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Convenience Grades'), ['controller' => 'Conveniencegrades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convenience Grade'), ['controller' => 'Conveniencegrades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Heating Types'), ['controller' => 'Heatingtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Heating Type'), ['controller' => 'Heatingtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Condition Of Properties'), ['controller' => 'Conditionofproperties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condition Of Property'), ['controller' => 'Conditionofproperties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parkings'), ['controller' => 'Parkings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parking'), ['controller' => 'Parkings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="realestates view large-9 medium-8 columns content">
    <h3><?= h($realestate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $realestate->has('user') ? $this->Html->link($realestate->user->id, ['controller' => 'Users', 'action' => 'view', $realestate->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $realestate->has('type') ? $this->Html->link($realestate->type->name, ['controller' => 'Types', 'action' => 'view', $realestate->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $realestate->has('category') ? $this->Html->link($realestate->category->name, ['controller' => 'Categories', 'action' => 'view', $realestate->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Convenience Grade') ?></th>
            <td><?= $realestate->has('convenience_grade') ? $this->Html->link($realestate->convenience_grade->name, ['controller' => 'Conveniencegrades', 'action' => 'view', $realestate->convenience_grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Heating Type') ?></th>
            <td><?= $realestate->has('heating_type') ? $this->Html->link($realestate->heating_type->name, ['controller' => 'Heatingtypes', 'action' => 'view', $realestate->heating_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition Of Property') ?></th>
            <td><?= $realestate->has('condition_of_property') ? $this->Html->link($realestate->condition_of_property->name, ['controller' => 'Conditionofproperties', 'action' => 'view', $realestate->condition_of_property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parking') ?></th>
            <td><?= $realestate->has('parking') ? $this->Html->link($realestate->parking->name, ['controller' => 'Parkings', 'action' => 'view', $realestate->parking->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZipCode') ?></th>
            <td><?= h($realestate->zipCode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($realestate->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($realestate->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Street') ?></th>
            <td><?= h($realestate->street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HouseNumber') ?></th>
            <td><?= h($realestate->houseNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($realestate->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($realestate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($realestate->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rooms Numbers') ?></th>
            <td><?= $this->Number->format($realestate->rooms_numbers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Half Room Numbers') ?></th>
            <td><?= $this->Number->format($realestate->half_room_numbers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Number') ?></th>
            <td><?= $this->Number->format($realestate->floor_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Number Sum') ?></th>
            <td><?= $this->Number->format($realestate->floor_number_sum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Area') ?></th>
            <td><?= $this->Number->format($realestate->floor_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Land Area') ?></th>
            <td><?= $this->Number->format($realestate->land_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visitors') ?></th>
            <td><?= $this->Number->format($realestate->visitors) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($realestate->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($realestate->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($realestate->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($realestate->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Premium') ?></th>
            <td><?= h($realestate->premium) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Built Year') ?></th>
            <td><?= h($realestate->built_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($realestate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($realestate->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Elevator') ?></th>
            <td><?= $realestate->elevator ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('External Storage') ?></th>
            <td><?= $realestate->external_storage ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $realestate->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($realestate->comment)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Phones') ?></h4>
        <?php if (!empty($realestate->phones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('PhoneNumber') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($realestate->phones as $phones): ?>
            <tr>
                <td><?= h($phones->id) ?></td>
                <td><?= h($phones->active) ?></td>
                <td><?= h($phones->phoneNumber) ?></td>
                <td><?= h($phones->created) ?></td>
                <td><?= h($phones->created_by) ?></td>
                <td><?= h($phones->modified) ?></td>
                <td><?= h($phones->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phones', 'action' => 'view', $phones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phones', 'action' => 'edit', $phones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phones', 'action' => 'delete', $phones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($realestate->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Realestate Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($realestate->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->realestate_id) ?></td>
                <td><?= h($images->active) ?></td>
                <td><?= h($images->name) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->created_by) ?></td>
                <td><?= h($images->modified) ?></td>
                <td><?= h($images->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
