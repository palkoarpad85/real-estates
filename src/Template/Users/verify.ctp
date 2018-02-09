

<?php $this->layout = 'login'; ?>
<h2 class=' text-center'><?= __('Verify')?></h2></strong>
<hr>
<div class="center">
    <div class="text-center">
        <h1><strong> <?= __('Hi, ')?>
         <?= $username?></strong></h1>
    </div>

    <?= $this->Form->create() ?>

    <div class="input-group">
        <input type="text" readonly value="<?= isset($email)? $email : "" ?>" class="form-control">

        <div class="input-group-btn">
            <button class="btn btn-lg btn-primary"  style="margin-left: 5px  " type="submit">Login</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
