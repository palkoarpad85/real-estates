
    <?php $this->layout = 'login';?>
    <h1 class="welcome text-center"><?= __('Welcome to Ice Code')?></h1>

        <h2 class='login_title text-center'><?= __('Login')?></h2>
        <hr>

        <div class="center">
        <?php echo $this->Form->create(); ?>
                <div class="form-group ">
                    <?= $this->Form->control('username', array(
                        'type'        => 'text',
                        'label'       => false,
                        'required'    => true,
                        'placeholder' => __('Em@il'),
                        'class'       => 'form-control form-control-succes',
                        'escape'      => false,
                        'autofocus'   =>true
                    )); ?>
                    <span class="form-icon">
                    <i class="fa fa-envelope"></i>
                    </span>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone" type="text" placeholder="Phone" class="form-control" required>
                                        <div class="form-icon"><i class="fa fa-phone"></i></div>
                                    </div>
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
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <br>
                <?=  $this->Html->link(__('Register'),
                                      '/users/register',
                                     ['class' => ' btn btn-sm btn-block btn-primary']);?>
            <?= $this->Form->end() ?>
            </div>


