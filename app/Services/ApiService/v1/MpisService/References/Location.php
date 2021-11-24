<?php

namespace App\Services\ApiService\v1\MpisService\References;

use App\Traits\ConsumeExternalService;

class Location
{
    use ConsumeExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.mpis_base_uri');
    }

    public function index($data)
    {
        return $this->performRequest('GET', '/mpis/locations', $data);
    }

    public function store($data)
    {
        return $this->performRequest('POST', '/mpis/locations', $data);
    }

    public function update($data, $id)
    {
        return $this->performRequest('PUT', '/mpis/locations/'.$id, $data);
    }

    public function delete($id)
    {
        return $this->performRequest('DELETE', '/mpis/locations/'.$id);
    }

    public function onlyTrashed($data)
    {
        return $this->performRequest('GET', '/mpis/locations/only-trashed', $data);
    }

    public function restore($id)
    {
        return $this->performRequest('PUT', '/mpis/locations/restore/'.$id);
    }

    public function forceDelete($id)
    {
        return $this->performRequest('DELETE', '/mpis/locations/force-delete/'.$id);
    }
}