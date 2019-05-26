<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    public function index(){
        $allProducts = Product::orderBy('id','DESC')->where('status',1)->get();
        
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_decode(json_encode($categories));
        
        return view('index')->with(compact('allProducts','categories'));
    }
}
