@extends('layouts.app')

@section('content')
<h3>Crear producto</h3>

<form action="{{ route('products.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Nombre</label>
    <input name="name" class="form-control" value="{{ old('name') }}" required>
  </div>
  <div class="mb-3">
    <label>SKU (opcional)</label>
    <input name="sku" class="form-control" value="{{ old('sku') }}">
  </div>
  <div class="mb-3">
    <label>Precio</label>
    <input name="price" type="number" step="0.01" class="form-control" value="{{ old('price',0) }}" required>
  </div>
  <div class="mb-3">
    <label>Categoria</label>
    <select name="category_id" class="form-control">
      <option value="">--Sin categoria--</option>
      @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Cantidad Inicial (opcional)</label>
    <input name="initial_quantity" type="number" class="form-control" value="{{ old('initial_quantity',0) }}">
  </div>
  <div class="mb-3">
    <label>Descripción</label>
    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
  </div>
  <button class="btn btn-primary">Guardar</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
