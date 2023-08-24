<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Resources\Country\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $countries = Country::useFilters()->dynamicPaginate();

        return CountryResource::collection($countries);
    }

    public function store(CreateCountryRequest $request): JsonResponse
    {
        $country = Country::create($request->all());

        return $this->responseCreated('Country created successfully', new CountryResource($country));
    }

    public function show(Country $country): JsonResponse
    {
        return $this->responseSuccess(null, new CountryResource($country));
    }

    public function update(UpdateCountryRequest $request, Country $country): JsonResponse
    {
        $country->update($request->all());

        return $this->responseSuccess('Country updated Successfully', new CountryResource($country));
    }

    public function destroy(Country $country): JsonResponse
    {
        $country->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $country = Country::onlyTrashed()->findOrFail($id);

        $country->restore();

        return $this->responseSuccess('Country restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $country = Country::withTrashed()->findOrFail($id);

        $country->forceDelete();

        return $this->responseDeleted();
    }

}
