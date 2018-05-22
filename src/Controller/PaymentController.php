<?php

namespace App\Controller;

use App\Controller\AppController;
use Stripe\Stripe;
use Cake\I18n\Time;
 

class PaymentController extends AppController
{
 

    public function payment($pay = null,$id = null)
    {
        $premiumtime=null;
        
        if ($this->request->is('post')) {
            
            if (!isset($this->request->params['_csrfToken']) || ($this->request->params['_csrfToken'] != $this->request->cookies['csrfToken'])) {
                $this->Security->blackHoleCallback = '__blackhole';
            } else {
                $amount = $this->request->data["tokenpay"];
                $premiumtime = $this->getDate($amount);      

                $realid =$this->request->data["tokenreal"];
                $token  = $this->request->data["stripeToken"];
                $name = $this->request->data["name"];
                $email = $this->Auth->user(["email"]);
                $card_num = $this->request->data["card-number"];
                $card_cvc = $this->request->data["card-cvc"];
                $card_exp_month = $this->request->data["card-expiry-month"];
                $card_exp_year = $this->request->data["card-expiry-year"];


                $stripe = array(
                    "secret_key" => \Cake\Core\Configure::read('Api.StripeSecret_key'),
                    "publishable_key" => \Cake\Core\Configure::read('Api.StripePublishableKey')
                );
                Stripe::setApiKey($stripe['secret_key']);

                $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source' => $token
                ));

                $itemName = "Premium";
                $itemNumber = "PS123456";
                $itemPrice = $amount * 100;
                $currency = "usd";
                $orderID = $realid;

                $charge = \Stripe\Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => $itemPrice,
                    'currency' => $currency,
                    'description' => $itemName,
                    'metadata' => array(
                        'order_id' => $orderID
                    )
                ));

                $chargeJson = $charge->jsonSerialize();


                if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {

                    $table = $this->loadModel('Realestates');
                    $real = $table->get($realid);
                    $now = Time::now();                   
                                      
                    if ($real->premium==null) {
                       
                        $now->addDays($premiumtime);
                        $premuimend = $now;
                    }
                    else {
                        $pre = $real->premium;
                        $premuimend =  $pre->addDays($premiumtime);                    
                    }
                                       
                    $real->premium=$premuimend;
                    if ($this->Realestates->save($real)) {
                        $this->Flash->success(__('The payment success.'));
                    }                    
                }
              }
        }

        $this->set(compact('realId','payId'));
        $this->set('_serialize', ['realId']);

    }

    private function getDate($amount = null){

        if($amount==10){
            $amount=5;
            $premiumtime=30;
        }elseif ($amount==20){
            $amount=9;
            $premiumtime=60;
        }
        elseif ($amount==30){
            $amount=25;
            $premiumtime=180;
        }
        else{
            $this->Flash->error(__('Try again.'));
            return $this->redirect(['controller'=>'Realestates','action' => 'premium']);
        }
        return $premiumtime;
    }
}
?>
