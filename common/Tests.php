<?php
namespace common;

require(dirname(__FILE__).'/'.'payUCreditCard.php');
use common\payUCreditCard;

$array = [];
$NewPayment = new payUCreditCard($array);
$NewPayment->run();
$NewPayment->response();