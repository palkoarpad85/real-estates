
    <h1 class="welcome text-center"><?= __('Welcome to Ice Code')?></h1>

        <h2 class='login_title text-center'><?= __('Login')?></h2>
        <hr>

        <div class="center">
        <?php echo $this->Form->create(); ?>
                <div class="form-group has-feedback">
                    <?= $this->Form->control('username', array(
                        'type'        => 'text',
                        'label'       => false,
                        'required'    => true,
                        'placeholder' => __('Em@il'),
                        'class'       => 'form-control',
                        'escape'      => false,
                        'autofocus'   =>true
                    )); ?>
                    <span class="fa fa-envelope form-control-feedback"></span>
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
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <br>
                <?=  $this->Html->link(__('Register'),
                                      '/users/register',
                                     ['class' => ' btn btn-sm btn-block btn-primary']);?>
            <?= $this->Form->end() ?>
            </div>


