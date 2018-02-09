<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone $phone
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phone'), ['action' => 'edit', $phone->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phone'), ['action' => 'delete', $phone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phone->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phones view large-9 medium-8 columns content">
    <h3><?= h($phone->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PhoneNumber') ?></th>
            <td><?= h($phone->phoneNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phone->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($phone->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($phone->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($phone->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($phone->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $phone->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Realestates') ?></h4>
        <?php if (!empty($phone->realestates)): ?>
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
            <?php foreach ($phone->realestates as $realestates): ?>
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
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($phone->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Avatar') ?></th>
                <th scope="col"><?= __('Biography') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Language') ?></th>
                <th scope="col"><?= __('Password Code Expire') ?></th>
                <th scope="col"><?= __('Password Reset Count') ?></th>
                <th scope="col"><?= __('Password Code') ?></th>
                <th scope="col"><?= __('Tos Date') ?></th>
                <th scope="col"><?= __('Token') ?></th>
                <th scope="col"><?= __('Register Ip') ?></th>
                <th scope="col"><?= __('Last Login Ip') ?></th>
                <th scope="col"><?= __('Last Login') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($phone->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->avatar) ?></td>
                <td><?= h($users->biography) ?></td>
                <td><?= h($users->signature) ?></td>
                <td><?= h($users->language) ?></td>
                <td><?= h($users->password_code_expire) ?></td>
                <td><?= h($users->password_reset_count) ?></td>
                <td><?= h($users->password_code) ?></td>
                <td><?= h($users->tos_date) ?></td>
                <td><?= h($users->token) ?></td>
                <td><?= h($users->register_ip) ?></td>
                <td><?= h($users->last_login_ip) ?></td>
                <td><?= h($users->last_login) ?></td>
                <td><?= h($users->active) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->created_by) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
