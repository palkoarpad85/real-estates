 


<div class="container">
      <div class="col-md-12 text-center">
       <h3> <?= __('Premium'); ?></h3>
        <br />
    </div>
 <div class="row text-center">
      <div class="col-sm-4">
        <div class="pricing-wrapper ">
          <div class="pricing-table">

            <div class="price-wrap">
              <span class="price">$ 5 </span><small>/<?= __('1 months')?></small>
            </div>
            <hr />
            <span class="type">
            <h3><b><?= __('1 months Highlights')?></b></h3>
              </span> 
             
            <hr />
            <?=     $this->Html->link(
                    'Pay',
                    array(
                        'controller'=> 'Payment',
                        'action'=>'payment',
                        '10',
                         $realestate->id
                    ),
                    array(

                        'data-original-title' => __('INFO'),
                        'class'               => 'btn btn-info',
                        'escape'              => false
                    )
                );
                ?>
          </div>

        </div>
      </div>
      <div class="col-sm-4">
        <div class="pricing-wrapper ">
          <div class="pricing-table">

            <div class="price-wrap">
              <span class="price">$ 13 </span><small>/ <?= __('3 months')?></small>
            </div>
            <hr />
            <span class="type popular">
            <h3><b><?= __('3 months Highlights')?></b></h3>
              </span>
            
            
            <hr />
            <?=     $this->Html->link(
                    'Pay',
                    array(
                        'controller'=> 'Payment',
                        'action'=>'payment',
                        '20',
                         $realestate->id
                    ),
                    array(

                        'data-original-title' => __('INFO'),
                        'class'               => 'btn btn-info',
                        'escape'              => false
                    )
                );
                ?>
          </div>

        </div>
      </div>
       
      <div class="col-sm-4">
        <div class="pricing-wrapper ">
          <div class="pricing-table">

            <div class="price-wrap">
            <span class="price">$ 33 </span><small>/ <?= __('12 months')?></small>
            </div>
            <hr />
            <span class="type">
            <h3><b><?= __('12 months Highlights')?></b></h3>
              </span>
            
            
             
            <hr />
            <?=     $this->Html->link(
                    'Pay',
                    array(
                        'controller'=> 'Payment',
                        'action'=>'payment',
                        '30',
                         $realestate->id
                    ),
                    array(

                        'data-original-title' => __('INFO'),
                        'class'               => 'btn btn-info',
                        'escape'              => false
                    )
                );
                ?>
          </div>

        </div>
      </div>
    </div>
</div>
<br/>
<br/>
<br/>


