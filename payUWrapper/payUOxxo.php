<?php

namespace payUWrapper;
require_once(dirname(__FILE__).'/'.'PayUBase.php');

use PayUParameters;
use PayUCountries;
use PayUPayments;

class payUOxxo extends payUBase{
    
    public function __construct($config=[]){
        if (empty($config)) {
            $config = self::getDefaults();
        }
        parent::checkParams($config, self::getDefaults());
        parent::$cfg = array_merge(self::getDefaults(), $config);
    }
    
    public static function getDefaults(){
        $random = rand(0,10000);
        $reference = "payment_test_$random";
        $value = "40";
    
        return  array_merge(parent::getDefaults(),[
                //Ingrese aquí el identificador de la cuenta.
                \PayUParameters::ACCOUNT_ID => "512324",
                //Ingrese aquí el código de referencia.
                \PayUParameters::REFERENCE_CODE => $reference,
                //Ingrese aquí la descripción.
                \PayUParameters::DESCRIPTION => "payment test",
                
                // -- Valores --
                //Ingrese aquí el valor.
                \PayUParameters::VALUE => $value,
                //Ingrese aquí la moneda.
                \PayUParameters::CURRENCY => "MXN",
                
                //Ingrese aquí el email del comprador.
                \PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
                //Ingrese aquí el nombre del pagador.
                \PayUParameters::PAYER_NAME => "First name and second buyer  name",
                //Ingrese aquí el documento de contacto del pagador.
                \PayUParameters::PAYER_DNI => "5415668464654",
                
                //Ingrese aquí el nombre del método de pago
                //"SANTANDER"||"SCOTIABANK"||"BANCOMER"||"OXXO"||"SEVEN_ELEVEN"||"OTHERS_CASH_MX"
                \PayUParameters::PAYMENT_METHOD => "OXXO",
                 
                //Ingrese aquí el nombre del pais.
                \PayUParameters::COUNTRY => \PayUCountries::MX,
                
                //Ingrese aquí la fecha de expiración. Sólo para OXXO y SEVEN_ELEVEN
                \PayUParameters::EXPIRATION_DATE => "2016-12-27T00:00:00",
                //IP del pagadador
                \PayUParameters::IP_ADDRESS => "127.0.0.1",
    ]);
}

public static function run(){
    parent::run();
}

public static function response(){
    $response = PayUPayments::doAuthorizationAndCapture(parent::$cfg);
    if($response){
        print_r($response->transactionResponse->orderId);
        print_r($response->transactionResponse->transactionId);
        print_r($response->transactionResponse->state);
        if($response->transactionResponse->state=="PENDING"){
            $response->transactionResponse->pendingReason;
            $response->transactionResponse->extraParameters->URL_PAYMENT_RECEIPT_HTML;
            $response->transactionResponse->extraParameters->REFERENCE;
        }
         print_r($response->transactionResponse->responseCode);
    }
}
}
