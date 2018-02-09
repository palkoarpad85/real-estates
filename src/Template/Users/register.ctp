

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
            'class' => 'form-control',
            'escape' => false
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
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck2" >
            <label class="custom-control-label bg-primary text-white" for="customCheck2"> I agree to the terms</label>
        </div>

    </div>

    <div class="form-group has-feedback">
        <?= $this->Form->button(__('Register'),array(
            'type'=>'submit',
            'class'=> 'btn btn-primary btn-block btn-flat'
        )); ?>

    </div>


<?php echo $this->Form->end(); ?>

</div>

