
<hr>
<?= __( 'Hi {0},',  $data['user']['username']);


     ?>
</p>
<?php 
    
   
        echo __(
            "Change ",
            $this->Html->link(
                __( 'do it there please'),
                \Cake\Core\Configure::read('Site.full_url_password').$data["user"]["token"],
                ['style' => 'color:#1ABC9C;text-decoration:none;']
            )
        ) ;
    ?>
<hr>

<?php echo \Cake\Core\Configure::read('Site.site'); ?>
<hr>
