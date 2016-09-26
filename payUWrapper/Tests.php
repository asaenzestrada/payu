<?php
namespace payUWrapper;

require(dirname(__FILE__).'/'.'payUCreditCard.php');
require(dirname(__FILE__).'/'.'payUOxxo.php');

$array = [];
$NewPayment = new payUCreditCard();
$NewPayment->run();
$NewPayment->response();