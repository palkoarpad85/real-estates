
 <?php if(!isset($current_user["username"]))
 {
  ?>
  <?php $this->layout = 'login';?>
<h2 class='login_title text-center'><?= __('Reset Password')?></h2>
<hr>
<div class="container"style="width:50%;">
<div class="center">
<?php echo $this->Form->create($user); ?>
        
        <div class="form-group has-feedback">
            <?= $this->Form->control('old_password', array(
                'type' => 'password',
                'label' => false,
                'required' => true,
                'placeholder' => __('Password'),
                'class' => 'form-control',
                'escape' => false
            )); ?>
            <span class="form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->control('new_password', array(
                'type' => 'password',
                'label' => false,
                'required' => true,
                'placeholder' => __('New Password'),
                'class' => 'form-control',
                'escape' => false
            )); ?>
            <span class="form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->control('password_confirm', array(
                'type' => 'password',
                'label' => false,
                'required' => true,
                'placeholder' => __('Confirm Password'),
                'class' => 'form-control',
                'escape' => false
            )); ?>
            <span class=" form-control-feedback"></span>
        </div>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        <br>
        
    
    <?= $this->Form->end() ?>
    </div>

</div>  
 <?php }
        else{
            $this->layout = 'admin'; ?>
            <h2 class='login_title text-center'><?= __('Reset Password')?></h2>
<hr>
<div class="container"style="width:50%;">
<div class="center">
<?php echo $this->Form->create($user); ?>
        
        <div class="form-group has-feedback">
            <?= $this->Form->control('old_password', array(
                'type' => 'password',
                'label' => false,
                'required' => true,
                'placeholder' => __('Password'),
                'class' => 'form-control',
                'escape' => false
            )); ?>
            <span class=" form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->control('new_password', array(
                'type' => 'password',
                'label' => false,
                'required' => true,
                'placeholder' => __('New Password'),
                'class' => 'form-control',
                'escape' => false
            )); ?>
            <span class=" form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->control('password_confirm', array(
                'type' => 'password',
                'label' => false,
                'required' => true,
                'placeholder' => __('Confirm Password'),
                'class' => 'form-control',
                'escape' => false
            )); ?>
            <span class=" form-control-feedback"></span>
        </div>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        <br>
        
    
    <?= $this->Form->end() ?>
    </div>

</div>  
            <?php

            }?>