<?php

namespace Iceqi\AvataPhp;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use Iceqi\AvataPhp\Apis\BaseApis;

class Client
{

    private $_apiKey;
    private $_secret;
    private $endpoint;
    private $_devUri = "https://stage.apis.avata.bianjie.ai";
    private $_proUri = "https://apis.avata.bianjie.ai";
    private $timestamp;
    private $_Signature;
    private $params;
    private $method;
    private $uri;
    private $_result = [];
    private $_debug;

    public function __construct($apiKey, $secret, $isDev = true,$debug = false)
    {
        $this->_debug = $debug;
        $this->_apiKey = $apiKey;
        $this->_secret = $secret;
        if ($isDev) {
            $this->endpoint = $this->_devUri;
        } else {
            $this->endpoint = $this->_proUri;
        }

        $this->_isDev = $isDev;
        list($t1, $t2) = explode(' ', microtime());
        $this->timestamp = (float)sprintf('%.0f', (floatval($t1) + floatval($t2)));;
    }


    private function sortParams(&$params)
    {
        if (is_array($params)) {
            ksort($params);
        }
        foreach ($params as &$v) {
            if (is_array($v)) {
                $this->sortParams($v);
            }
        }
    }


    public function buildSign()
    {


        $params = ['path_url' => $this->uri];

        if ($this->method == "get") {
            if(isset($this->params) && $this->params){

                foreach ($this->params as $key => $value) {
                    $params["query_{$key}"] = strval($value);
                }
            }
        } else {

            if(isset($this->params) && $this->params) {
                foreach ($this->params as $key => $value) {
                    $params["body_{$key}"] = $value;
                }
            }
        }

        if (!empty($params))
            $this->sortParams($params);

        $hexhash = hash("sha256", "{$this->timestamp}" . $this->_secret);
        if (count($params) > 0) {
            // 序列化且不编码
            $s = json_encode($params, JSON_UNESCAPED_UNICODE);
            $hexhash = hash("sha256", stripcslashes($s . "{$this->timestamp}" . $this->_secret));
        }

        $this->_Signature = $hexhash;
    }


    public function request(BaseApis $baseApis)
    {
        $query = $baseApis->getQuery();
        $this->params = isset($query["params"]) && $query["params"] ? $query["params"] :"";
        $this->method = $query["method"];
        $this->uri = $query["uri"];
        $this->buildSign();
        $headers = [
            "Content-Type" => "application/json",
            "X-Signature" => "{$this->_Signature}",
            "X-Timestamp" => "{$this->timestamp}",
            "X-Api-Key" => "{$this->_apiKey}",
        ];
        try {
            $client = new GuzzleHttpClient(["base_uri" => $this->endpoint, "headers" => $headers, "debug" => false]);
            $data = [];

            if ($query["method"] == "get") {
                if(isset($query["params"]) && $query["params"]){
                    $data = [
                        "query" => $query["params"]
                    ];
                }
            }
            if(isset( $query["params"]) &&  $query["params"]){
                $data = [
                    "json" => $query["params"]
                ];
            }
            $response = $client->request($query["method"], $query["uri"], $data);
            if ($response->getStatusCode() == 200) {
                $this->_result["code"] = 200;
                $this->_result["status"] ="success";
                $this->_result["data"] = $response->getBody()->getContents();
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $this->_result["code"] = $e->getResponse()->getStatusCode();
                $this->_result["status"] ="error";
                $this->_result["data"] = $e->getResponse()->getBody()->getContents();
            }
        }
        return $this;
    }

    public function result(){
        return $this->_result;
    }

}