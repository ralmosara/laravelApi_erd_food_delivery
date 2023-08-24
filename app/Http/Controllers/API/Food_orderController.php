<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food_order\CreateFood_orderRequest;
use App\Http\Requests\Food_order\UpdateFood_orderRequest;
use App\Http\Resources\Food_order\Food_orderResource;
use App\Models\Food_order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Food_orderController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $food_orders = Food_order::useFilters()->dynamicPaginate();

        return Food_orderResource::collection($food_orders);
    }

    public function store(CreateFood_orderRequest $request): JsonResponse
    {
        $food_order = Food_order::create($request->all());

        return $this->responseCreated('Food_order created successfully', new Food_orderResource($food_order));
    }

    public function show(Food_order $food_order): JsonResponse
    {
        return $this->responseSuccess(null, new Food_orderResource($food_order));
    }

    public function update(UpdateFood_orderRequest $request, Food_order $food_order): JsonResponse
    {
        $food_order->update($request->all());

        return $this->responseSuccess('Food_order updated Successfully', new Food_orderResource($food_order));
    }

    public function destroy(Food_order $food_order): JsonResponse
    {
        $food_order->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $food_order = Food_order::onlyTrashed()->findOrFail($id);

        $food_order->restore();

        return $this->responseSuccess('Food_order restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $food_order = Food_order::withTrashed()->findOrFail($id);

        $food_order->forceDelete();

        return $this->responseDeleted();
    }

}
