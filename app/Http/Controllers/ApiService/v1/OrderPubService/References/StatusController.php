<?php

namespace App\Http\Controllers\ApiService\v1\OrderPubService\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ConsumeExternalService;
use App\Services\ApiService\v1\OrderPubService\References\Status;

class StatusController extends Controller
{
    use ConsumeExternalService;

    public function __construct(Status $apiService)
    {
        $this->middleware('permission:status-read|admin', [
            'only' => [
                'index',
                'onlyTrashed',
                'getStatusById'
            ]
        ]);
        $this->middleware('permission:status-create|admin', [
            'only' => [
                'store'
            ]
        ]);
        $this->middleware('permission:status-update|admin', [
            'only' => [
                'update',
                'restore'
            ]
        ]);
        $this->middleware('permission:status-delete|admin', [
            'only' => [
                'delete',
                'forceDelete'
            ]
        ]);
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        return $this->apiService->index($request->all());
    }

    public function store(Request $request)
    {
        return $this->apiService->store($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->apiService->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->apiService->delete($id);
    }

    public function onlyTrashed(Request $request)
    {
        return $this->apiService->onlyTrashed($request->all());
    }

    public function restore($id)
    {
        return $this->apiService->restore($id);
    }

    public function forceDelete($id)
    {
        return $this->apiService->forceDelete($id);
    }

    public function getStatusById($id)
    {
        return $this->apiService->getStatusById($id);
    }
}