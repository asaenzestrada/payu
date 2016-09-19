<?php
    namespace common;
    
    use PayU; 
    

    
    class payUBase{
        public $cfg;
        
        public function __construct($config=[]){
            self::checkParams($config, self::getDefaults());
            $this->cfg = array_merge(self::getDefaults(), $config);
        }
        
        public static function setEnvironment(){
            if ($this->$cfg['isTest'] == true) {
                Environment::setPaymentsCustomUrl ( "https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi" );
                Environment::setReportsCustomUrl ( "https://sandbox.api.payulatam.com/reports-api/4.0/service.cgi" );
                Environment::setSubscriptionsCustomUrl("https://sandbox.api.payulatam.com/payments-api/rest/v4.3/");
            }
            else{
                Environment::setPaymentsCustomUrl ( "https://api.payulatam.com/payments-api/4.0/service.cgi" );
                Environment::setReportsCustomUrl ( "https://api.payulatam.com/reports-api/4.0/service.cgi" );
                Environment::setSubscriptionsCustomUrl("https://api.payulatam.com/payments-api/rest/v4.3/");
            }
        }
        
        public static function run(){
            self::setEnvironment();
            \PayU::$apiKey = $this->$cfg['apiKey'];
            \PayU::$apiLogin = $this->$cfg['apiLogin'];
            \PayU::$merchantId = $this->$cfg['merchantId'];
            \PayU::$language = $this->$cfg['language'];
            \PayU::$isTest = $this->$cfg['isTest'];
        }
        
        public static function getDefaults(){
            return [
                    'apiKey' => '4Vj8eK4rloUd272L48hsrarnUA',
                    'apiLogin' => 'pRRXKOl8ikMmt9u',
                    'merchantId' => '508029',
                    'language' => SupportedLanguages::ES,
                    'isTest' => True,
            ];
        }

        public static function checkParams(array $array, array $reqParams){
            foreach ($reqParams as $param){
                if (!key_exists($param, $array))
                    throw new \Exception("Key <<<$param>>> is required.");
            }
            return true;
        }

    }