<?php

namespace Iceqi\AvataPhp\Apis\Orders;

use Iceqi\AvataPhp\Apis\BaseApis;

class Orders extends BaseApis
{

    public function create()
    {
        $this->_uri = "/v1beta1/orders";
        return $this;
    }

    private function info($order_id)
    {
        $this->_uri = sprintf("/v1beta1/orders/%s", $order_id);
        $this->_method = "get";
    }

    private function queryList()
    {
        $this->_uri = "/v1beta1/orders";
        $this->_method = "get";
    }
}