<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate $realestate
 */
?>
    <?php $this->layout = 'default';?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    
                        <h3>    <?=   h($realestate->category->name) ?> <?=   h($realestate->type->name) ?></h3>      
            </div>
        </div>
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
                <hr>
                <div id="map"  style="min-width: 250px; height: 350px;"></div>
                <br>
                <li class="list-group-item">
                        <?= __("Visitors: "); echo $realestate->visitors ?>
                    </li>
            </div>
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h1>
                            <?= h($realestate->state) ?> 
                            <?= __('State')?>:
                            <?= h($realestate->city) ?>
                        </h1>
                        <h3><?= __('district') ?>:
                            <?= h($realestate->district) ?>                            
                        </h3>
                        <h3>
                            <?= h($realestate->street) ?>
                            <?= h($realestate->houseNumber) ?>
                        </h3>
                        
                    </li>
                    <li class="list-group-item">
                        <b style="font-size: 25px"><?= __("Price: "); echo $this->Number->format($realestate->price) ?> Ft</li></b>
                   <?php if($realestate->convenience_grade != null){ ?>
                    <li class="list-group-item" >
                        <?= __("Convenience Grade: "); echo h($realestate->convenience_grade->name) ?>
                    </li>
                    <?php } ?>
                    <?php if($realestate->heating_type != null){ ?>
                    <li class="list-group-item">
                        <?= __("Heating Type: "); echo h($realestate->heating_type->name) ?>
                    </li>
                    <?php } ?>
                    <?php if($realestate->condition_of_property != null){ ?>
                    <li class="list-group-item">
                        <?= __("Condition Of Property: "); echo h($realestate->condition_of_property->name) ?>
                    </li>
                    <?php } ?>
                    <?php if($realestate->parking != null){ ?>
                    <li class="list-group-item">
                        <?= __("Parking: "); echo h($realestate->parking->name) ?>
                    </li>
                    <?php } ?>
                    <?php if($realestate->rooms_numbers != null){ ?>
                    <li class="list-group-item">
                        <?= __("Rooms Rumbers: "); echo h($realestate->rooms_numbers) ?>
                    </li>
                    <?php } ?>
                    <?php if($realestate->room_numbers != null){ ?>
                    <li class="list-group-item">
                        <?= __("Rooms Numbers: "); echo h($realestate->room_numbers) ?>
                    </li><?php } ?>
                    <?php if($realestate->half_room_numbers != null){ ?>
                    <li class="list-group-item">
                        <?= __("Half Rooms Numbers: "); echo h($realestate->half_room_numbers) ?>
                    </li><?php } ?>
                    <?php if($realestate->floor_number != null){ ?>
                    <li class="list-group-item">
                        <?= __("Floor Number: "); echo h($realestate->floor_number) ?>
                    </li><?php } ?>
                    <?php if($realestate->floor_number_sum != null){ ?>
                    <li class="list-group-item">
                        <?= __("Floor Number Sum: "); echo h($realestate->floor_number_sum) ?>
                    </li><?php } ?>
                    <?php if($realestate->floor_number != null){ ?>
                    <li class="list-group-item">
                        <?= __("Floor Area: "); echo h($realestate->floor_number) ?>
                    </li><?php } ?>
                    <?php if($realestate->floor_area != null){ ?>
                    <li class="list-group-item">
                        <?= __("Land Area: "); echo h($realestate->floor_area) ?>
                    </li><?php } ?>
                    <?php if($realestate->built_year != null){ ?>
                    <li class="list-group-item">
                        <?= __("Built Year: "); echo h($realestate->built_year) ?>
                    </li><?php } ?>
                    <?php if($realestate->elevator != null){ ?>
                    <li class="list-group-item">
                        <?= __("Elevator: "); echo $realestate->elevator ? __('Yes') : __('No') ?>
                    </li><?php } ?>
                    <?php if($realestate->external_storage != null){ ?>
                    <li class="list-group-item">
                        <?= __("External Storage: "); echo $realestate->external_storage ? __('Yes') : __('No') ?>
                    </li><?php } ?>
                    <?php if (!empty($realestate->phones)): ?>
                    <li class="list-group-item">
                      <?= __("Phones: "); ?><br>
                      <?php foreach ($realestate->phones as $phones): ?>     
                            <?php if($phones->active){  echo h($phones->phoneNumber);?><?php echo"<br>";} ?>
                             
                     <?php endforeach; ?>
                    </li>
                    
                    <?php endif; ?>
                   
                </ul>
            </div>
        </div>
        <hr>
        <?php if($realestate->comment != null || !empty($realestate->comment)) { ?>
        <div class="col-md-12">            
                <?= __("Comment: ");?> <li class="list-group-item"><?= $this->Text->autoParagraph(h($realestate->comment)); ?>
            </li>
        </div>
        <?php } ?>
