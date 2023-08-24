<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer_address\CreateCustomer_addressRequest;
use App\Http\Requests\Customer_address\UpdateCustomer_addressRequest;
use App\Http\Resources\Customer_address\Customer_addressResource;
use App\Models\Customer_address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Customer_addressController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $customer_addresses = Customer_address::useFilters()->dynamicPaginate();

        return Customer_addressResource::collection($customer_addresses);
    }

    public function store(CreateCustomer_addressRequest $request): JsonResponse
    {
        $customer_address = Customer_address::create($request->all());

        return $this->responseCreated('Customer_address created successfully', new Customer_addressResource($customer_address));
    }

    public function show(Customer_address $customer_address): JsonResponse
    {
        return $this->responseSuccess(null, new Customer_addressResource($customer_address));
    }

    public function update(UpdateCustomer_addressRequest $request, Customer_address $customer_address): JsonResponse
    {
        $customer_address->update($request->all());

        return $this->responseSuccess('Customer_address updated Successfully', new Customer_addressResource($customer_address));
    }

    public function destroy(Customer_address $customer_address): JsonResponse
    {
        $customer_address->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $customer_address = Customer_address::onlyTrashed()->findOrFail($id);

        $customer_address->restore();

        return $this->responseSuccess('Customer_address restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $customer_address = Customer_address::withTrashed()->findOrFail($id);

        $customer_address->forceDelete();

        return $this->responseDeleted();
    }

}
