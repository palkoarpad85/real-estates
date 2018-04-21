<?php
/**
 * @var \App\View\AppView $this
 */

?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    //set your publishable key
    <?php $public = \Cake\Core\Configure::read('Api.StripePublishableKey'); 
    print_r("Stripe.setPublishableKey('".$public."');");
    ?>

    

    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $('#payBtn').removeAttr("disabled");
            //display the errors on the form
            $(".payment-errors").html(response.error.message);
        } else {

            var form$ =$("#paymentFrm");
            //get token id
            var token = response['id'];
            //insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            //submit form to the server
            form$.get(0).submit();
        }
    }
    $(document).ready(function() {
        //on form submit
        $("#paymentFrm").submit(function(event) {
            //disable the submit button to prevent repeated clicks
            $('#payBtn').attr("disabled", "disabled");

            //create single-use token to charge the user
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);

            //submit from callback
            return false;
        });
    });
</script>


<div class="container">
     
    <div class="row">
        <aside class="col-sm-12 ">
    <h2 class="text-center"><?= __("Payment") ?> </h2>
  
    <article class="card">
           
    <div class="card-body p-5">
            <span class="payment-errors alert-dark" >
            <br></span>
            <br>
    <p class="text-center"> <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-visa.png"> 
        <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-mastercard.png"> 
       <img src="http://bootstrap-ecommerce.com/main/images/icons/pay-american-ex.png">
    </p>
     
    <?= $this->Form->create('Payment',["id"=>"paymentFrm"]); ?>
    <div class="form-group">
    <label for="username"><?= __('Full name (on the card)') ?></label>
    <div class="input-group">
        <div class="input-group-prepend">               
            <span class="input-group-text"><i class="fa fa-user"></i></span>
        </div>
        
        <?php echo $this->Form->control('name', array(
                    'class' => 'form-control name',
                    'placeholder' =>__('Name'),
                    'label' => false,
                    'type' =>'text',
                    'required' => true
                )); ?>
    </div> <!-- input-group.// -->
    </div> <!-- form-group.// -->
    
    <div class="form-group">
    <label for="cardNumber">Card number</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
        </div>
        <?php  echo $this->Form->control('card-number', array(
                                        'class' => 'form-control card-number',
                                        'placeholder' =>__('Card number'),
                                        'size'=>'20',
                                        'type' =>'number',
                                        'label' => false,
                                        'required' => true
                                    )); ?>
    </div> <!-- input-group.// -->
    </div> <!-- form-group.// -->
    
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label><span class="hidden-xs">Expiration</span> </label>
                <div class="form-inline">
                        <?php  echo $this->Form->control('card-expiry-month', array(
                            'placeholder' =>__('exp_month'),
                            'class' => 'form-control card-expiry-month',
                            'size'=>'2',
                            'type' =>'number',
                            'label' => false,
                            'required' => true
                        )); ?>
                    <span style="width:10%; text-align: center"> / </span>
                    <?php  echo $this->Form->control('card-expiry-year', array(
                        'placeholder' =>__('exp_year'),
                        'class' => 'form-control card-expiry-year',
                        'size'=>'2',
                        'type' =>'number',
                        'label' => false,
                        'required' => true
                    )); ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label data-toggle="tooltip" title="<?= __('3 digits code on back side of the card') ?>">   CVV <i class="fa fa-question-circle"></i></label>
                <?php  echo $this->Form->control('card-cvc', array(
                                        'placeholder' =>__('CVC'),
                                        'class' => 'form-control card-cvc',
                                        'size'=>'3',
                                        'type' =>'password',
                                        'label' => false,
                                        'required' => true
                                    )); ?>
            </div> <!-- form-group.// -->
        </div>
    </div> <!-- row.// -->
    <div id="hidden">
            <input type='hidden' name='tokenpay' value='<?php print_r($this->passedArgs[0]) ?>' />
            <input type='hidden' name='tokenreal' value='<?php print_r($this->passedArgs[1]) ?>' />
        </div>
        <?= $this->Form->unlockField('stripeToken');?>
        <?= $this->Form->unlockField('tokenpay');?>
        <?= $this->Form->unlockField('tokenreal');?>
        <!-- /input-group -->

        <button type="submit" class = "subscribe btn btn-primary btn-block" id="payBtn">Submit Payment</button>
        <?= $this->Form->end () ?>
    
    </div> <!-- card-body.// -->
    </article> <!-- card.// -->
    
    
        </aside> <!-- col.// -->
        
    </div> <!-- row.// -->
    
    </div> 
  




 