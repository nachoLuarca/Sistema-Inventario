<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductService;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(ProductService $service, ProductRepositoryInterface $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
        /** @noinspection PhpUndefinedMethodInspection */
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $filters = $request->only(['q','category_id']);
        $products = $this->service->list($filters, 15);
        $categories = Category::all();
        return view('products.index', compact('products','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $product = $this->service->create($data, auth()->id());
        return redirect()->route('products.index')->with('success','Producto creado.');
    }

    public function show($id)
    {
        $product = $this->repo->find($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->repo->find($id);
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $this->service->update($id,$request->validated());
        return redirect()->route('products.index')->with('success','Producto actualizado.');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('products.index')->with('success','Producto eliminado.');
    }
}
