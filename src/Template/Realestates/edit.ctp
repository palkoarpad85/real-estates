<div class="container">
 
    <?= $this->Form->create($realestate,['class' => 'needs-validation','type' => 'file','novalidate']) ?>
     
    <div class="row">
        <div class="col-md-6">
                <div class="form-row">
                        <div class="col-md-6 ">
                                <div class="form-group">
                                         <?= $this->Form->control('type_id', ['class'=>'custom-select','label' =>__('Types'), 'empty' => true,'required']);?>
                                         <span class=" form-control-feedback "></span>
                                </div>    
                        </div>
                        <div class="col-md-6">
                         
                                    <div class="form-group">
                                            <?= $this->Form->control('category_id', ['options' => $categories,
                                             'class'=>'custom-select', 'empty' => true ,'required','label' =>__('Categories')] );?>
                                             <span class=" form-control-feedback "></span>
                                    </div>   
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-6 ">                        
                                <div class="form-group has-feedback">
                                    <?= $this->Form->control('price', array(
                                        'type' => 'number',
                                        'label' =>  __("Price") ,                                                       
                                        'placeholder' => __('Price'),
                                        'class' => 'form-control',
                                        'escape' => false
                                        ,'required'
                                    )); ?>
                                    <span class=" form-control-feedback "></span>
                                </div>                    
                        </div>
                        <div class="col-md-6">
                                <div class="form-group has-feedback">
                                        <?= $this->Form->control('googlecity', array(
                                            'type' => 'text',
                                            'label' =>  __("Address") ,                                                       
                                            'placeholder' => __('Address'),
                                            'class' => 'form-control',
                                            'id' => 'autocomplete',
                                            'value' => $realestate["city"].', '.$realestate["street"].', '.$realestate["houseNumber"],
                                            'escape' => false
                                            ,'required'
                                        )); ?>
                                        <span class=" form-control-feedback "></span>
                                </div>
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-6 ">
                                <div class="form-group has-feedback">
                                        <?= $this->Form->control('built_year', array(
                                            'type' => 'year',
                                            'minYear' => date('Y')-200, 
                                            'maxYear' => date('Y')-0+1, 
                                            'label' =>  __("Build year"),
                                            'class' => 'form-control',
                                            'empty' => __('- change -'),                                            
                                        )); ?>
                                        <span class=" form-control-feedback "></span>
                                </div>
                        </div>
                        <div class="col-md-6">
                                  
                        </div>
                </div>
                <div class="form-row">
                        <div class="col-md-6 ">                   
                                <div class="form-group has-feedback">
                                        <?php  $sizes = ['0' => '0', '1' => '1', '2' => '2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7',
                                                '8'=>'8','9'=>'9','10'=>'10'];
                                            echo $this->Form->control('rooms_numbers',  array('type' => 'select','options'=>$sizes,
                                                    'label'=>__('Rooms numbers'),
                                                    'class' => 'custom-select',
                                                    'empty' => true,
                                                    'required' => false
                                                )
                                            ); ?>
                                </div>
                            </div>

                        <div class="col-md-6">

                                <div class="form-group has-feedback">
                                        <?php  $sizes = ['0' => '0', '1' => '1', '2' => '2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7',
                                                '8'=>'8','9'=>'9','10'=>'10'];
                                            echo $this->Form->control('half_room_numbers',  array('type' => 'select','options'=>$sizes,
                                                    'label'=>__('Half Rooms numbers'),
                                                    'class' => 'custom-select',
                                                    'empty' => true,
                                                    'required' => false
                                                )
                                            ); ?>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-md-6">
                <div id="map"  style="min-width: 250px; height: 250px;"></div>
        </div>
    </div>
    

        <div class="form-row">        
            <div class="col-md-3 mb-3">
                <div class="form-group has-feedback">
                                        <?= $this->Form->control('floor_area', array(
                                            'type' => 'number',
                                            'label' =>  __("Floor area") ,                                                       
                                            'placeholder' => __('Floor area'),
                                            'class' => 'form-control',
                                            'escape' => false
                                            
                                        )); ?>
                                        <span class=" form-control-feedback "></span>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                    <div class="form-group has-feedback">
                            <?= $this->Form->control('land_area', array(
                                'type' => 'number',
                                'label' =>  __("Land area"),                                                       
                                'placeholder' => __('Land area'),
                                'class' => 'form-control',
                                'escape' => false
                                
                            )); ?>
                            <span class=" form-control-feedback "></span>
                    </div>
            </div>

            <div class="col-md-3 mb-3">

                    <div class="form-group">
                            <?= $this->Form->control('heatingType_id', ['options' => $heatingTypes,
                             'class'=>'custom-select','label' =>  __("Heating Type"), 'empty' => true ] );?>
                    </div>   
                </div>

                <div class="col-md-3 mb-3">
                        <div class="form-group">
                                <?= $this->Form->control('conditionOfProperty_id', ['options' => $conditionOfProperties,
                                 'class'=>'custom-select','label' =>  __("Condition Of Property"), 'empty' => true ] );?>
                        </div> 
                    </div>
        </div>

