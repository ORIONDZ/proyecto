@extends('layouts.articulos_base')

@section('contenido')

<div class="articulo_view">
<h2>Editar Registros</h2>

<form action="{{ route('articulos_update', $articulo->id) }}" method="POST" >
    @csrf
    @method('PUT')
    <div>
     <label for="" class="form-label">Articulo</label>
     <input id="articulo" name="articulo" type="tex" class="form-control" value="{{$articulo->articulo}}">
    </div>
    <div>
     <label for="" class="form-label">Descripcion</label>
     <input id="descripcion" name="descripcion" type="tex" class="form-control" value="{{$articulo->descripcion}}">
    </div>
    <div>
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step=any value="0.0" class="form-control" value="{{$articulo->precio}}">
    </div>
    <div>
     <label for="" class="form-label">Cantidad</label>
     <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$articulo->cantidad}}">
    </div>
    <!--Oculto--><input id="imagen" name="imagen" type="hidden" class="form-control" value="{{$articulo->imagen}}">
    <br><div class="botones">
        <a href="{{ route('articulos') }}" class="btn btn-secondary" tabindex="6">Regresar</a>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </div>
    
</form>
</div>
@endsection