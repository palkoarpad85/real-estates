<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?> <!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Realestates'), ['controller' => 'Realestates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Realestate'), ['controller' => 'Realestates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phones'), ['controller' => 'Phones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phone'), ['controller' => 'Phones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password_code_expire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password_reset_count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tos_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('register_ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login_ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->avatar) ?></td>
                <td><?= h($user->language) ?></td>
                <td><?= h($user->password_code_expire) ?></td>
                <td><?= $this->Number->format($user->password_reset_count) ?></td>
                <td><?= h($user->password_code) ?></td>
                <td><?= h($user->tos_date) ?></td>
                <td><?= h($user->token) ?></td>
                <td><?= h($user->register_ip) ?></td>
                <td><?= h($user->last_login_ip) ?></td>
                <td><?= h($user->last_login) ?></td>
                <td><?= h($user->active) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->created_by) ?></td>
                <td><?= h($user->modified) ?></td>
                <td><?= h($user->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
-->


<?php $this->layout = 'admin';?>
<section class="content-header">
    <h2>
        <?=__($this->name)?>
        <small><?=__('List')?></small>
    </h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb ">
    <li  class="breadcrumb-item" aria-current="page"><?=$this->Html->link(__("<i class='fa fa-tachometer-alt'></i> Home"),
    ['plugin' => false, 'controller' => 'Realestates', 'action' => 'dashboard'],
    ['class' => 'breadcrumb-item ', 'escape' => false])?>
    </li>
    <li  class="breadcrumb-item active" aria-current="page"><?=__("<i class='fa fa-outdent'></i> ".$this->name,
    ['class' => 'breadcrumb-item active', 'escape' => false])?></li>
    </ol>
    </nav>
</section>
    <div class="container-fluid">
    <div class="box-header">
                    <div class="row">
                        <div class="col-sm-6 "><h3 class="box-title"><?=__($this->name)?></h3></div>
                    </div><br>
                  <div class="row">
                <div class="col-sm-6">
                </div>
                 <div class="col-sm-6">
                     
                </div>
                </div>
                <br>
                </div>
        <div class="table-responsive">  

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <?= $this->Form->create(null, ['type'=>'get'])?> 
                            <td></td>   
                            <td>                            		  
                                <?php 
                                $active1 = (isset($active)) ? $active : 2 ;
                                echo $this->Form->input('',
                                        [                                                             
                                        'type' => 'select',
                                        'label' => false,
                                        'name'  => 'active',
                                        'class' => 'form-control',
                                        'multiple' => false,
                                        'style' => 'width:80px',
                                        'options' => [
                                            2=> __("All"),
                                            1=>__("Active"),
                                            3=>__("Inactive")
                                        ],
                                        'default' => $active1
                                        ]
                                );?>
                            </td>
                            <td><input type="text" class="form-control" style="width:150px" id="name" name="name" value="<?php if(isset($name)) echo $name ?>" placeholder="Search..."></td>
                            <td></td>  <td><input type="text" class="form-control" style="width:150px"  id="email" name="email" value="<?php if(isset($email)) echo $email ?>"  placeholder="Search..."></td> 
                            <td></td>  
                            <td colspan="2"><button class="btn btn-success"><i class='fas fa-search'></i> <?=__("Search")?></button> 
                            <?=$this->Html->link(__("<i class='fas fa-times'></i> Reset"),
                                                    ['plugin' => false, 'controller' => $this->name, 'action' => 'index'],
                                                    ['class' => 'btn btn-danger ', 'escape' => false])?>
                            </td>
                         </tr>
                            <?= $this->Form->end();?>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <th><?=$this->Paginator->sort('active', __("Active <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('username', __("Name <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('roles', __("Roles <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('emial', __("Email <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th class=""><?=__('Actions')?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $this->element('tables/tableUsers'); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <th><?=$this->Paginator->sort('active', __("Active <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('username', __("Name <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('roles', __("Roles <i class='fa fa-sort'></i>"), ['escape' => false])?></th>                           
                            <th><?=$this->Paginator->sort('email', __("Email <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th class=""><?=__('Actions')?></th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                    <div class="paginator">
                        <ul class="pagination">
                            <?=$this->Paginator->first('<< ' . __('first'))?>
                            <?=$this->Paginator->prev('< ' . __('previous'))?>
                            <?=$this->Paginator->numbers()?>
                            <?=$this->Paginator->next(__('next') . ' >')?>
                            <?=$this->Paginator->last(__('last') . ' >>')?>
                        </ul>

                        <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
                    </div>
                </div>
    </div>









