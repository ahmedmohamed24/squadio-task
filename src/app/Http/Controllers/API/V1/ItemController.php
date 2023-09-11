<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ItemResource::collection(Item::query()->paginate());
    }

    public function show(Item $item): JsonResource
    {
        return new ItemResource($item);
    }

    public function store(ItemRequest $request): JsonResponse
    {
        $item = Item::create($request->validated());

        return response()->json(new ItemResource($item), Response::HTTP_CREATED);
    }
}
