<?php $this->layout = 'login'; ?>

<strong><h1 class=" text-center "><?= __('Welcome to Ingatlan')?></h1>

<h2 class=' text-center'><?= __('Forgot password')?></h2></strong>
<div class="container" >

<?= $this->Form->create($user) ?>
<div class="form-group has-feedback">
    <?= $this->Form->control('new_password', array(
        'type' => 'password',
        'label' => false,
        'required' => true,
        'placeholder' => __('new password'),
        'class' => 'form-control',
        'escape' => false
    )); ?>

    <?= $this->Form->control('confirm_password', array(
        'type' => 'password',
        'label' => false,
        'required' => true,
        'placeholder' => __('confirm password'),
        'class' => 'form-control',
        'escape' => false
    )); ?>

</div>

<?=  $this->Form->button(__('Send'),                          
                     ['class' => ' btn btn-sm btn-block btn-primary']);?>
<?php echo $this->Form->end(); ?>

</div>