<div class="form-row">
                 <div class="col-md-3 mb-3">
                    <div class="form-group has-feedback">
                            <?= $this->Form->control('balcony_size', array(
                                'type' => 'number',
                                'label' =>  __("Balcony size"),                                                       
                                'placeholder' => __('Balcony size'),
                                'class' => 'form-control',
                                'escape' => false
                                
                            )); ?>
                            <span class=" form-control-feedback "></span>
                    </div>
            </div>

            <div class="col-md-3 mb-3">
                

                        <div class="form-group has-feedback">
                                <?php  $elevator = ['0' => __('No'), '1' => __('Yes')];
                                            echo $this->Form->control('half_room_numbers',  array('type' => 'select','options'=>$elevator,
                                                    'label'=>__('Elevator'),
                                                    'class' => 'custom-select',
                                                    'empty' => true,
                                                    'required' => false
                                                )
                                            ); ?>
                                <span class=" form-control-feedback "></span>
                        </div>  
            </div>

            <div class="col-md-3 mb-3">
                    <div class="form-group has-feedback">
                            <?php  
                                        echo $this->Form->control('convenienceGrade_id',  array('type' => 'select',
                                                'label'=>__('Convenience grade'),
                                                'class' => 'custom-select',
                                                'empty' => true,
                                                'required' => false
                                            )
                                        ); ?>
                            <span class=" form-control-feedback "></span>
                    </div>    
                </div>

                <div class="col-md-3 mb-3">
                        <div class="form-group has-feedback">
                                <?php 
                                            echo $this->Form->control('parkings',  array('type' => 'select',
                                                    'label'=>__('Parkings'),
                                                    'class' => 'custom-select',
                                                    'empty' => true,
                                                    'required' => false
                                                )
                                            ); ?>
                                <span class=" form-control-feedback "></span>
                        </div>  
                    </div> 
</div>
 
<div class="form-row">     
            <div class="col-md-3 mb-3">
                    <div class="form-group has-feedback">
                            <?php  $sizes = ['0' => '0', '1' => '1', '2' => '2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7',
                                    '8'=>'8','9'=>'9','10'=>'10'];
                                echo $this->Form->control('floor_number',  array('type' => 'select','options'=>$sizes,
                                        'label'=>__('Floor numbers'),
                                        'class' => 'custom-select',
                                        'empty' => true,
                                        'required' => false
                                    )
                                ); ?>
                    </div>                 
            </div>

            <div class="col-md-3 mb-3">
                    <div class="form-group has-feedback">
                            <?php  $sizes = ['0' => '0', '1' => '1', '2' => '2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7',
                                    '8'=>'8','9'=>'9','10'=>'10'];
                                echo $this->Form->control('floor_number_sum',  array('type' => 'select','options'=>$sizes,
                                        'label'=>__('Floor numbers numbers'),
                                        'class' => 'custom-select',
                                        'empty' => true,
                                        'required' => false
                                    )
                                ); ?>
                    </div>
            </div>

            <div class="col-md-3 mb-3">
                    <div class="form-group has-feedback">
                            <?php  $external_storage = ['0' => __('No'), '1' => __('Yes')];
                                        echo $this->Form->control('external_storage',  array('type' => 'select','options'=>$external_storage,
                                                'label'=>__('External storage'),
                                                'class' => 'custom-select',
                                                'empty' => true,
                                                'required' => false
                                            )
                                        ); ?>
                            <span class=" form-control-feedback "></span>
                    </div>  
  
                </div>

                <div class="col-md-3 mb-3">
                        <div class="form-group has-feedback">
                                <?php  

                                        echo $this->Form->control('phones._ids', 
                                                                ['class' => 'custom-select js-multiple',
                                                                 'multiple'=>'multiple',
                                                                 'label' => __('Phones')]);  

                                            ?>
                                <span class=" form-control-feedback "></span>
                        </div>    
                            
                    </div>
</div>

<div class="form-row">
     
    <div class="col-md-6 mb-6">
            <div class="form-group has-feedback">
                    <?= $this->Form->control('comment', array(
                        'type' => 'textarea',
                        'label' =>  __("Comment") ,                                                       
                        'placeholder' => __('Comment'),
                        'class' => 'form-control',
                        'escape' => false,
                        'rows' => 5,
                        'required' => false
                        
                    )); ?>
                    <span class=" form-control-feedback "></span>
            </div>
             
             
    </div>
    <div class="col-md-6    ">
            
        </div>
        
</div>


                    <?= $this->Form->unlockField('country');?>
                    <?= $this->Form->unlockField('locality');?>
                    <?= $this->Form->unlockField('postal_code');?>
                    <?= $this->Form->unlockField('street_number');?>
                    <?= $this->Form->unlockField('route');?>
                    <?= $this->Form->unlockField('googlecity');?>
                    <?= $this->Form->unlockField('sublocality_level_1');?>
                    <?= $this->Form->unlockField('administrative_area_level_1');?>
           

                    <div id="hidden">
                     
                    </div>
                    <?= $this->Form->button (__ ('Submit'), ["class" => "btn btn-primary"]) ?>
                    <?= $this->Form->end () ?>
</div>
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
    
 
 <script>
    $(document).ready(function() {
    $('.js-multiple').select2();
});
</script>