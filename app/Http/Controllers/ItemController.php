<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Models\Item as ItemModel;
use App\Http\Resources\ItemResource;
use App\Http\Requests\ItemStoreRequest;

class ItemController extends Controller
{
    /**
     * @const INT
     */
    private const ITEMS_PER_PAGE = 5;

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $items = ItemModel::orderBy('created_at', 'DESC')->paginate(
            ItemController::ITEMS_PER_PAGE
        );
    
        return ItemResource::collection($items);
    }

    /**
     * @param ItemStoreRequest $request
     * @return ItemResource
     */
    public function store(ItemStoreRequest $request): ItemResource
    {
        $store = new ItemModel($request->item);
        $store->save();
    
        return new ItemResource($store);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}