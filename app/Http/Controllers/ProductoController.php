<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $url = 'http://localhost/ProyectoTienda/public/Adjuntos/';
        return view('productos.index',compact('productos','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('name','id');
        return view('productos.create',compact('categorias'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = public_path('Adjuntos');
        $file = $request->file('image');
        $nombreArchivo = $file->getClientOriginalName();
        $cargarArchivo = $file->move($path,($nombreArchivo));
        
        $productos = new Producto;
        $productos->name = $request->name;
        $productos->description = $request->description;
        $productos->price = $request->price;
        $productos->category_id = $request->category;
        $productos->image = $nombreArchivo;
        $productos->state = 1;
        $productos->save(); 


        return redirect(route('productos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $productos = Producto::where('id',$producto->id)->first();
        $categorias = Categoria::pluck('name','id');
        $categoria = Categoria::where('id',$productos->category_id)->pluck('id','name');
        // $path = public_path('Adjuntos');
        $imagen = 'http://localhost/ProyectoTienda/public/Adjuntos/'.$productos->image;
        return view('productos.edit',compact('productos','imagen','categorias','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $productos = Producto::where('id',$request->id)->first();
        $path = public_path('Adjuntos');
        $file = $request->file('image');
        if (!empty($file)) {
            unlink(public_path('Adjuntos\\'.$productos->image));
            $nombreArchivo = $file->getClientOriginalName();
            $cargarArchivo = $file->move($path,($nombreArchivo));
        }
        $productos->name = $request->name;
        $productos->description = $request->description;
        $productos->price = $request->price;
        $productos->category_id = $request->category;
        if (!empty($file)) {
            $productos->image = $nombreArchivo;
        }
        $productos->save(); 

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function listado()
    {
        $productos = Producto::all();
        return view('productos.products',compact('productos'));
    }

    public function bloquear(Request $request){
        $id = $request->id;
        $producto = Producto::find($id);
        if($producto->state==1){
            $producto->state = 0;
        }else{
            $producto->state = 1;
        }
        $producto->save();
    return response()->json(1);
    }
}
