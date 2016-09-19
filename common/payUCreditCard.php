<?php
namespace common;



class payUCreditCard extends payUBase{
    
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
                        
                        'ACCOUNT_ID' => "512324",
                        'REFERENCE_CODE' => $reference,
                        'DESCRIPTION' => "payment test",
                
                        'VALUE' => $value,
                        'CURRENCY' => "MXN",
                
                        'BUYER_NAME' => "APPROVED",
                        'BUYER_EMAIL' => "buyer_test@test.com",
                        'BUYER_CONTACT_PHONE' => "7563126",
                        'BUYER_DNI' => "5415668464654",
                        'BUYER_STREET' => "Calle Salvador Alvarado",
                        'BUYER_STREET_2' => "8 int 103",
                        'BUYER_CITY' => "Guadalajara",
                        'BUYER_STATE' => "Jalisco",
                        'BUYER_COUNTRY' => "MX",
                        'BUYER_POSTAL_CODE' => "000000",
                        'BUYER_PHONE' => "7563126",
                
                        'PAYER_NAME' => "APPROVED",
                        'PAYER_EMAIL' => "payer_test@test.com",
                        'PAYER_CONTACT_PHONE' => "7563126",
                        'PAYER_DNI' => "5415668464654",
                        'PAYER_BIRTHDATE' => '1980-06-22',
                
                        'PAYER_STREET' => "Calle Zaragoza esquina",
                        'PAYER_STREET_2' => "calle 5 de Mayo",
                        'PAYER_CITY' => "calle 5 de Mayo",
                        'PAYER_STATE' => "Nuevo Leon",
                        'PAYER_COUNTRY' => "MX",
                        'PAYER_POSTAL_CODE' => "64000",
                        'PAYER_PHONE' => "7563126",
                
                        'CREDIT_CARD_NUMBER' => "5522763376358850",
                        'CREDIT_CARD_EXPIRATION_DATE' => "2020/11",
                        'CREDIT_CARD_SECURITY_CODE' => "923",
                        'PAYMENT_METHOD' => "MASTERCARD",
                
                        'INSTALLMENTS_NUMBER' => "1",
                        'COUNTRY' => PayUCountries::MX,
                
                        'DEVICE_SESSION_ID' => "vghs6tvkcle931686k1900o6e1",
                        'IP_ADDRESS' => "127.0.0.1",
                        'PAYER_COOKIE' =>"pt1t38347bs6jc9ruv2ecpv7o2",
                        'USER_AGENT' =>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
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
        
                \PayUParameters::BUYER_NAME => $this->cfg['BUYER_NAME'],
                \PayUParameters::BUYER_EMAIL => $this->cfg['BUYER_EMAIL'],
                \PayUParameters::BUYER_CONTACT_PHONE => $this->cfg['BUYER_CONTACT_PHONE'],
                \PayUParameters::BUYER_DNI => $this->cfg['BUYER_DNI'],
                \PayUParameters::BUYER_STREET => $this->cfg['BUYER_STREET'],
                \PayUParameters::BUYER_STREET_2 => $this->cfg['BUYER_STREET_2'],
                \PayUParameters::BUYER_CITY => $this->cfg['BUYER_CITY'],
                \PayUParameters::BUYER_STATE => $this->cfg['BUYER_STATE'],
                \PayUParameters::BUYER_COUNTRY => $this->cfg['BUYER_COUNTRY'],
                \PayUParameters::BUYER_POSTAL_CODE => $this->cfg['BUYER_POSTAL_CODE'],
                \PayUParameters::BUYER_PHONE => $this->cfg['BUYER_PHONE'],
        
                \PayUParameters::PAYER_NAME => $this->cfg['PAYER_NAME'],
                \PayUParameters::PAYER_EMAIL => $this->cfg['PAYER_EMAIL'],
                \PayUParameters::PAYER_CONTACT_PHONE => $this->cfg['PAYER_CONTACT_PHONE'],
                \PayUParameters::PAYER_DNI => $this->cfg['PAYER_DNI'],
                \PayUParameters::PAYER_BIRTHDATE => $this->cfg['PAYER_BIRTHDATE'],
        
                \PayUParameters::PAYER_STREET => $this->cfg['PAYER_STREET'],
                \PayUParameters::PAYER_STREET_2 => $this->cfg['PAYER_STREET_2'],
                \PayUParameters::PAYER_CITY => $this->cfg['PAYER_CITY'],
                \PayUParameters::PAYER_STATE => $this->cfg['PAYER_STATE'],
                \PayUParameters::PAYER_COUNTRY => $this->cfg['PAYER_COUNTRY'],
                \PayUParameters::PAYER_POSTAL_CODE => $this->cfg['PAYER_POSTAL_CODE'],
                \PayUParameters::PAYER_PHONE => $this->cfg['PAYER_PHONE'],
        
                \PayUParameters::CREDIT_CARD_NUMBER => $this->cfg['CREDIT_CARD_NUMBER'],
                \PayUParameters::CREDIT_CARD_EXPIRATION_DATE => $this->cfg['CREDIT_CARD_EXPIRATION_DATE'],
                \PayUParameters::CREDIT_CARD_SECURITY_CODE=> $this->cfg['CREDIT_CARD_SECURITY_CODE'],
                \PayUParameters::PAYMENT_METHOD => $this->cfg['PAYMENT_METHOD'],
        
                \PayUParameters::INSTALLMENTS_NUMBER => $this->cfg['INSTALLMENTS_NUMBER'],
                \PayUParameters::COUNTRY => $this->cfg['COUNTRY'],
        
                \PayUParameters::DEVICE_SESSION_ID => $this->cfg['DEVICE_SESSION_ID'],
                \PayUParameters::IP_ADDRESS => $this->cfg['IP_ADDRESS'],
                \PayUParameters::PAYER_COOKIE=> $this->cfg['PAYER_COOKIE'],
                \PayUParameters::USER_AGENT=> $this->cfg['USER_AGENT'],
        );
    }

}