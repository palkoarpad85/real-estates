<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar') ?></th>
            <td><?= h($user->avatar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= h($user->language) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Code') ?></th>
            <td><?= h($user->password_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Token') ?></th>
            <td><?= h($user->token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Register Ip') ?></th>
            <td><?= h($user->register_ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login Ip') ?></th>
            <td><?= h($user->last_login_ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= h($user->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= h($user->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Reset Count') ?></th>
            <td><?= $this->Number->format($user->password_reset_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Code Expire') ?></th>
            <td><?= h($user->password_code_expire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tos Date') ?></th>
            <td><?= h($user->tos_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($user->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Biography') ?></h4>
        <?= $this->Text->autoParagraph(h($user->biography)); ?>
    </div>
    <div class="row">
        <h4><?= __('Signature') ?></h4>
        <?= $this->Text->autoParagraph(h($user->signature)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Phones') ?></h4>
        <?php if (!empty($user->phones)): ?>
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
            <?php foreach ($user->phones as $phones): ?>
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
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($user->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->active) ?></td>
                <td><?= h($roles->name) ?></td>
                <td><?= h($roles->created) ?></td>
                <td><?= h($roles->created_by) ?></td>
                <td><?= h($roles->modified) ?></td>
                <td><?= h($roles->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Realestates') ?></h4>
        <?php if (!empty($user->realestates)): ?>
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
            <?php foreach ($user->realestates as $realestates): ?>
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
