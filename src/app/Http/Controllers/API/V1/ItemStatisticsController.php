<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

class ItemStatisticsController extends Controller
{
    public function getStatistics(): JsonResponse
    {
        $totalPrice = Item::query()
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('price')
        ;
        $avgPrice = Item::query()->avg('price');

        return response()->json([
            'totalPrice' => $totalPrice,
            'averagePrice' => $avgPrice,
        ]);
    }
}
