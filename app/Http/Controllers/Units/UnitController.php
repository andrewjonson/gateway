<?php

namespace App\Http\Controllers\Units;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Repositories\Eloquent\UnitRepository;

class UnitController extends Controller
{
    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function getUnitByUnitCode($code)
    {
        try {
            $unit = $this->unitRepository->getUnitByUnitCode($code);
            return new UnitResource($unit);
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage(), SERVER_ERROR);
        }
    }

    public function searchUnit(Request $request)
    {
        $keyword = $request->keyword;
        $rowsPerPage = $request->rowsPerPage;
        try {
            $units = $this->unitRepository->searchUnit($keyword, $rowsPerPage);
            return UnitResource::collection($units);
        } catch(\Exception $e) {
            return $this->failedResponse($e->getMessage(), SERVER_ERROR);
        }
    }
}
