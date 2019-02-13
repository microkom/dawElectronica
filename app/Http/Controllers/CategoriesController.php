<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getCategory($category)
    {
        $categoryId = Category::where('name', $category)->first()->id;
        $arrayProductos = Product::where('categoryid', $categoryId)->get();
        return view('category.index', array('arrayProductos' => $arrayProductos, 'category' => $category));
    }
    public function getSubCategory($category, $subCategory)
    {
        $categoryId = Category::where('name', $category)->first()->id;
        $subcategoryId = Subcategory::where('name', $subCategory)->first()->id;
        $arrayProductos = Product::where('categoryid', $categoryId)->where('subcategoryid', $subcategoryId)->get();
        return view('category.index', array('arrayProductos' => $arrayProductos, 'category' => $category, 'subCategory' => $subCategory));
    }
}
