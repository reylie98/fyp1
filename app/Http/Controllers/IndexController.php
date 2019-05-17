<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    public function index(){
        $allProducts = Product::orderBy('id','DESC')->get();
        
        $categories = Category::where(['parent_id'=>0])->get();
        // $categories = json_decode(json_encode($categories));
        foreach($categories as $cat){
            echo $cat->name;
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $subcat){
                echo $subcat->name;
            }
        }
        die;
        return view('index')->with(compact('allProducts'));
    }
}
