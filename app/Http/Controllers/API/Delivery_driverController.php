<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery_driver\CreateDelivery_driverRequest;
use App\Http\Requests\Delivery_driver\UpdateDelivery_driverRequest;
use App\Http\Resources\Delivery_driver\Delivery_driverResource;
use App\Models\Delivery_driver;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Delivery_driverController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $delivery_drivers = Delivery_driver::useFilters()->dynamicPaginate();

        return Delivery_driverResource::collection($delivery_drivers);
    }

    public function store(CreateDelivery_driverRequest $request): JsonResponse
    {
        $delivery_driver = Delivery_driver::create($request->all());

        return $this->responseCreated('Delivery_driver created successfully', new Delivery_driverResource($delivery_driver));
    }

    public function show(Delivery_driver $delivery_driver): JsonResponse
    {
        return $this->responseSuccess(null, new Delivery_driverResource($delivery_driver));
    }

    public function update(UpdateDelivery_driverRequest $request, Delivery_driver $delivery_driver): JsonResponse
    {
        $delivery_driver->update($request->all());

        return $this->responseSuccess('Delivery_driver updated Successfully', new Delivery_driverResource($delivery_driver));
    }

    public function destroy(Delivery_driver $delivery_driver): JsonResponse
    {
        $delivery_driver->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $delivery_driver = Delivery_driver::onlyTrashed()->findOrFail($id);

        $delivery_driver->restore();

        return $this->responseSuccess('Delivery_driver restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $delivery_driver = Delivery_driver::withTrashed()->findOrFail($id);

        $delivery_driver->forceDelete();

        return $this->responseDeleted();
    }

}
