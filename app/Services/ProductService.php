<?php
namespace App\Services;

use App\Repositories\ProductRepositoryInterface;
use App\Models\StockMovement;
use Illuminate\Support\Str;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepositoryInterface $repo) {
        $this->repo = $repo;
    }

    public function list(array $filters = [], int $perPage = 15) {
        return $this->repo->paginate($perPage, $filters);
    }

    public function create(array $data, $userId = null) {
        if(empty($data['sku'])) {
            $data['sku'] = strtoupper(Str::slug(substr($data['name'],0,10))).'-'.rand(1000,9999);
        }
        $product = $this->repo->create($data);

        // Si viene cantidad inicial, crear movimiento
        if(!empty($data['initial_quantity']) && (int)$data['initial_quantity'] > 0) {
            StockMovement::create([
                'product_id' => $product->id,
                'quantity' => (int) $data['initial_quantity'],
                'type' => 'in',
                'user_id' => $userId,
                'reference' => 'initial',
            ]);
        }
        return $product;
    }

    public function update(int $id, array $data) {
        return $this->repo->update($id, $data);
    }

    public function delete(int $id) {
        return $this->repo->delete($id);
    }
}
