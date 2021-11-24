<?php

namespace App\Services\ApiService\v1\OrderPubService\References;

use App\Traits\ConsumeExternalService;

class DocumentSettingSignatory
{
    use ConsumeExternalService;

    public $baseUrl;
    public $secret;

    public function __construct()
    {
        $this->baseUrl = config('services.orderpub.base_url');
        $this->secret = config('services.orderpub.secret');
    }

    public function index()
    {
        return $this->performRequest('GET', '/orderpub/signatories');
    }

    public function store($data)
    {
        return $this->performRequest('POST', '/orderpub/signatories', $data);
    }

    public function update($data, $id)
    {
        return $this->performRequest('PUT', '/orderpub/signatories/'.$id, $data);
    }

    public function delete($id)
    {
        return $this->performRequest('DELETE', '/orderpub/signatories/'.$id);
    }

    public function onlyTrashed($data)
    {
        return $this->performRequest('GET', '/orderpub/signatories/only-trashed', $data);
    }

    public function restore($id)
    {
        return $this->performRequest('PUT', '/orderpub/signatories-restore/'.$id);
    }

    public function forceDelete($id)
    {
        return $this->performRequest('DELETE', '/orderpub/signatories/force-delete/'.$id);
    }
}