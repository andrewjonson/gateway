<?php

namespace App\Services\ApiService\v1\CmisService\References;

use App\Traits\ConsumeExternalService;

class Formula
{
    use ConsumeExternalService;

    public $baseUrl;
    public $secret;

    public function __construct()
    {
        $this->baseUrl = config('services.cmis.base_url');
        $this->secret = config('services.cmis.secret');
    }

    public function index($data)
    {
        return $this->performRequest('GET', '/cmis/formula', $data);
    }

    public function store($data)
    {
        return $this->performRequest('POST', '/cmis/formula', $data);
    }

    public function update($data, $id)
    {
        return $this->performRequest('PUT', '/cmis/formula/'.$id, $data);
    }

    public function delete($id)
    {
        return $this->performRequest('DELETE', '/cmis/formula/'.$id);
    }

    public function onlyTrashed($data)
    {
        return $this->performRequest('GET', '/cmis/formula/only-trashed', $data);
    }

    public function restore($id)
    {
        return $this->performRequest('PUT', '/cmis/formula/restore/'.$id);
    }

    public function forceDelete($id)
    {
        return $this->performRequest('DELETE', '/cmis/formula/force-delete/'.$id);
    }

    public function searchFormulaByCriteria($data)
    {
        return $this->performRequest('GET', '/cmis/search/formula', $data);
    }
}