<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sku','name','description','price','category_id'];

    // Relaciones
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function stockMovements() {
        return $this->hasMany(StockMovement::class);
    }

    // Accesor para stock (suma de movimientos)
    protected $appends = ['stock'];

    public function getStockAttribute() {
        // Sum quantities; si hay muchos movimientos, optimizar con query
        return (int) $this->stockMovements()->sum('quantity');
    }

    // helper
    public function stockQuantity() {
        return $this->stock;
    }
}
