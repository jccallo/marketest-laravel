<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends ApiController
{
    public function index()
    {
        $items = Item::all();
        $data = ItemResource::collection($items);
        return $data;
    }
}