<br>
<hr>
        <div class="col-md-6">            
                <?= __("Message: ");?>
             <li class="list-group-item">
             <?= $this->Form->create(null, [
                            'url' => ['controller' => 'Realestates', 'action' => 'sendemail']
                        ]);?> 
                        <?= $this->Form->unlockField('email');?>
                        <?= $this->Form->unlockField('messages');?>
                        <?= $this->Form->unlockField('id');?>
                        <input type="hidden" name="id" value="<?= h($realestate->id)?>">
                <div class="form-row">
                        <div class="col-md-7 ">                        
                                <div class="form-group has-feedback">
                                    <?= $this->Form->control('email', array(
                                        'type' => 'email',
                                        'label' =>  __("Email") ,                                                       
                                        'placeholder' => __('Email'),
                                        'class' => 'form-control',
                                        'escape' => false
                                        ,'required'
                                    )); ?>
                                    <span class=" form-control-feedback "></span>
                                </div>                    
                        </div>
                     </div>
                     <div class="form-row">  
                        <div class="col-md-12">
                                <div class="form-group has-feedback">
                                        <?= $this->Form->textarea('messages', array(
                                            'type' => 'text',
                                            'label' =>  __("Message") ,                                                       
                                            'placeholder' => __('Message'),
                                            'class' => 'form-control',                                            
                                            'escape' => false
                                            ,'required'=>true
                                        )); ?>
                                        <span class=" form-control-feedback "></span>
                                </div>
                        </div>
               
                        </div>
                         
                        <?= $this->Form->button (__ ('Send'), ["class" => "btn btn-primary"]) ?>
                    <?= $this->Form->end () ?>
                
            </li>
        </div>
<br>
<br>
<br>
    </div>



    <script>
            function initMap() {
        
                
                var myLatLng = {lat: <?php echo $realestate->latitude ?>, lng: <?php echo $realestate->longitude  ?>};
                        var map = new google.maps.Map(document.getElementById('map'), {
                          center: myLatLng,
                          zoom: 17,
                        });
        
        
                var input = document.getElementById('autocomplete');
                var options = {componentRestrictions: {country: 'hu'}};
                var autocomplete = new google.maps.places.Autocomplete(input,options);
        
                var marker = new google.maps.Marker({
                      map: map,    
                      position: myLatLng,
                    })
        
        
                autocomplete.addListener('place_changed', function() {
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(19);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);
        
        
                    var place = autocomplete.getPlace();  
                    var array = $.map(place, function(value, index) {
                        return [value];
                    });
        
        
                    for (var i = 0; i < array['0'].length; i++) {
                        var input = document.createElement("input");
                        input.setAttribute("type", "hidden");
                        input.setAttribute("name",array['0'][i]['types'][0] );
                        input.setAttribute("value",array['0'][i]['long_name']);
                      
                         document.getElementById("hidden").append(input);
                    }
                });
            }
        </script>  
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPe8BzIiSGd8fO1niV_nd419WH-Ti6Ddk&libraries=places&callback=initMap" async defer></script>
        
     