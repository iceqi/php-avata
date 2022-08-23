<?php

namespace Iceqi\AvataPhp\Apis\Nft;

use Iceqi\AvataPhp\Apis\BaseApis;

class Nfts extends BaseApis
{

    public function create($class_id)
    {
        $this->_uri = sprintf("/v1beta1/ntf/nfts/%s" . $class_id);
        return $this;
    }

    public function info($class_id, $nft_id)
    {

        $this->_uri = sprintf("/v1beta1/ntf/nfts/%s/%s" . $class_id, $nft_id);
        $this->_method = "get";
        return $this;
    }


    public function transfer($class_id, $owner, $nft_id)
    {
        $this->_uri = sprintf("/v1beta1/nft/nfts-transfers/%s/%s/%s", $class_id, $owner, $nft_id);
        return $this;
    }


    public function patch($class_id, $owner, $nft_id)
    {
        $this->_uri = sprintf("/v1beta1/nft/nfts/%s/%s/%s", $class_id, $owner, $nft_id);
        $this->_method = "patch";
        return $this;
    }

    public function delete($class_id, $owner, $nft_id)
    {
        $this->_uri = sprintf("/v1beta1/nft/nfts/%s/%s/%s", $class_id, $owner, $nft_id);
        $this->_method = "delete";
        return $this;
    }


    public function batchCreate($class_id)
    {
        $this->_uri = "/v1beta1/ntf/batch/nfts/" . $class_id;
        return $this;
    }


    public function batchTransfer($class_id, $owner)
    {
        $this->_uri = sprintf("/v1beta1/nft/batch/nfts-transfers/%s", $owner);
        return $this;
    }

    public function batchPatch($class_id, $owner)
    {
        $this->_uri = sprintf("/v1beta1/nft/batch/nfts/%s", $owner);
        $this->_method = "patch";
        return $this;
    }


    public function batchDelete($owner)
    {
        $this->_uri = sprintf("/v1beta1/nft/batch/nfts/%s", $owner);
        $this->_method = "delete";
        return $this;
    }



    public function queryLists()
    {
        $this->_uri = sprintf("/v1beta1/ntf/nfts");
        $this->_method = "get";
        return $this;
    }


    public function history($class_id, $nft_id)
    {
        $this->_uri = sprintf("/v1beta1/ntf/nfts/%s/%s/history" . $class_id, $nft_id);
        $this->_method = "get";
        return $this;
    }






}