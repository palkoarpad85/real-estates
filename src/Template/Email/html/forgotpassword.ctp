
<hr>
<?= __( 'Hi {0},',  $data['user']['username']);


     ?>
</p>
<?php 
    if($data["template"] == "forgotpassword"){

        echo __(
            "Forgot password {0}.",
            $this->Html->link(
                __( 'Link'),
                \Cake\Core\Configure::read('Site.full_url_password').$data["user"]["password_code"],
                ['style' => 'color:#1ABC9C;text-decoration:none;']
            )
        );

    }
    elseif($data["template"] == "register"){
        echo __(
            "Registrations {0}.",
            $this->Html->link(
                __( 'Link'),
                \Cake\Core\Configure::read('Site.full_url_password').$data["user"]["token"],
                ['style' => 'color:#1ABC9C;text-decoration:none;']
            )
        ) ;
    }
    ?>
<hr>

<?php echo \Cake\Core\Configure::read('Site.site'); ?>
<hr>
