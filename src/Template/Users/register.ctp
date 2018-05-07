

<?php $this->layout = 'login'; ?>


<strong><h1 class=" text-center "><?= __('Welcome to My Site')?></h1>

<h2 class=' text-center'><?= __('Register')?></h2></strong>
<hr>

<div class="center">
<?= $this->Form->create($user, ['id' => 'form']) ?>

    <div class="form-group has-feedback">
        <?= $this->Form->control('username', array(
            'type' => 'text',
            'label' => false,
            'required' => true,
            'placeholder' => __('Username'),
            'class' => 'form-control',
            'escape' => false
        )); ?>

    </div>
    <div class="form-group has-feedback">
        <?= $this->Form->control('email', array(
            'type' => 'email',
            'label' => false,
            'required' => true,
            'placeholder' => __('Em@il'),
            'class' => 'form-control' 
        )); ?>

    </div>

    <div class="form-group has-feedback">
        <?= $this->Form->control('password', array(
            'type' => 'password',
            'label' => false,
            'required' => true,
            'placeholder' => __('Password'),
            'class' => 'form-control',
            'escape' => false
        )); ?>

    </div>

    <div class="form-group has-feedback">
        <?= $this->Form->control('password_confirm', array(
            'type' => 'password',
            'label' => false,
            'required' => true,
            'placeholder' => __('Password again'),
            'class' => 'form-control',
            'escape' => false
        )); ?>

    </div>

     

    <div class="form-group has-feedback">
        <?= $this->Form->button(__('Register'),array(
            'type'=>'submit',
            'class'=> 'btn btn-primary btn-block btn-flat'
        )); ?>
    </div>
    
    <?=  $this->Html->link(__('Login'),
                          '/users/login',
                         ['class' => ' btn btn-sm btn-block btn-primary']);?>

<?php echo $this->Form->end(); ?>

</div>

