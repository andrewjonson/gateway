<?php

namespace App\Http\Controllers\ApiService\v1\MpisService\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ConsumeExternalService;
use App\Traits\RestfulApiServiceControllerTrait;
use App\Services\ApiService\v1\MpisService\Transactions\Personnel;

class PersonnelController extends Controller
{
    use ConsumeExternalService, RestfulApiServiceControllerTrait;

    public function __construct(Personnel $apiService)
    {
        $this->middleware('permission:personnel-read|admin', [
            'only' => [
                'index',
                'onlyTrashed',
                'searchPersonnel',
                'getPersonnelById',
                'advanceSearchPersonnel',
                'getPersonnelByPmcode',
                'uploadPersonnelImage',
                'searchPersonnelBySerialNumberBirthdate',
                'searchPersonnelBySerial'
            ]
        ]);
        $this->middleware('permission:personnel-create|admin', [
            'only' => [
                'store'
            ]
        ]);
        $this->middleware('permission:personnel-update|admin', [
            'only' => [
                'update',
                'restore'
            ]
        ]);
        $this->middleware('permission:personnel-delete|admin', [
            'only' => [
                'delete',
                'forceDelete'
            ]
        ]);
        $this->apiService = $apiService;
    }

    public function searchPersonnel(Request $request)
    {
        return $this->apiService->searchPersonnel($request->all());
    }

    public function getPersonnelById($id)
    {
        return $this->apiService->getPersonnelById($id);
    }

    public function advanceSearchPersonnel(Request $request)
    {
        return $this->apiService->advanceSearchPersonnel($request->all());
    }

    public function getPersonnelByPmcode($id)
    {
        return $this->apiService->getPersonnelByPmcode($id);
    }

    public function uploadPersonnelImage(Request $request)
    {
        return $this->apiService->uploadPersonnelImage($request->all());
    }

    public function searchPersonnelBySerialNumberBirthdate(Request $request)
    {
        return $this->apiService->searchPersonnelBySerialNumberBirthdate($request->all());
    }

    public function searchPersonnelBySerial(Request $request)
    {
        return $this->apiService->searchPersonnelBySerial($request->all());
    }

    public function createPersonnel(Request $request)
    {
        return $this->apiService->createPersonnel($request->all());
    }
}