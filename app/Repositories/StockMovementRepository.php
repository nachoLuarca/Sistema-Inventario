<?php

namespace App\Repositories;

use App\Models\StockMovement;
use Carbon\Carbon;

class StockMovementRepository
{
    public function countToday()
    {
        return StockMovement::whereDate('created_at', Carbon::today())->count();
    }

    public function latest($limit = 5)
    {
        return StockMovement::with('product')
            ->latest()
            ->take($limit)
            ->get();
    }

    public function countByDate($date)
    {
        return StockMovement::whereDate('created_at', $date)->count();
    }
}
