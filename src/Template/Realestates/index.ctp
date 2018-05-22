<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Realestate[]|\Cake\Collection\CollectionInterface $realestates
 */
?>
 <?php
 $this->layout = 'default';?>
 
<div class="container">
                      
    <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
        
        <?=  $this->Html->image('File/02.jpg', ["width=100%; height=200"]); ?>
        <div class="carousel-caption">
            <h3><?=__("ADS")?></h3>
            <p></p>
        </div>  
        </div>
        <div class="carousel-item">
        <?=  $this->Html->image('File/01.jpg', ["width=100%; height=200"]); ?>
        <div class="carousel-caption">
            <h3><?=__("ADS")?></h3>
            <p></p>
        </div>   
        </div>
        <div class="carousel-item">
        <?=  $this->Html->image('File/03.jpg', ["width=100%; height=200"]); ?>
        <div class="carousel-caption">
            <h3><?=__("ADS")?></h3>
            <p></p>
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
<?= $this->Form->create(null, ['type'=>'get'])?> 
<div class="form-group">
    <div class="row">
    <div class="col-lg-2"><?php
        echo $this->Form->control('categories._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Categories'),'options' => $categories]); ?>
    </div>
    <div class="col-lg-2"><?php
        echo $this->Form->control('types._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Types'),'options' => $types]); ?>
    </div>
    <div class="col-lg-2"><?php
        echo $this->Form->control('citys._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Citys'), 'options' => $citys]); ?>
    </div>
    <div class="col-lg-2"><?php
        echo $this->Form->control('min_price', ['class' => 'form-control ', 'label' =>__('Minimum Price')]); ?>
    </div>
    <div class="col-lg-2"><?php
        echo $this->Form->control('max_price', ['class' => 'form-control', 'label' =>__('Maximum Price')]); ?>
    </div>
    <div class="col-md-1"><br><button class="btn btn-success"   id="btnsearch" style="position: absolute;top: 33px;" ><i class='fas fa-search'></i> <?=__("Search")?></button></div>
    </div>
</div> 
<?= $this->Form->end();?>
<br>
   <div class="row"> 
        <?php foreach($realestates as $realestate): ?> 
            <div class="col-md-4">
                <div class="box-real">
                <div class="card-body" <?php if($realestate->premium > $now) echo "style=\"background: yellow;\"" ?> >
                <a href="/realestates/view/<?php echo $realestate->id?>">
                    <h3 class='card-title'> <?= h($this->Number->format($realestate->price)) ?> Ft <?= h($realestate->type['name']) ?>  </h3>
                    <p class='card-text'><?= h($realestate->city) ?></p>
                     <?php
                    if (empty($realestate->images)) {
                        echo $this->Html->image('File/Image/real-estate.png', ['alt' => 'CakePHP', 'class'=>'index_img']);
                        
                    }else{
                        echo $this->Html->image('File/Image/'.$realestate->images[0]['name'], ['alt' => 'CakePHP', 'class'=>'index_img']);
                    }
                     ?>
                    
                    </a><br>
                    <?php                    
                    if($realestate->premium > $now)  echo "<h4>". __('Highlights')."</h4>";?>
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

 
$('[id^=carousel-selector-]').click( function(){
     var id = this.id.substr(this.id.lastIndexOf("-") + 1);
     var id = parseInt(id);
     $('#myCarousel').carousel(id);
 });

 
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