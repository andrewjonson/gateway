<?php

namespace App\Http\Controllers\ApiService\v1\OrderPubService\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ConsumeExternalService;
use App\Services\ApiService\v1\OrderPubService\Transactions\Order;

class OrderController extends Controller
{
    use ConsumeExternalService;

    public function __construct(Order $apiService)
    {
        $this->middleware('permission:order-read|admin', [
            'only' => [
                'getOrders',
                'viewPublishOrder'
            ]
        ]);
        $this->middleware('permission:order-create|admin', [
            'only' => [
                'createGeneralOrder',
                'publishOrder'
            ]
        ]);
        $this->apiService = $apiService;
    }

    public function getOrders(Request $request)
    {
        return $this->apiService->getOrders($request->all());
    }

    public function createGeneralOrder(Request $request, $id)
    {
        return $this->apiService->createGeneralOrder($request->all(), $id);
    }

    public function publishOrder($id)
    {
        return $this->apiService->publishOrder($id);
    }

    public function viewPublishOrder($id)
    {
        return $this->apiService->viewPublishOrder($id);
    }
}