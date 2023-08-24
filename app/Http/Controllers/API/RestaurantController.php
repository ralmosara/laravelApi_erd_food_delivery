<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CreateRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $restaurants = Restaurant::useFilters()->dynamicPaginate();

        return RestaurantResource::collection($restaurants);
    }

    public function store(CreateRestaurantRequest $request): JsonResponse
    {
        $restaurant = Restaurant::create($request->all());

        return $this->responseCreated('Restaurant created successfully', new RestaurantResource($restaurant));
    }

    public function show(Restaurant $restaurant): JsonResponse
    {
        return $this->responseSuccess(null, new RestaurantResource($restaurant));
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant): JsonResponse
    {
        $restaurant->update($request->all());

        return $this->responseSuccess('Restaurant updated Successfully', new RestaurantResource($restaurant));
    }

    public function destroy(Restaurant $restaurant): JsonResponse
    {
        $restaurant->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $restaurant = Restaurant::onlyTrashed()->findOrFail($id);

        $restaurant->restore();

        return $this->responseSuccess('Restaurant restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $restaurant = Restaurant::withTrashed()->findOrFail($id);

        $restaurant->forceDelete();

        return $this->responseDeleted();
    }

}
