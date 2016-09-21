<?php
namespace payUWrapper;
require(dirname(__FILE__).'/'.'PayUBase.php');

use PayUParameters;

class payUCreditCard extends payUBase{

    public function __construct($config=[]){
        $config = self::getDefaults();
        self::checkParams($config, self::getDefaults());
        parent::$cfg = array_merge(self::getDefaults(), $config);
    }
    
    public static function getDefaults(){
        $random = rand(0,10000);
        $reference = "payment_test_$random";
        $value = "40";
        
                    return  array_merge(parent::getDefaults(),[
                        
                        PayUParameters::ACCOUNT_ID => "512324",
                        PayUParameters::REFERENCE_CODE => $reference,
                        PayUParameters::DESCRIPTION => "payment test",
                
                        PayUParameters::VALUE => $value,
                        PayUParameters::CURRENCY => "MXN",
                
                        PayUParameters::BUYER_NAME => "APPROVED",
                        PayUParameters::BUYER_EMAIL => "buyer_test@test.com",
                        PayUParameters::BUYER_CONTACT_PHONE => "7563126",
                        PayUParameters::BUYER_DNI => "5415668464654",
                        PayUParameters::BUYER_STREET => "Calle Salvador Alvarado",
                        PayUParameters::BUYER_STREET_2 => "8 int 103",
                        PayUParameters::BUYER_CITY => "Guadalajara",
                        PayUParameters::BUYER_STATE => "Jalisco",
                        PayUParameters::BUYER_COUNTRY => "MX",
                        PayUParameters::BUYER_POSTAL_CODE => "000000",
                        PayUParameters::BUYER_PHONE => "7563126",
                
                        PayUParameters::PAYER_NAME => "APPROVED",
                        PayUParameters::PAYER_EMAIL => "payer_test@test.com",
                        PayUParameters::PAYER_CONTACT_PHONE => "7563126",
                        PayUParameters::PAYER_DNI => "5415668464654",
                        PayUParameters::PAYER_BIRTHDATE => "1980-06-22",
                
                        PayUParameters::PAYER_STREET => "Calle Zaragoza esquina",
                        PayUParameters::PAYER_STREET_2 => "calle 5 de Mayo",
                        PayUParameters::PAYER_CITY => "calle 5 de Mayo",
                        PayUParameters::PAYER_STATE => "Nuevo Leon",
                        PayUParameters::PAYER_COUNTRY => "MX",
                        PayUParameters::PAYER_POSTAL_CODE => "64000",
                        PayUParameters::PAYER_PHONE => "7563126",
                
                        PayUParameters::CREDIT_CARD_NUMBER => "4097440000000004",
                        PayUParameters::CREDIT_CARD_EXPIRATION_DATE => "2024/12",
                        PayUParameters::CREDIT_CARD_SECURITY_CODE => "321",
                        PayUParameters::PAYMENT_METHOD => "VISA",
                
                        PayUParameters::INSTALLMENTS_NUMBER => "1",
                        PayUParameters::COUNTRY => \PayUCountries::MX,
                
                        PayUParameters::DEVICE_SESSION_ID => "vghs6tvkcle931686k1900o6e1",
                        PayUParameters::IP_ADDRESS => "127.0.0.1",
                        PayUParameters::PAYER_COOKIE =>"pt1t38347bs6jc9ruv2ecpv7o2",
                        PayUParameters::USER_AGENT =>"Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0"
        ]);
    }
    
    public static function run(){
        parent::run();
    }

}