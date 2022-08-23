<?php

namespace Iceqi\AvataPhp\Apis\Tx;

use Iceqi\AvataPhp\Apis\BaseApis;

class Tx extends BaseApis
{

    public function query($operation_id)
    {
        $this->_uri = sprintf("/v1beta1/tx/%s", $operation_id);
        $this->_method = "get";
    }
}