<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate[]|\Cake\Collection\CollectionInterface $realestates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Realestate'), ['action' => 'add']) ?></li>
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
<div class="realestates index large-9 medium-8 columns content">
    <h3><?= __('Realestates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('convenienceGrade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heatingType_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conditionOfProperty_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parking_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rooms_numbers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('half_room_numbers') ?></th>
                <th scope="col"><?= $this->Paginator->sort('floor_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('floor_number_sum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('floor_area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('land_area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('elevator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('external_storage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('premium') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visitors') ?></th>
                <th scope="col"><?= $this->Paginator->sort('built_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zipCode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('houseNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($realestates as $realestate): ?>
            <tr>
                <td><?= $this->Number->format($realestate->id) ?></td>
                <td><?= $realestate->has('user') ? $this->Html->link($realestate->user->id, ['controller' => 'Users', 'action' => 'view', $realestate->user->id]) : '' ?></td>
                <td><?= $realestate->has('type') ? $this->Html->link($realestate->type->name, ['controller' => 'Types', 'action' => 'view', $realestate->type->id]) : '' ?></td>
                <td><?= $realestate->has('category') ? $this->Html->link($realestate->category->name, ['controller' => 'Categories', 'action' => 'view', $realestate->category->id]) : '' ?></td>
                <td><?= $realestate->has('convenience_grade') ? $this->Html->link($realestate->convenience_grade->name, ['controller' => 'Conveniencegrades', 'action' => 'view', $realestate->convenience_grade->id]) : '' ?></td>
                <td><?= $realestate->has('heating_type') ? $this->Html->link($realestate->heating_type->name, ['controller' => 'Heatingtypes', 'action' => 'view', $realestate->heating_type->id]) : '' ?></td>
                <td><?= $realestate->has('condition_of_property') ? $this->Html->link($realestate->condition_of_property->name, ['controller' => 'Conditionofproperties', 'action' => 'view', $realestate->condition_of_property->id]) : '' ?></td>
                <td><?= $realestate->has('parking') ? $this->Html->link($realestate->parking->name, ['controller' => 'Parkings', 'action' => 'view', $realestate->parking->id]) : '' ?></td>
                <td><?= $this->Number->format($realestate->price) ?></td>
                <td><?= $this->Number->format($realestate->rooms_numbers) ?></td>
                <td><?= $this->Number->format($realestate->half_room_numbers) ?></td>
                <td><?= $this->Number->format($realestate->floor_number) ?></td>
                <td><?= $this->Number->format($realestate->floor_number_sum) ?></td>
                <td><?= $this->Number->format($realestate->floor_area) ?></td>
                <td><?= $this->Number->format($realestate->land_area) ?></td>
                <td><?= h($realestate->elevator) ?></td>
                <td><?= h($realestate->external_storage) ?></td>
                <td><?= h($realestate->premium) ?></td>
                <td><?= $this->Number->format($realestate->visitors) ?></td>
                <td><?= h($realestate->built_year) ?></td>
                <td><?= h($realestate->zipCode) ?></td>
                <td><?= h($realestate->state) ?></td>
                <td><?= h($realestate->city) ?></td>
                <td><?= h($realestate->street) ?></td>
                <td><?= h($realestate->houseNumber) ?></td>
                <td><?= h($realestate->district) ?></td>
                <td><?= $this->Number->format($realestate->latitude) ?></td>
                <td><?= $this->Number->format($realestate->longitude) ?></td>
                <td><?= h($realestate->active) ?></td>
                <td><?= h($realestate->created) ?></td>
                <td><?= $this->Number->format($realestate->created_by) ?></td>
                <td><?= h($realestate->modified) ?></td>
                <td><?= $this->Number->format($realestate->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $realestate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $realestate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $realestate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $realestate->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
