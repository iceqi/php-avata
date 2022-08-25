<?php

namespace Iceqi\AvataPhp\Apis\Nft;

use Iceqi\AvataPhp\Apis\BaseApis;

class Classes extends BaseApis
{
    public function create()
    {
        $this->_uri = "/v1beta1/nft/classes";
        return $this;
    }


    public function info($id)
    {
        $this->_uri = "/v1beta1/nft/classes/" . $id;
        $this->_method = "get";
        return $this;
    }

    public function queryList()
    {
        $this->_uri = "/v1beta1/nft/classes";
        $this->_method = "get";
        return $this;
    }

    public function transfer($class_id, $owner)
    {
        $this->_uri = sprintf("/v1beta1/nft/class-transfers/%s/%s", $class_id, $owner);
        return $this;
    }
}