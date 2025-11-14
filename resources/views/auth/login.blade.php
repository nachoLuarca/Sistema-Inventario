@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 450px;">
    <h3 class="text-center mb-4">Iniciar Sesión</h3>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary w-100">Ingresar</button>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
        </div>
    </form>
</div>
@endsection
