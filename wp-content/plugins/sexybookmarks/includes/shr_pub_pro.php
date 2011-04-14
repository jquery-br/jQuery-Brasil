<?php

class SHR_PUB_PRO {
    protected $authenicate_url = "http://www.shareaholic.com/api/auth/apikey/";
    protected $install_url;
    protected $apikey;
    protected $default_apikey = '8afa39428933be41f8afdb8ea21a495c';
    protected static $_instance = null;
    
    public static function getInstance() {
        if(!self::$_instance instanceof  self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    protected function __construct() {
        $this->apikey = get_option('SHRSB_apikey');
        $this->install_url = get_option('siteurl');
    }

    public function set_api_key($apikey) {
        $bRet = false;
        if($apikey) {
           $auth = $this->authenticate($apikey);
           if($auth->plan_id > -2)  {
                update_option('SHRSB_apikey', $apikey);
                $bRet = true;
           }
        }
        return $bRet;
    }

    public function delete_api_key() {
        update_option('SHRSB_apikey',$this->default_apikey);
        $this->apikey = get_option('apikey');
    }

    public function authenticate($apikey = null) {
        $response_obj = null;
        $args = array('body' => array(
                       "install_url" => $this->install_url,
                       "api_key" => $apikey ? $apikey : $this->apikey
                       ));
        if(function_exists(wp_remote_post)) {
            $response = wp_remote_post($this->authenicate_url, $args);
            $response_obj = json_decode($response['body']);
        }
        return $response_obj;
    }
}
?>