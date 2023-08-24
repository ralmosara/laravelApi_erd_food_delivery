<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order_status\CreateOrder_statusRequest;
use App\Http\Requests\Order_status\UpdateOrder_statusRequest;
use App\Http\Resources\Order_status\Order_statusResource;
use App\Models\Order_status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Order_statusController extends Controller
{
    public function index(): AnonymousResourceCollection 
    {
        $order_statuses = Order_status::useFilters()->dynamicPaginate();

        return Order_statusResource::collection($order_statuses);
    }

    public function store(CreateOrder_statusRequest $request): JsonResponse
    {
        $order_status = Order_status::create($request->all());

        return $this->responseCreated('Order_status created successfully', new Order_statusResource($order_status));
    }

    public function show(Order_status $order_status): JsonResponse
    {
        return $this->responseSuccess(null, new Order_statusResource($order_status));
    }

    public function update(UpdateOrder_statusRequest $request, Order_status $order_status): JsonResponse
    {
        $order_status->update($request->all());

        return $this->responseSuccess('Order_status updated Successfully', new Order_statusResource($order_status));
    }

    public function destroy(Order_status $order_status): JsonResponse
    {
        $order_status->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $order_status = Order_status::onlyTrashed()->findOrFail($id);

        $order_status->restore();

        return $this->responseSuccess('Order_status restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $order_status = Order_status::withTrashed()->findOrFail($id);

        $order_status->forceDelete();

        return $this->responseDeleted();
    }

}
