<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parking $parking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parking'), ['action' => 'edit', $parking->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parking'), ['action' => 'delete', $parking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parking->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parkings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parkings view large-9 medium-8 columns content">
    <h3><?= h($parking->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($parking->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parking->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($parking->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($parking->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($parking->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($parking->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $parking->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Realestates') ?></h4>
        <?php if (!empty($parking->realestates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Type Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('ConvenienceGrade Id') ?></th>
                <th scope="col"><?= __('HeatingType Id') ?></th>
                <th scope="col"><?= __('ConditionOfProperty Id') ?></th>
                <th scope="col"><?= __('Parking Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Rooms Numbers') ?></th>
                <th scope="col"><?= __('Half Room Numbers') ?></th>
                <th scope="col"><?= __('Floor Number') ?></th>
                <th scope="col"><?= __('Floor Number Sum') ?></th>
                <th scope="col"><?= __('Floor Area') ?></th>
                <th scope="col"><?= __('Land Area') ?></th>
                <th scope="col"><?= __('Elevator') ?></th>
                <th scope="col"><?= __('External Storage') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Premium') ?></th>
                <th scope="col"><?= __('Visitors') ?></th>
                <th scope="col"><?= __('Built Year') ?></th>
                <th scope="col"><?= __('ZipCode') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('Street') ?></th>
                <th scope="col"><?= __('HouseNumber') ?></th>
                <th scope="col"><?= __('District') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($parking->realestates as $realestates): ?>
            <tr>
                <td><?= h($realestates->id) ?></td>
                <td><?= h($realestates->user_id) ?></td>
                <td><?= h($realestates->type_id) ?></td>
                <td><?= h($realestates->category_id) ?></td>
                <td><?= h($realestates->convenienceGrade_id) ?></td>
                <td><?= h($realestates->heatingType_id) ?></td>
                <td><?= h($realestates->conditionOfProperty_id) ?></td>
                <td><?= h($realestates->parking_id) ?></td>
                <td><?= h($realestates->price) ?></td>
                <td><?= h($realestates->rooms_numbers) ?></td>
                <td><?= h($realestates->half_room_numbers) ?></td>
                <td><?= h($realestates->floor_number) ?></td>
                <td><?= h($realestates->floor_number_sum) ?></td>
                <td><?= h($realestates->floor_area) ?></td>
                <td><?= h($realestates->land_area) ?></td>
                <td><?= h($realestates->elevator) ?></td>
                <td><?= h($realestates->external_storage) ?></td>
                <td><?= h($realestates->comment) ?></td>
                <td><?= h($realestates->premium) ?></td>
                <td><?= h($realestates->visitors) ?></td>
                <td><?= h($realestates->built_year) ?></td>
                <td><?= h($realestates->zipCode) ?></td>
                <td><?= h($realestates->state) ?></td>
                <td><?= h($realestates->city) ?></td>
                <td><?= h($realestates->street) ?></td>
                <td><?= h($realestates->houseNumber) ?></td>
                <td><?= h($realestates->district) ?></td>
                <td><?= h($realestates->latitude) ?></td>
                <td><?= h($realestates->longitude) ?></td>
                <td><?= h($realestates->active) ?></td>
                <td><?= h($realestates->created) ?></td>
                <td><?= h($realestates->created_by) ?></td>
                <td><?= h($realestates->modified) ?></td>
                <td><?= h($realestates->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Realestates', 'action' => 'view', $realestates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Realestates', 'action' => 'edit', $realestates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Realestates', 'action' => 'delete', $realestates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $realestates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
