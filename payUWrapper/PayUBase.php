<?php
    namespace payUWrapper;
    
    require_once(dirname(dirname(__FILE__)).'/lib/'.'PayU.php');
    require_once(dirname(dirname(__FILE__)).'\lib'.'\PayU'.'\api'.'\SupportedLanguages.php');
    

    use PayU;
    use SupportedLanguages;
    use Environment;
    use PayUPayments;

    /**
     * Base class for the PayU Implementation
     *
     * Incorporates the PayU package and makes it easier to use.
     *
     * @param array $cfg configuration array 
     * @package    PayU
     * @subpackage payUWrapper
     * @author     Javier Ruiz <javier.ruiz@gotribit.com>
     */
    class payUBase{
        public static $cfg;
        
        
        public function __construct($config=[]){
            $config = self::getDefaults();
            self::checkParams($config, self::getDefaults());
            self::$cfg = array_merge(self::getDefaults(), $config);
        }
        
        /**
         * Sets the working environment depending on $cfg['istest´]
         *
         * @param array $cfg Configuration 
         */
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
        
        /**
         * Sets the variables in the PayU library, from the configuration array. 
         * And runs the environment function. 
         *
         * @param array $cfg Configuration
         */
        public static function run(){
            self::setEnvironment();

            \PayU::$apiKey = self::$cfg['apiKey'];
            \PayU::$apiLogin = self::$cfg['apiLogin'];
            \PayU::$merchantId = self::$cfg['merchantId'];
            \PayU::$language = self::$cfg['language'];
            \PayU::$isTest = self::$cfg['isTest'];
        }
        
        /**
         * Sets the configuration variables with the default testing values
         *
         * @param array $cfg Configuration
         * @return $cfg default configuration values
         */
        public static function getDefaults(){
            return [
                    'apiKey' => '4Vj8eK4rloUd272L48hsrarnUA',
                    'apiLogin' => 'pRRXKOl8ikMmt9u',
                    'merchantId' => '508029',
                    'language' => SupportedLanguages::ES,
                    'isTest' => True,
            ];
        }

        /**
         * Compares an array with the required array.
         *
         * @param array $array  configuration array 
         * @param array $reqParams Required array keys
         * 
         * @return true if $array has all the required keys and returns what key is missing if necessary
         */
        public static function checkParams(array $array, array $reqParams){
            foreach (array_keys($reqParams) as $param){
                if (!key_exists($param, $array))
                    throw new \Exception("Key <<<$param>>> is required.");
            }
            return true;
        }
        
        /**
         * Utilized the payU library to actually try to complete the payment
         *
         * @param array $cfg Configuration
         */
        public static function response(){
        $response = PayUPayments::doAuthorizationAndCapture(self::$cfg);
        if($response){
            $response->transactionResponse->orderId;
            $response->transactionResponse->transactionId;
            $response->transactionResponse->state;
            if($response->transactionResponse->state=="PENDING"){
                echo $response->transactionResponse->pendingReason;
            }
            $response->transactionResponse->trazabilityCode;
            $response->transactionResponse->responseCode;
        }
        }

    }