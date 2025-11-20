<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\StockMovementRepository;
use Carbon\Carbon;

class DashboardService
{
    protected $productRepo;
    protected $movementRepo;

    public function __construct(
        ProductRepository $productRepo,
        StockMovementRepository $movementRepo
    ) {
        $this->productRepo = $productRepo;
        $this->movementRepo = $movementRepo;
    }

    public function getDashboardData()
    {
        $labels = [];
        $cantidades = [];

        for ($i = 6; $i >= 0; $i--) {
            $fecha = Carbon::today()->subDays($i);

            $labels[] = $fecha->format('d M');
            $cantidades[] = $this->movementRepo->countByDate($fecha);
        }

        return [
            'totalProductos'   => $this->productRepo->count(),
            'movimientosHoy'   => $this->movementRepo->countToday(),
            'ultimosMovimientos' => $this->movementRepo->latest(),
            'labels'           => $labels,
            'cantidades'       => $cantidades
        ];
    }
}
