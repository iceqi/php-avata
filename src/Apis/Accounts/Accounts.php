<?php

namespace Iceqi\AvataPhp\Apis\Accounts;

use Iceqi\AvataPhp\Apis\BaseApis;

class Accounts extends BaseApis
{

    public function batchCreate()
    {
        $this->_uri = "/v1beta1/accounts";
        return $this;
    }

    public function create()
    {
        $this->_uri = "/v1beta1/account";
        return $this;
    }

    /**
     * @return $this
     */
    public function info()
    {
        $this->_uri = "/v1beta1/accounts";
        $this->_method = "get";
        return $this;
    }

    public function history()
    {
        $this->_uri = "/v1beta1/accounts";
        $this->_method = "get";
        return $this;
    }

}