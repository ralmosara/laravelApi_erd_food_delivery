<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order_menu_item\CreateOrder_menu_itemRequest;
use App\Http\Requests\Order_menu_item\UpdateOrder_menu_itemRequest;
use App\Http\Resources\Order_menu_item\Order_menu_itemResource;
use App\Models\Order_menu_item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Order_menu_itemController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $order_menu_items = Order_menu_item::useFilters()->dynamicPaginate();

        return Order_menu_itemResource::collection($order_menu_items);
    }

    public function store(CreateOrder_menu_itemRequest $request): JsonResponse
    {
        $order_menu_item = Order_menu_item::create($request->all());

        return $this->responseCreated('Order_menu_item created successfully', new Order_menu_itemResource($order_menu_item));
    }

    public function show(Order_menu_item $order_menu_item): JsonResponse
    {
        return $this->responseSuccess(null, new Order_menu_itemResource($order_menu_item));
    }

    public function update(UpdateOrder_menu_itemRequest $request, Order_menu_item $order_menu_item): JsonResponse
    {
        $order_menu_item->update($request->all());

        return $this->responseSuccess('Order_menu_item updated Successfully', new Order_menu_itemResource($order_menu_item));
    }

    public function destroy(Order_menu_item $order_menu_item): JsonResponse
    {
        $order_menu_item->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $order_menu_item = Order_menu_item::onlyTrashed()->findOrFail($id);

        $order_menu_item->restore();

        return $this->responseSuccess('Order_menu_item restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $order_menu_item = Order_menu_item::withTrashed()->findOrFail($id);

        $order_menu_item->forceDelete();

        return $this->responseDeleted();
    }

}
