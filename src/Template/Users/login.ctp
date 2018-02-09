
    <h1 class="welcome text-center"><?= __('Welcome to Ice Code')?></h1>

        <h2 class='login_title text-center'><?= __('Login')?></h2>
        <hr>

        <div class="center">
        <form class="form-signin">
            <div class="form-group has-feedback">
                <?= $this->Form->control('email', array(
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

            <button class="btn btn-lg btn-primary" type="submit">Login</button>
        </form><!-- /form -->
        </div>


