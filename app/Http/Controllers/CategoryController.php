<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
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
