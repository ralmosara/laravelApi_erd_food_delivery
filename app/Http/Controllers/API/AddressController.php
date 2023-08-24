<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\CreateAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Http\Resources\Address\AddressResource;
use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $addresses = Address::useFilters()->dynamicPaginate();

        return AddressResource::collection($addresses);
    }

    public function store(CreateAddressRequest $request): JsonResponse
    {
        $address = Address::create($request->all());

        return $this->responseCreated('Address created successfully', new AddressResource($address));
    }

    public function show(Address $address): JsonResponse
    {
        return $this->responseSuccess(null, new AddressResource($address));
    }

    public function update(UpdateAddressRequest $request, Address $address): JsonResponse
    {
        $address->update($request->all());

        return $this->responseSuccess('Address updated Successfully', new AddressResource($address));
    }

    public function destroy(Address $address): JsonResponse
    {
        $address->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $address = Address::onlyTrashed()->findOrFail($id);

        $address->restore();

        return $this->responseSuccess('Address restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $address = Address::withTrashed()->findOrFail($id);

        $address->forceDelete();

        return $this->responseDeleted();
    }

}
