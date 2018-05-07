
<hr>
<?= __( 'Hi {0},',  $data['user']['username']);


     ?>
     <br>
</p>
<?= __(
    "Thanks registration. ",
    $this->Html->link(
        __('confirmation of registration Link'),
        \Cake\Core\Configure::read('Site.full_url').$data["user"]["token"],
        ['style' => 'color:#1ABC9C;text-decoration:none;']
    )
) ?>
<hr>

<?php echo \Cake\Core\Configure::read('Site.site'); ?>
<hr>


