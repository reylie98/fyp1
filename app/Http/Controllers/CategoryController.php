<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $namecount = Category::where(['name'=>$data['categoryname']])->count();
            $urlcount = Category::where(['url'=>$data['url']])->count();
            if($namecount>0){
                return redirect()->back()->with('flash_message_error','Category Name Already Exist');
            }
            if($urlcount>0){
                return redirect()->back()->with('flash_message_error','URL Already Exist');
            }
            if(empty($data['status'])){
                $status= 0;
            }else{
                $status = 1;
            }
                $category = new Category;
                $category->name = $data['categoryname'];
                $category->parent_id = $data['parent_id'];
                $category->description=$data['description'];
                $category->url =$data['url'];
                $category->status = $status;
                $category->save();
            return redirect ('/admin/viewcategory')->with('flash_message_success','Category Added Successfully!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.addcategory')->with(compact('levels'));
    }
    public function viewCategory(Request $request){
        $categories = Category::get();
        $categories = json_decode(json_encode($categories));
        return view('admin.categories.viewcategory')->with(compact('categories'));

    }
    public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            $urlcount = Category::where(['url'=>$data['url']])->count();
            if($urlcount>0){
                return redirect()->back()->with('flash_message_error','URL Already Exist');
            }
            if(empty($data['status'])){
                $status = 0;
            }else {
                $status = 1;
            }
            Category::where(['id'=>$id])->update(['name'=>$data['categoryname'],'description'=>$data['description'],'url'=>$data['url'],'status'=>$status]);
            return redirect('/admin/viewcategory')->with ('flash_message_success','Category Updated Successfully!');
        }
        $categoryInfo = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.editcategory')->with(compact('categoryInfo','levels'));

    }
    public function deleteCategory(Request $request, $id=null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Category Deleted Successfully');
        }

    }
}
