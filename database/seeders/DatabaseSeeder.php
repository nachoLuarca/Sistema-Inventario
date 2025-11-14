<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name'=>'Admin',
            'email'=>'admin@example.com',
            'password'=>bcrypt('secret123')
        ]);

        Category::factory(5)->create();

        Product::factory(50)->create()->each(function($p){
            StockMovement::create([
                'product_id'=>$p->id,
                'quantity'=>rand(0,50),
                'type'=>'in',
                'reference'=>'seed',
            ]);
        });
    }
}
