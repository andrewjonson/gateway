<?php

namespace App\Services\ApiService\v1\MpisService\Transactions;

use App\Traits\ConsumeExternalService;

class GovernmentId
{
    use ConsumeExternalService;

    public $baseUrl;
    public $secret;

    public function __construct()
    {
        $this->baseUrl = config('services.mpis.base_url');
        $this->secret = config('services.mpis.secret');
    }

    public function getGovernmentId($id)
    {
        return $this->performRequest('GET', '/mpis/show-government/'.$id);
    }

    public function createGovernmentId($data)
    {
        return $this->performRequest('POST', '/mpis/store-government', $data);
    }
}