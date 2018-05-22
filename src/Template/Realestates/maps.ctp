<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate[]|\Cake\Collection\CollectionInterface $realestates
 */
?>
 <?php $this->layout = 'default';?>
 
<div class="container">
 
<div class="container">
<div class="form-group">
    <div class="row">
    <div class="col-sm-2"><?php
        echo $this->Form->control('categories._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Categories'),'options' => $categories]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('types._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Types'),'options' => $types]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('citys._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Citys'),'options' => $citys]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('min_price', ['class' => 'form-control ', 'label' =>__('Minimum Price')]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('max_price', ['class' => 'form-control', 'label' =>__('Maximum Price')]); ?>
    </div>
    </div>
</div> 
<br>
   <div class="row"> 
       <div id="map" style="width: 100%; height: 550px;"></div>

        <br>
 </div> 
 
 
    
</div>
</div>

<script>
  jQuery(document).ready(function($) {
 
 $('#myCarousel').carousel({
         interval: 500
 });

 $('#carousel-text').html($('#slide-content-0').html());

 //Handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
     var id = this.id.substr(this.id.lastIndexOf("-") + 1);
     var id = parseInt(id);
     $('#myCarousel').carousel(id);
 });


 // When the carousel slides, auto update the text
 $('#myCarousel').on('slid.bs.carousel', function (e) {
          var id = $('.item.active').data('slide-number');
         $('#carousel-text').html($('#slide-content-'+id).html());
 });
});</script>

 <script>
    $(document).ready(function() {
    $('.js-multiple').select2();
});
</script>

<script>
function initMap() {

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 3,  
  center: {lat:47.518, lng: 10.887}
});
 
 
var infoWin = new google.maps.InfoWindow();
 
  var markers = locations.map(function(location, i) {
    var marker = new google.maps.Marker({
      position: location
    });
    google.maps.event.addListener(marker, 'click', function(evt) {
      infoWin.setContent(location.info);
      infoWin.open(map, marker);
    })
    return marker;
  });

  // Add a marker clusterer to manage the markers.
  var markerCluster = new MarkerClusterer(map, markers, {
    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
  });

}

var locations = [];
    <?php foreach($realestates as $realestate): ?> 
locations.push({
    lat: <?php echo $realestate->latitude ?>,
    lng: <?php echo $realestate->longitude ?>,
    info: "<?php echo $realestate->price ?>",
});


<?php endforeach; ?>
google.maps.event.addDomListener(window, "load", initMap);

</script>
 <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPe8BzIiSGd8fO1niV_nd419WH-Ti6Ddk&libraries=places&callback=initMap" async defer></script>
    