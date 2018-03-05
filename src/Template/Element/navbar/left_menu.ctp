 
  <ul class="navbar-nav side-nav">
  <?php if ( $role =="Admin" && !isset($role)  ) {
           
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
    <li class="nav-item">
    <a class="nav-link" href="#">Side Menu Items</a>
    </li>          
    <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
     <li class="nav-item">
            <a class="nav-link" href="#">Side Menu Items</a>
     </li>       
</ul>
    