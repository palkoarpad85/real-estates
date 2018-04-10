<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate[]|\Cake\Collection\CollectionInterface $realestates
 */
?>
 <?php $this->layout = 'default';?>
 
<div class="container">
                      
    <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="http://www.puritanlifeinsurance.com/public/images/fjords_wide.jpg" alt="Los Angeles" width="100%" height="200">
        <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
        </div>   
        </div>
        <div class="carousel-item">
        <img src="http://www.puritanlifeinsurance.com/public/images/fjords_wide.jpg" alt="Chicago" width="100%" height="200">
        <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
        </div>   
        </div>
        <div class="carousel-item">
        <img src="http://www.puritanlifeinsurance.com/public/images/fjords_wide.jpg" alt="New York" width="100%" height="200">
        <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
        </div>   
        </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
       
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
         
    </a>
    </div>
<br>
<div class="container">
<div class="form-group">
    <div class="row">
    <div class="col-sm-2"><?php
        echo $this->Form->control('categories._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' => _('Categories'),'options' => $categories]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('types._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' => _('Types'),'options' => $types]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('citys._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' => _('Citys'),'options' => $citys]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('min_price', ['class' => 'form-control ', 'label' => _('Minimum Price')]); ?>
    </div>
    <div class="col-sm-2"><?php
        echo $this->Form->control('max_price', ['class' => 'form-control', 'label' => _('Maximum Price')]); ?>
    </div>
    </div>
</div> 
<br>
   <div class="row"> 
        <?php foreach($realestates as $realestate): ?> 
            <div class="col-md-4">
                <div class="box-real">
                <div class="card-body">
                <a href="/realestates/view/<?php echo $realestate->id?>">
                    <h3 class='card-title'> <?= h($this->Number->format($realestate->price)) ?> Ft <?= h($realestate->type['name']) ?>  </h3>
                    <p class='card-text'><?= h($realestate->city) ?></p>
                     <?php
                    if (empty($realestate->images)) {
                        echo 's';
                    }else{
                        echo $this->Html->image('File/Image/'.$realestate->images[0]['name'], ['alt' => 'CakePHP', 'class'=>'index_img']);
                    }
                     ?>
                    
                    </a>
                </div>
                </div>
            </div>     
    <?php endforeach; ?>
 </div> 
 
 
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
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