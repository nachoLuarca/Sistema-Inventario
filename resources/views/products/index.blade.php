@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h2>Productos</h2>
  <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo producto</a>
</div>

<form method="GET" class="row g-2 mb-3">
  <div class="col-auto">
    <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Buscar...">
  </div>
  <div class="col-auto">
    <select name="category_id" class="form-control">
      <option value="">--Categoria--</option>
      @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-auto"><button class="btn btn-secondary">Filtrar</button></div>
</form>

<table class="table">
  <thead><tr><th>ID</th><th>SKU</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr></thead>
  <tbody>
    @foreach($products as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->sku }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ number_format($p->price,2) }}</td>
        <td>{{ $p->stockQuantity() }}</td>
        <td>
          <a class="btn btn-sm btn-info" href="{{ route('products.show',$p) }}">Ver</a>
          <a class="btn btn-sm btn-warning" href="{{ route('products.edit',$p) }}">Editar</a>
          <form action="{{ route('products.destroy',$p) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminar?')">Eliminar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $products->links() }}
@endsection
