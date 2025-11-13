<?php
namespace App\Http\Controllers;

use App\Http\Requests\StockMovementRequest;
use App\Models\StockMovement;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class StockMovementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(StockMovementRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        // Considerar validaciones extra: no permitir salida mayor que stock (si quieres)
        StockMovement::create($data);
        return redirect()->back()->with('success','Movimiento registrado.');
    }

    public function index()
    {
        $movements = StockMovement::with('product','user','warehouse')->latest()->paginate(25);
        return view('stock_movements.index', compact('movements'));
    }
}
