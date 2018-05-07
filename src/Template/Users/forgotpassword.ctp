<?php $this->layout = 'login'; ?>

    <strong><h1 class=" text-center "><?= __('Welcome to Ingatlan')?></h1>

    <h2 class=' text-center'><?= __('Forgot password')?></h2></strong>
<div class="container" >

    <?= $this->Form->create() ?>
    <div class="form-group has-feedback">
        <?= $this->Form->control('email', array(
            'type' => 'email',
            'label' => false,
            'required' => true,
            'placeholder' => __('Em@il'),
            'class' => 'form-control',
            'escape' => false
        )); ?>

    </div>
    
    <?=  $this->Form->button(__('Send'),                          
                         ['class' => ' btn btn-sm btn-block btn-primary']);?>
    <?php echo $this->Form->end(); ?>

</div>
