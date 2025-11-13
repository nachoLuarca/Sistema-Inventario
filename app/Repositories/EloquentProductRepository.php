<?php
namespace App\Repositories;

use App\Models\Product;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function paginate(int $perPage = 15, array $filters = [])
    {
        $query = Product::with('category');

        if(!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }
        if(!empty($filters['q'])) {
            $q = $filters['q'];
            $query->where(function($sub){
                $sub->where('name','like','%'.request('q').'%')
                    ->orWhere('sku','like','%'.request('q').'%');
            });
        }

        return $query->orderBy('id','desc')->paginate($perPage);
    }

    public function find(int $id) {
        return Product::with('category','stockMovements')->findOrFail($id);
    }

    public function create(array $data) {
        return Product::create($data);
    }

    public function update(int $id, array $data) {
        $p = Product::findOrFail($id);
        $p->update($data);
        return $p;
    }

    public function delete(int $id) {
        $p = Product::findOrFail($id);
        return $p->delete();
    }
}
