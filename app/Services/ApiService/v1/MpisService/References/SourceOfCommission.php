<?php

namespace App\Services\ApiService\v1\MpisService\References;

use App\Traits\ConsumeExternalService;

class SourceOfCommission
{
    use ConsumeExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.mpis_base_uri');
    }

    public function index($data)
    {
        return $this->performRequest('GET', '/mpis/source-of-commission', $data);
    }

    public function store($data)
    {
        return $this->performRequest('POST', '/mpis/source-of-commission', $data);
    }

    public function update($data, $id)
    {
        return $this->performRequest('PUT', '/mpis/source-of-commission/'.$id, $data);
    }

    public function delete($id)
    {
        return $this->performRequest('DELETE', '/mpis/source-of-commission/'.$id);
    }

    public function onlyTrashed($data)
    {
        return $this->performRequest('GET', '/mpis/source-of-commission/only-trashed', $data);
    }

    public function restore($id)
    {
        return $this->performRequest('PUT', '/mpis/source-of-commission/restore/'.$id);
    }

    public function forceDelete($id)
    {
        return $this->performRequest('DELETE', '/mpis/source-of-commission/force-delete/'.$id);
    }
}