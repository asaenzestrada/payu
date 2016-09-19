<?php

namespace common;

class payUOxxo extends payUBase{
    
    public $cfg;
    
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
                'ACCOUNT_ID' => "512324",
                //Ingrese aquí el código de referencia.
                'REFERENCE_CODE' => $reference,
                //Ingrese aquí la descripción.
                'DESCRIPTION' => "payment test",
                
                // -- Valores --
                //Ingrese aquí el valor.
                'VALUE' => $value,
                //Ingrese aquí la moneda.
                'CURRENCY' => "MXN",
                
                //Ingrese aquí el email del comprador.
                'BUYER_EMAIL' => "buyer_test@test.com",
                //Ingrese aquí el nombre del pagador.
                'PAYER_NAME' => "First name and second buyer  name",
                //Ingrese aquí el documento de contacto del pagador.
                'PAYER_DNI' => "5415668464654",
                
                //Ingrese aquí el nombre del método de pago
                //"SANTANDER"||"SCOTIABANK"||"BANCOMER"||"OXXO"||"SEVEN_ELEVEN"||"OTHERS_CASH_MX"
                'PAYMENT_METHOD' => "OXXO",
                 
                //Ingrese aquí el nombre del pais.
                'COUNTRY' => PayUCountries::MX,
                
                //Ingrese aquí la fecha de expiración. Sólo para OXXO y SEVEN_ELEVEN
                'EXPIRATION_DATE' => "2014-09-27T00:00:00",
                //IP del pagadador
                'IP_ADDRESS' => "127.0.0.1",
    ]);
}

public static function run(){
    parent::run();
    $parameters = array(
            \PayUParameters::ACCOUNT_ID => $this->cfg['ACCOUNT_ID'],
            \PayUParameters::REFERENCE_CODE => $this->cfg['REFERENCE_CODE'],
            \PayUParameters::DESCRIPTION => $this->cfg['DESCRIPTION'],

            \PayUParameters::VALUE => $this->cfg['VALUE'],
            \PayUParameters::CURRENCY => $this->cfg['CURRENCY'],

            \PayUParameters::BUYER_EMAIL => $this->cfg['BUYER_EMAIL'],

            \PayUParameters::PAYER_NAME => $this->cfg['PAYER_NAME'],
            \PayUParameters::PAYER_DNI => $this->cfg['PAYER_DNI'],

            \PayUParameters::PAYMENT_METHOD => $this->cfg['PAYMENT_METHOD'],

            \PayUParameters::COUNTRY => $this->cfg['COUNTRY'],

            \PayUParameters::EXPIRATION_DATE => $this->cfg['EXPIRATION_DATE'],
            \PayUParameters::IP_ADDRESS => $this->cfg['IP_ADDRESS'],

    );
}
}
