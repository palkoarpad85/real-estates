
<?= __( 'Hi {0},',  $data['user']['username']);?>
</p>
<br> <h2>
<?php  
        echo __("Realestates");
    ?></h2>
<hr>
<br>

<?php  
        echo $data["message"];
?>
<br>
<?php echo \Cake\Core\Configure::read('Site.site'); ?>
<hr>
