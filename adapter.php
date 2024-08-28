<?php
//Adapter

interface PaymentGateway {
    function sendMoney($amount);
}

class PaymentProcessing {
    private $pg;
    function __construct( PaymentGateway $pg){
        $this->pg = $pg;
    }
    function purchaseProduct($amount){
        $this->pg->sendMoney($amount);
    }
}

class Paypal implements PaymentGateway {
    function sendMoney($amount){
        echo "{$amount} USD has been sent from Paypal\n";
    }
}

class Stripe {
    function makePayment($amount, $currency='USD'){
        echo "{$amount} {$currency} payment from Stripe\n";
    }
}

class StripeAdapter implements PaymentGateway {
    private $pg;
    private $currency;
    function __construct(Stripe $pg, $currency='USD'){
        $this->pg = $pg;
        $this->currency = $currency;
    }
    function sendMoney($amount){
        $this->pg->makePayment($amount, $this->currency);
    }
}

$pl = new Paypal();
$sp = new Stripe();
$spa = new StripeAdapter($sp);

$payment1 = new PaymentProcessing($pl);
$payment2 = new PaymentProcessing($spa);

$payment1->purchaseProduct(1000);
$payment2->purchaseProduct(2000);