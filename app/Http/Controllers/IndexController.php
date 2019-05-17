<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
    public function index(){
        $allProducts = Product::get();
        return view('index')->with(compact('allProducts'));
    }
}
