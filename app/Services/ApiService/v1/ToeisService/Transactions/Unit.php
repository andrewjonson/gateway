<?php

namespace App\Services\ApiService\v1\ToeisService\Transactions;

use App\Traits\ConsumeExternalService;

class Unit
{
    use ConsumeExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.toeis_base_uri');
    }

    public function index($data)
    {
        return $this->performRequest('GET', '/toeis/unit-all-active', $data);
    }

    public function getUnitById($id)
    {
        return $this->performRequest('GET', '/toeis/unit-per-id/'.$id);
    }

    public function getUnitConcatById($id)
    {
        return $this->performRequest('GET', '/toeis/unit-concat/'.$id);
    }

    public function getUnit($data)
    {
        return $this->performRequest('GET', '/toeis/unit', $data);
    }

    public function createUnit($data)
    {
        return $this->performRequest('POST', '/toeis/unit', $data);
    }

    public function getToggleUnit($id)
    {
        return $this->performRequest('GET', '/toeis/toggle-unit-per-id/'.$id);
    }

}