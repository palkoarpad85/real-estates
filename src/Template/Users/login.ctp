
    <?php $this->layout = 'login';?>
    <h1 class="welcome text-center"><?= __('')?></h1>

        <h2 class='login_title text-center'><?= __('Login')?></h2>
        <hr>

        <div class="center">
        <?php echo $this->Form->create(); ?>
                <div class="form-group ">
                    <?= $this->Form->control('username', array(
                        'type'        => 'text',
                        'label'       => false,
                        'required'    => true,
                        'placeholder' => __('User name'),
                        'class'       => 'form-control form-control-succes',
                        'escape'      => false,
                        'autofocus'   =>true
                    )); ?>
                    <span class="form-icon">
                   
                    </span>
                </div>
              
                <div class="form-group has-feedback">
                    <?= $this->Form->control('password', array(
                        'type' => 'password',
                        'label' => false,
                        'required' => true,
                        'placeholder' => __('Password'),
                        'class' => 'form-control form-control-success',
                        'escape' => false
                    )); ?>
                    <span class=" form-control-feedback"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit"><?= __('Login')?></button>
                <br>
                <?=  $this->Html->link(__('Register'),
                                      '/users/register',
                                     ['class' => ' btn btn-sm btn-block btn-primary']);?>
            <?= $this->Form->end() ?>
            <?=  $this->Html->link(__('forgotpassword'),
                                      '/users/forgotpassword',
                                     ['class' => ' ']);?>

            </div>


