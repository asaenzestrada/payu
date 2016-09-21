<?php
    namespace payUWrapper;
    
    require_once(dirname(dirname(__FILE__)).'/lib/'.'PayU.php');
    require_once(dirname(dirname(__FILE__)).'\lib'.'\PayU'.'\api'.'\SupportedLanguages.php');
    
    use PayU;
    use SupportedLanguages;
    use Environment;
    use PayUPayments;

    class payUBase{
        public static $cfg;
        
        public function __construct($config=[]){
            $config = self::getDefaults();
            self::checkParams($config, self::getDefaults());
            self::$cfg = array_merge(self::getDefaults(), $config);
        }
        
        public static function setEnvironment(){
            if (self::$cfg['isTest'] == true) {
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

            \PayU::$apiKey = self::$cfg['apiKey'];
            \PayU::$apiLogin = self::$cfg['apiLogin'];
            \PayU::$merchantId = self::$cfg['merchantId'];
            \PayU::$language = self::$cfg['language'];
            \PayU::$isTest = self::$cfg['isTest'];
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
            foreach (array_keys($reqParams) as $param){
                if (!key_exists($param, $array))
                    throw new \Exception("Key <<<$param>>> is required.");
            }
            return true;
        }
        
        public static function response(){
        $response = PayUPayments::doAuthorizationAndCapture(self::$cfg);
        if($response){
            echo $response->transactionResponse->orderId;
            echo $response->transactionResponse->transactionId;
            echo $response->transactionResponse->state;
            if($response->transactionResponse->state=="PENDING"){
                $response->transactionResponse->pendingReason;
            }
            $response->transactionResponse->trazabilityCode;
            echo $response->transactionResponse->responseCode;

        }
        }

    }