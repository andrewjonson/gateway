<?php

namespace App\Services\ApiService\v1\ToeisService\Transactions;

use App\Traits\ConsumeExternalService;

class Unit
{
    use ConsumeExternalService;

    public $baseUrl;
    public $secret;

    public function __construct()
    {
        $this->baseUrl = config('services.toeis.base_url');
        $this->secret = config('services.toeis.secret');
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
}