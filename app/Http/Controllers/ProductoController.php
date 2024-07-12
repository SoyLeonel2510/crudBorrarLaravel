<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class ProductoController extends Controller
{
    public function index(){
        $productos = producto::all();
    
        return view('welcome', compact('productos'));
    }

    public function store( Request $request){
        $producto = new Producto();
        $producto->producto=$request->producto;
        $producto->precio=$request->precio;
        $producto->cantidad=$request->cantidad;
        $producto->save();
        return back();
    }
    
    public function delete( $id){
        $producto = Producto::find($id);
        $producto->delete();
        return back();
    }
    public function edit($id){
        $producto = Producto::find($id);

        return view('productos.producto',compact('producto'));
    }
    public function update($id, Request $request){
        $producto = Producto::find($id);
        $producto->producto=$request->producto;
        $producto->precio=$request->precio;
        $producto->cantidad=$request->cantidad;
        $producto->save();
        return redirect('/');
    }
}
