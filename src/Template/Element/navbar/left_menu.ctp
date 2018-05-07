 
  <ul class="navbar-nav side-nav">
  <?php
  $roles = false;
if($loggedIn){

 foreach($rUsers->roles as $item ){
    if ($item['name'] =="Admin") {
      
      $roles = true;
      break;
    }
  }
}
if (isset($role) && $role =="Admin" || $roles ){
    ?>
  <li class="nav-item active">
   <b> <a class="nav-link" href="#"><?= __('Maintainers')?> <span class="sr-only">(current)</span></a></b>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-indent'></i> Categories"), ['plugin' => false,'controller'=>'Categories','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-bath'></i> Conditionofproperties"), ['plugin' => false,'controller'=>'Conditionofproperties','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-bed'></i> Conveniencegrades"), ['plugin' => false,'controller'=>'Conveniencegrades','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li> 
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-thermometer-full'></i> Heatingtypes"), ['plugin' => false,'controller'=>'Heatingtypes','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-car'></i> Parkings"), ['plugin' => false,'controller'=>'Parkings','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='far fa-building'></i> Types"), ['plugin' => false,'controller'=>'Types','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-users'></i> Users"), ['plugin' => false,'controller'=>'Users','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-lock'></i> Roles"), ['plugin' => false,'controller'=>'Roles','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>    
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-low-vision'></i> Permissions"), ['plugin' => false,'controller'=>'Permissions','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
   </li>
    <li class="nav-item active">
    <a class="nav-link" href="#"><?= __('maintainers')?> <span class="sr-only">(current)</span></a>
    </li>
    <?php } ?>  
    <?php if ($loggedIn) {?>
   <b> <a class="nav-link" href="#"><?= __('Maintainers')?> <span class="sr-only">(current)</span></a></b>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-indent'></i> Realestates"), ['plugin' => false,'controller'=>'Realestates','action' => 'uslist'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    
    <b> <a class="nav-link" href="#"><?= __('User')?> <span class="sr-only">(current)</span></a></b>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-indent'></i> Profile"), ['plugin' => false,'controller'=>'Users','action' => 'profile'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-indent'></i> Edit"), ['plugin' => false,'controller'=>'Users','action' => 'edit',$current_user["id"] ], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='fas fa-indent'></i> Reset password"), ['plugin' => false,'controller'=>'Users','action' => 'resetpassword'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <?php } ?>
</ul>
    