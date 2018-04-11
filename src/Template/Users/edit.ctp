<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\user\User $user
 */
?>

        <?php $this->layout = 'admin';?>
        <div class="content">

            <section class="content-header">
                <h2>
                    <?=__('Edit a ' . $this->name)?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$this->Html->link(__("<i class='fa fa-tachometer-alt'></i> Home"),
                        ['plugin' => false, 'controller' => 'Realestates', 'action' => 'dashboard'],
                        ['class' => 'breadcrumb-item ', 'escape' => false])?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$this->Html->link(__("<i class='fa fa-outdent'></i> " . $this->name),
                        ['plugin' => false, 'controller' => $this->name, 'action' => 'index'],
                        ['class' => 'breadcrumb-item ', 'escape' => false])?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?=__("<i class='fas fa-plus'></i> Edit " . $this->name)?>
                        </li>
                    </ol>
                </nav>
            </section>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-3">
                            <div class="tab-content" style="background-color:#eee;">
                            <div class="box box-primary" style="background-color:#eee;">
                                <div class="box-body box-profile">
                                    <div class=" text-center">
                                        <?= $this->Html->image("avatar/".$user["avatar"], ['alt' => 'CakePHP','class'=>'profile_img']); ?>
                                    </div>
                                    <h3 class="profile-username text-center">
                                        <?=h($user["last_name"])?>
                                            <?=h($user["first_name"])?>
                                    </h3>
                                    <h4 class="profile-username text-center">
                                        <?=h($user["username"])?>
                                    </h4>
                                    <div class=" text-center">       
                                    <button type="button"  class="btn btn-default btn-file btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    <?= __('Change Profile Picture  ')?>
                                    </button>                                                           
                                     </div>           
                                    <hr>
                                    <ul>
                                        <li class="timeli">
                                            <b class="text-left">
                                                <?=__("Realestates count: "); ?>
                                            </b>
                                            <a class="text-right">
                                                <?=h($realEstatesCount) ?>
                                            </a>
                                        </li>

                                        <li class="timeli">
                                            <b class="text-left">
                                                <?=__("Active Realestates count: "); ?>
                                            </b>
                                            <?=h($realEstatesActiveCount["count"]) ?>
                                                </a>
                                        </li>
                                    </ul><hr>
                                    <ul>
                                        
                                        <li class="timeli max-width">
                                            <b class="text-left">
                                                <?=__("Email "); ?>
                                            </b>
                                            <?=h($user["email"]) ?>
                                                </a>
                                        </li>
                                        <li class="timeli">
                                            <b class="text-left">
                                                <?=__("biography "); ?>
                                            </b>
                                        </li>
                                        <li class="timeli max-width">     
                                            <?= $this->Text->truncate(h($user["biography"]),
                                                    50,
                                                    [
                                                    'ellipsis' => '...',
                                                    'exact' => false,
                                                    'class'=>'max-width'
                                                    ]) ?>
                                                </a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <ul>                                        
                                        <li class="timeli">
                                            <b class="text-left">
                                                <?=__("Change password: "); ?>
                                            </b>
                                            <?=  $this->Html->link(
                                                            'Change password',                                                            
                                                            ['controller' => 'Users', 'action' => 'resetpassword', $user["id"]]
                                                        ); ?>
                                                </a>
                                        </li>
                                        <li class="timeli">
                                            <b class="text-left">
                                                <?=__("Edit Phone: "); ?>
                                            </b>
                                            <?=  $this->Html->link(
                                                            'Edit Phone',                                                            
                                                            ['controller' => 'Phones', 'action' => 'index']
                                                        ); ?>
                                                </a>
                                        </li>
                                        <li class="timeli">
                                             
                                        </li>
                                    </ul>

                                </div>
                                <!-- /.box-body -->
                            </div>
                            </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content" style="background-color:#eee;">
                                    <div>                                         
                                        <?= $this->Form->create($user ,["class"=>"form-horizontal"]) ?>
                                            <fieldset>
                                                <!-- Form Name -->
                                                <legend><?= __("User Edit") ?></legend>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="textinput"><?= __("User Name") ?></label>
                                                    <div class="col-sm-12 col-md-4">                                                        
                                                        <?= $this->Form->control('username',["class"=>"form-control","placeholder" =>__('User Name'),"label"=> false] ); ?>
                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="textinput"><?= __('Last Name') ?></label>
                                                    <div class="col-sm-12 col-md-4">
                                                    <?= $this->Form->control('last_name',["class"=>"form-control","placeholder" =>__('Last Name'),"label"=> false] ); ?>                                                        
                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="textinput"><?= __('First Name') ?></label>
                                                    <div class="col-sm-12 col-md-4">
                                                    <?= $this->Form->control('first_name',["class"=>"form-control","placeholder" =>__('First Name'),"label"=> false] ); ?>
                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="textinput"><?= __('Email') ?></label>
                                                    <div class="col-sm-12 col-md-4">
                                                    <?= $this->Form->control('email',["class"=>"form-control","placeholder" =>__('Em@il'),"label"=> false] ); ?>
                                                    </div>

                                                    <label class="col-sm-2 control-label" for="textinput"><?= __('Biography') ?></label>
                                                    <div class="col-sm-12 col-md-4">                                                        
                                                        <?= $this->Form->control('biography',["class"=>"form-control","placeholder" =>__('Biography'),"label"=> false] ); ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <div class="pull-right">
                                                         
                                                            <?= $this->Form->button(__('Save'),["class"=>"btn btn-success"]) ?>
                                                            <?= $this->Form->end() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
 
        <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
              
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title"><?= __('Change Profile Picture') ?></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
              
                    <!-- Modal body -->
                    <div class="modal-body">
                     <?= $this->Form->create($user ,["class"=>"form-horizontal", "type" => "file"]) ?>    
                     <?= __('Upload Image:') ?>
                    </div>
                    <div class="row">
                    <div class="col-sm-3">
                    </div>
                        <div class="col-sm-3">
                    <?= $this->Form->input('avatar', ['type' => 'file', 'label'=>False, 'required'=>'false']); ?>
                             
                        </div>
                </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        
                        
                            <?= $this->Form->button(__('Save'),["class"=>"btn btn-success"]) ?>
                            <?= $this->Form->end() ?>
                    </div>
                     
                  </div>
                </div>
              </div>