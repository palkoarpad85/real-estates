  <ul class="navbar-nav side-nav">
  <li class="nav-item active">
   <b> <a class="nav-link" href="#"><?= __('Maintainers')?> <span class="sr-only">(current)</span></a></b>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='far fa-share-square'></i> Categories"), ['plugin' => false,'controller'=>'Categories','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li>
    <li class="nav-item">
    <?=$this->Html->link( __("<i class='far fa-share-square'></i> Conditionofproperties"), ['plugin' => false,'controller'=>'Conditionofproperties','action' => 'index'], ['class'=>'nav-link', 'escape' => false])?>
    </li> 
   </li>
    <li class="nav-item active">
    <a class="nav-link" href="#"><?= __('maintainers')?> <span class="sr-only">(current)</span></a>
    </li>
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
    