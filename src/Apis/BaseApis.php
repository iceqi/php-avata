<?php

namespace Iceqi\AvataPhp\Apis;

class BaseApis
{

    protected $_params;
    protected $_uri;
    private $_requestInfo;
    protected $_method = "post";


    public function __set($name, $value)
    {

        $this->_params[$name] = $value;
        $this->_requestInfo["params"][$name] = $value;
        return $this;
    }

    public function getQuery()
    {
        $this->_requestInfo ["uri"] = $this->_uri;
        $this->_requestInfo["method"] = $this->_method;
        return $this->_requestInfo;
    }
}