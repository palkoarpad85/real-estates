<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate $realestate
 */
?>
 <?php $this->layout = 'default';?>

<div class="container-fluid">
    <div class="row">
    <div class="col-md-6">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

    <?php if(isset($realestate->images)){
      foreach($realestate->images as $key => $real):
        if($key==0) {
            print_r("<li data-target='#carouselExampleIndicators' data-slide-to='".$key."'class='active'></li>");
        }else {
            print_r("<li data-target='#carouselExampleIndicators' data-slide-to='".$key."'></li>");
        }
     endforeach; 
    }
    ?>

  </ol>
  <div class="carousel-inner">

    <?php if(isset($realestate->images)){
      foreach($realestate->images as $key=>$real):
        if($key==0) {
            print_r("<div class='carousel-item active'>");
            echo $this->Html->image('File/Image/'.$real['name'], ['alt' => '', 'class'=>'d-block max-heigth']);
            print_r("</div>");
        }else {
            print_r("<div class='carousel-item'>");
            echo $this->Html->image('File/Image/'.$real['name'], ['alt' => '', 'class'=>'d-block max-heigth']);
            print_r("</div>");
        }
     endforeach; 
    }
    else{
        print_r("<div class='carousel-item active'>
                  <img class='d-block w-100 h-50' src='http://kutyas.kepek1.hu/kep/kutyas-kepek_5.jpg'></div>");
    }
    ?>
  </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
    <div class="col-md-6">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><h1><?= h($realestate->city) ?> <?= h($realestate->street) ?></h1></li>
        <li class="list-group-item"> <?= __("Price:"); echo $this->Number->format($realestate->price) ?> Ft</li>
        <li class="list-group-item"> <?= __("Type: "); echo h($realestate->type->name) ?></li>
        <li class="list-group-item"> <?= __("Category: "); echo h($realestate->category->name) ?></li>
        <li class="list-group-item"> <?= __("Convenience Grade: "); echo h($realestate->convenience_grade->name) ?></li>
       


        
 
    </ul>
    </div>


    </div>
</div>
 

<hr>
<div class="realestates view large-9 medium-8 columns content">
    <h3><?= h($realestate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $realestate->has('user') ? $this->Html->link($realestate->user->id, ['controller' => 'Users', 'action' => 'view', $realestate->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $realestate->has('type') ? $this->Html->link($realestate->type->name, ['controller' => 'Types', 'action' => 'view', $realestate->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $realestate->has('category') ? $this->Html->link($realestate->category->name, ['controller' => 'Categories', 'action' => 'view', $realestate->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Convenience Grade') ?></th>
            <td><?= $realestate->has('convenience_grade') ? $this->Html->link($realestate->convenience_grade->name, ['controller' => 'Conveniencegrades', 'action' => 'view', $realestate->convenience_grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Heating Type') ?></th>
            <td><?= $realestate->has('heating_type') ? $this->Html->link($realestate->heating_type->name, ['controller' => 'Heatingtypes', 'action' => 'view', $realestate->heating_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condition Of Property') ?></th>
            <td><?= $realestate->has('condition_of_property') ? $this->Html->link($realestate->condition_of_property->name, ['controller' => 'Conditionofproperties', 'action' => 'view', $realestate->condition_of_property->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parking') ?></th>
            <td><?= $realestate->has('parking') ? $this->Html->link($realestate->parking->name, ['controller' => 'Parkings', 'action' => 'view', $realestate->parking->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZipCode') ?></th>
            <td><?= h($realestate->zipCode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($realestate->state) ?></td>
        </tr>
      
        <tr>
            <th scope="row"><?= __('Street') ?></th>
            <td></td>
        </tr>
        <tr>
            <th scope="row"><?= __('HouseNumber') ?></th>
            <td><?= h($realestate->houseNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($realestate->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($realestate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rooms Numbers') ?></th>
            <td><?= $this->Number->format($realestate->rooms_numbers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Half Room Numbers') ?></th>
            <td><?= $this->Number->format($realestate->half_room_numbers) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Number') ?></th>
            <td><?= $this->Number->format($realestate->floor_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Number Sum') ?></th>
            <td><?= $this->Number->format($realestate->floor_number_sum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Floor Area') ?></th>
            <td><?= $this->Number->format($realestate->floor_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Land Area') ?></th>
            <td><?= $this->Number->format($realestate->land_area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visitors') ?></th>
            <td><?= $this->Number->format($realestate->visitors) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($realestate->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($realestate->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($realestate->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($realestate->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Premium') ?></th>
            <td><?= h($realestate->premium) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Built Year') ?></th>
            <td><?= h($realestate->built_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($realestate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($realestate->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Elevator') ?></th>
            <td><?= $realestate->elevator ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('External Storage') ?></th>
            <td><?= $realestate->external_storage ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $realestate->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($realestate->comment)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Phones') ?></h4>
        <?php if (!empty($realestate->phones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('PhoneNumber') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($realestate->phones as $phones): ?>
            <tr>
                <td><?= h($phones->id) ?></td>
                <td><?= h($phones->active) ?></td>
                <td><?= h($phones->phoneNumber) ?></td>
                <td><?= h($phones->created) ?></td>
                <td><?= h($phones->created_by) ?></td>
                <td><?= h($phones->modified) ?></td>
                <td><?= h($phones->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Phones', 'action' => 'view', $phones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Phones', 'action' => 'edit', $phones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Phones', 'action' => 'delete', $phones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($realestate->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Realestate Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($realestate->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->realestate_id) ?></td>
                <td><?= h($images->active) ?></td>
                <td><?= h($images->name) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->created_by) ?></td>
                <td><?= h($images->modified) ?></td>
                <td><?= h($images->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
