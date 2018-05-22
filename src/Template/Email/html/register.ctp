
<hr>
<?= __( 'Hi {0},',  $data['user']['username']);


     ?>
     <br>
</p>
<?= __(
    "Thanks registration. ");
 
      echo  \Cake\Core\Configure::read('Site.full_url').$data["user"]["token"];
       
     
 ?>
<hr>

<?php echo \Cake\Core\Configure::read('Site.site'); ?>
<hr>


