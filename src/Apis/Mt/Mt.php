<?php

namespace Iceqi\AvataPhp\Apis\Mt;

use Iceqi\AvataPhp\Apis\BaseApis;

class Mt extends BaseApis
{

    public function create($class_id)
    {
        $this->_uri = sprintf("/v1beta1/mt/mt-issues/%s" . $class_id);
        return $this;
    }

    public function transfer($class_id, $owner, $mt_id)
    {
        $this->_uri = sprintf("/v1beta1/mt/mt-transfers/%s/%s/%s", $class_id, $owner, $mt_id);
        return $this;
    }


    public function patch($class_id, $owner, $mt_id)
    {
        $this->_uri = sprintf("/v1beta1/mt/mts/%s/%s/%s", $class_id, $owner, $mt_id);
        $this->_method = "patch";
        return $this;
    }

    public function delete($class_id, $owner, $mt_id)
    {
        $this->_uri = sprintf("/v1beta1/mt/mts/%s/%s/%s", $class_id, $owner, $mt_id);
        $this->_method = "delete";
        return $this;
    }


    public function batchCreate($class_id)
    {
        $this->_uri = "/v1beta1/mt/batch/mts/" . $class_id;
        return $this;
    }


    public function batchTransfer($class_id, $owner)
    {
        $this->_uri = sprintf("/v1beta1/mt/batch/mts-transfers/%s", $owner);
        return $this;
    }

    public function batchPatch($class_id, $owner)
    {
        $this->_uri = sprintf("/v1beta1/mt/batch/mts/%s", $owner);
        $this->_method = "patch";
        return $this;
    }


    public function batchDelete($owner)
    {
        $this->_uri = sprintff("/v1beta1/mt/batch/mts/%s", $owner);
        $this->_method = "delete";
        return $this;
    }


    public function info($class_id, $mt_id)
    {

        $this->_uri = sprintf("/v1beta1/mt/mts/%s/%s" . $class_id, $mt_id);
        $this->_method = "get";
        return $this;
    }


    public function queryLists()
    {
        $this->_uri = sprintf("/v1beta1/mt/mts");
        $this->_method = "get";
        return $this;
    }


    public function history($class_id, $mt_id)
    {
        $this->_uri = sprintf("/v1beta1/mt/mts/%s/%s/history" . $class_id, $mt_id);
        $this->_method = "get";
        return $this;
    }

    public function balances($class_id, $account)
    {
        $this->_uri = sprintf("/v1beta1/mt/mts/%s/%s/balances" . $class_id, $account);
        $this->_method = "get";
        return $this;
    }


}