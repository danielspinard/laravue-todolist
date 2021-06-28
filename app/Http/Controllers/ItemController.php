<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Carbon;
use App\Models\Item as ItemModel;
use App\Http\Resources\ItemResource;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;

class ItemController extends Controller
{
    /**
     * @const int
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
     * @param int $id
     * @return ItemResource
     */
    public function show(int $id): ItemResource
    {
        return new ItemResource(
            ItemModel::findOrFail($id)
        );
    }

    /**
     * @param ItemUpdateRequest $request
     * @param int $id
     * @return ItemResource
     */
    public function update(ItemUpdateRequest $request, int $id): ItemResource
    {
        $item = ItemModel::findOrFail($id);
        $completed = $request->hasItemCompleted();

        $item->completed = ($completed ? 1 : 0);
        $item->completed_at = ($completed ? Carbon::now() : null);
        $item->save();

        return new ItemResource($item);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $item = ItemModel::findOrFail($id);

        return response()->json([
            'message' => ($item->delete() ? 'success' : 'error')
        ]);
    }
}
