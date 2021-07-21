<?php

namespace App\Http\Controllers\ApiService\v1\MpfService\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ConsumeExternalService;
use App\Services\ApiService\v1\MpfService\Transactions\Sub;

class SubController extends Controller
{
    use ConsumeExternalService;

    public function __construct(Sub $apiService)
    {
        $this->middleware('permission:sub-read|admin', [
            'only' => [
                'index',
                'onlyTrashed'
            ]
        ]);
        $this->middleware('permission:sub-create|admin', [
            'only' => [
                'store'
            ]
        ]);
        $this->middleware('permission:sub-update|admin', [
            'only' => [
                'update',
                'restore'
            ]
        ]);
        $this->middleware('permission:sub-delete|admin', [
            'only' => [
                'delete',
                'forceDelete'
            ]
        ]);
        $this->apiService = $apiService;
    }

    public function getSub($id)
    {
        return $this->apiService->getSub($id);
    }

    public function createSub(Request $request)
    {
        return $this->apiService->createSub($request->all());
    }
}