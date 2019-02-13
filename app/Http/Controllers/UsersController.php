<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showOrders($id){
        $usuario = User::where('id', $id)->first();
        return view('user.orders',  array('user' => $usuario));
    }

    public function showAdminPanel(){
        return view('user.admin.index');
    }

    public function listar(){
        $arrayProductos = Product::all();
        return view('user.admin.listar', array('arrayProductos' => $arrayProductos));
    }

    public function nuevoProducto(){
        return view('user.admin.nuevoproducto');
    }

    public function addProduct(Request $request)
    {    
        $producto = new Product();
        $producto->object = $request->object;
        $producto->name = $request->name;
        $producto->brand = $request->brand;
        $producto->model = $request->model;
        $producto->description = $request->description;
        $producto->specifications = $request->specifications;
        $producto->price = $request->price;
        $producto->categoryid = $request->categoryid;
        $producto->subcategoryid = $request->subcategoryid;
        $producto->providerid = $request->providerid;
        $producto->stock = $request->stock;
        $producto->taxesid = $request->taxesid;
        $producto->save();

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $producto->id;
            $extension = mb_strtolower($image->getClientOriginalExtension());
            $path = public_path('images');
            $imagepath = $request->image->move($path, $filename . '.' . $extension);
        }

        return redirect('user/admin');
    }

    public function editarProducto($id){
        $producto = Product::find($id);
        return view('user.admin.editarproducto', array('producto' => $producto));
    }

    public function editProduct(Request $request, $id)
    {
        $producto = Product::find($id);
        $producto->object = $request->object;
        $producto->name = $request->name;
        $producto->brand = $request->brand;
        $producto->model = $request->model;
        $producto->description = $request->description;
        $producto->specifications = $request->specifications;
        $producto->price = $request->price;
        $producto->categoryid = $request->categoryid;
        $producto->subcategoryid = $request->subcategoryid;
        $producto->providerid = $request->providerid;
        $producto->stock = $request->stock;
        $producto->taxesid = $request->taxesid;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $producto->id;
            $extension = mb_strtolower($image->getClientOriginalExtension());
            $path = public_path('images');
            $imagepath = $request->image->move($path, $filename . '.' . $extension);
        }

        $producto->save();        
        
        return redirect('user/admin');
    } 
}
