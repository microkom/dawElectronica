<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProduct($id){
        $producto = Product::where('id', $id)->first();
        return view('product.index',  array('product' => $producto));
    }
}