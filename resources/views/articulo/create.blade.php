@extends('layouts.articulos_base')

@section('contenido')

<div class="articulo_view">
<h2>Crear Registros</h2>

@if (session('sucess'))
    <h6 class="alert alert-success">{{ session('sucess')}}</h6>
@endif
@if (session('error'))
    <h6 class="alert alert-danger">>{{ session('error') }}</h6>
@endif

<form action="{{ route('articulos_save') }}" method="POST" >
    @csrf
    <div>
     <label for="" class="form-label">Articulo</label>
     <input id="articulo" name="articulo" type="tex" class="form-control" tabindex="1">
    </div>
    <div>
     <label for="" class="form-label">Descripcion</label>
     <input id="descripcion" name="descripcion" type="tex" class="form-control" tabindex="2">
    </div>
    <div>
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step=any value="0.0" class="form-control" tabindex="3">
    </div>
    <div>
     <label for="" class="form-label">Cantidad</label>
     <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="4">
    </div>
    <!--Oculto--><input id="imagen" name="imagen" type="hidden" class="form-control" tabindex="5">
    <br>
    <div class="botones">
        <a href="{{ route('articulos') }}" class="btn btn-secondary" tabindex="6">Regresar</a>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar Producto</button>
    </div>
    
</form>
</div>

@endsection 