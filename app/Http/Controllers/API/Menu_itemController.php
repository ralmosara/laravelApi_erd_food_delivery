<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu_item\CreateMenu_itemRequest;
use App\Http\Requests\Menu_item\UpdateMenu_itemRequest;
use App\Http\Resources\Menu_item\Menu_itemResource;
use App\Models\Menu_item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Request;

class Menu_itemController extends Controller
{

    public function index(): AnonymousResourceCollection 
    {
        $menu_items = Menu_item::useFilters()->dynamicPaginate();

        return Menu_itemResource::collection($menu_items);
    }

    public function store(CreateMenu_itemRequest $request): JsonResponse
    {
        $menu_item = Menu_item::create($request->all());

        return $this->responseCreated('Menu_item created successfully', new Menu_itemResource($menu_item));
    }

    public function show(Menu_item $menu_item): JsonResponse
    {
        return $this->responseSuccess(null, new Menu_itemResource($menu_item));
    }

    public function update(UpdateMenu_itemRequest $request, Menu_item $menu_item): JsonResponse
    {
        $menu_item->update($request->all());

        return $this->responseSuccess('Menu_item updated Successfully', new Menu_itemResource($menu_item));
    }

    public function destroy(Menu_item $menu_item): JsonResponse
    {
        $menu_item->delete();

        return $this->responseDeleted();
    }

    public function restore($id): JsonResponse
    {
        $menu_item = Menu_item::onlyTrashed()->findOrFail($id);

        $menu_item->restore();

        return $this->responseSuccess('Menu_item restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $menu_item = Menu_item::withTrashed()->findOrFail($id);

        $menu_item->forceDelete();

        return $this->responseDeleted();
    }

}
