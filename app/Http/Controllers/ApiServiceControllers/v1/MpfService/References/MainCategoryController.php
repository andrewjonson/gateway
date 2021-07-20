<?php

namespace App\Http\Controllers\ApiServiceControllers\v1\MpfService\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ConsumeExternalService;
use App\Services\ApiServices\v1\MpfService\References\MainCategory;

class MainCategoryController extends Controller
{
    use ConsumeExternalService;

    public function __construct(MainCategory $apiService)
    {
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
}