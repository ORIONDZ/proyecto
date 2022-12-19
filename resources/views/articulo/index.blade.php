@extends('layouts.articulos_base')


@section('contenido')

<div class="articulo_main">

@if (session('sucess'))
    <h6 class="alert alert-success">{{ session('sucess')}}</h6>
@endif
@if (session('error'))
    <h6 class="alert alert-danger">>{{ session('error') }}</h6>
@endif

<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-ptimary text-black">
        <th scope="col">ID</th>
        <th scope="col">Articulo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        {{-- <th scope="col">Imagen</th> --}}
        <th scope="col">Fecha de creación</th>
        <th scope="col">Fecha de actualización</th>
        <th scope="col">Acciones</th>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->articulo}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>{{$articulo->precio}} $</td>
            <td>{{$articulo->cantidad}}</td>
            {{-- <td>{{$articulo->imagen}}</td> --}}
            <td>{{$articulo->created_at}}</td>
            <td>{{$articulo->updated_at}}</td>
            <td>
            <div class="action_buttons">
            <form action="{{route ('articulos_form_edit', [$articulo->id]) }}" method="POST">
                @method('PUT')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-info btn-sm">Editar</button>
            </form>
            <form action="{{ route('articulos_delete',$articulo->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm">Borrar</button>
            </form>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#articulos').DataTable();
});
</script>
@endsection

@endsection