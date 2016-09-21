<?php

namespace payUWrapper;
require(dirname(__FILE__).'/'.'PayUBase.php');

use PayUParameters;
use PayUCountries;

class payUOxxo extends payUBase{
    
    public function __construct($config=[]){
        parent::checkParams($config, self::getDefaults());
        $this->cfg = array_merge(self::getDefaults(), $config);
    }
    
    public static function getDefaults(){
        $random = rand(0,10000);
        $reference = "payment_test_$random";
        $value = "40";
    
        return  array_merge(parent::getDefaults(),[
                //Ingrese aquí el identificador de la cuenta.
                \PayUParameters::ACCOUNT_ID => "512324",
                //Ingrese aquí el código de referencia.
                \PayUParameters::RFERENCE_CODE => $reference,
                //Ingrese aquí la descripción.
                \PayUParameters::DESCRIPTION => "payment test",
                
                // -- Valores --
                //Ingrese aquí el valor.
                \PayUParameters::VALUE => $value,
                //Ingrese aquí la moneda.
                'CURRENCY' => "MXN",
                
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
}
