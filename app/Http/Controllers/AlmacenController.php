<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Almacen;
use Illuminate\Support\Facades\Validator;

class AlmacenController extends Controller
{

    public function index() 
    {
        $articulos = Almacen::all();
        return view('articulo.index')->with('articulos', $articulos);
    }

    public function create()
    {
        return view('articulo.create');
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'articulo' => 'required|string|max:500',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required',
            'cantidad' => 'required|int',
        ]);

        if ($validator->fails()) {
            return redirect()->route('articulos_create')->with('error', $validator->errors());
        }
        $articulos = new Almacen();
        $articulos->articulo = $request->get('articulo');
        $articulos->descripcion = $request->get('descripcion');
        $articulos->precio = $request->get('precio');
        $articulos->cantidad = $request->get('cantidad');
        $articulos->imagen = $request->get('imagen');
        $articulos->save();

        return redirect()->route('articulos_create')->with('sucess', 'El articulo se guardó con éxito.');
    }

    public function show($id)
    {
        $articulos = Almacen::find($id);
        return $articulos;
    }

    public function edit($id)
    {
        $articulo = Almacen::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'articulo' => 'required|string|max:500',
            'descripcion' => 'required|string|max:500',
            'precio' => 'required',
            'cantidad' => 'required|int',
        ]);

        if ($validator->fails()) {
            return redirect()->route('articulos')->with('error', $validator->errors());
        }

        $articulo = Almacen::find($id);
        $articulo->articulo = $request->get('articulo');
        $articulo->descripcion = $request->get('descripcion');
        $articulo->precio = $request->get('precio');
        $articulo->cantidad = $request->get('cantidad');
        $articulo->imagen = $request->get('imagen');
        $articulo->save();

        return redirect()->route('articulos')->with('sucess', 'El articulo se editó con éxito.');
    }

    public function destroy($id)
    {
        $articulo = Almacen::find($id);
        $articulo->delete();
        return redirect()->back()->with('sucess', 'El articulo se eliminó con éxito.');
    }
}
