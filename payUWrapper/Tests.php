<?php
namespace payUWrapper;

require(dirname(__FILE__).'/'.'payUCreditCard.php');

$array = [];
$NewPayment = new payUCreditCard($array);
$NewPayment->run();
$NewPayment->response();