<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use Image;

class ProductsController extends Controller
{
    public function addproduct(Request $request){
        if ($request->isMethod('post')){
            $data=$request->all();
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Please choose the Under Category!');
            }
            $product = new Product;
            $product->product_name = $data ['productname'];
            $product->product_code = $data ['productcode'];
            $product->product_color = $data ['productcolor'];
            $product->category_id = $data ['category_id'];
            $product->price = $data ['productprice'];
            $product->description = $data ['description'];
            if($request->hasFile('productimage')){
                $image_tmp = Input::file('productimage');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $largeimagepath='images/Backendimages/products/large/'. $filename;
                    $mediumimagepath='images/Backendimages/products/medium/'. $filename;
                    $smallimagepath='images/Backendimages/products/small/'. $filename;

                    //resize
                    Image::make($image_tmp)->save($largeimagepath);
                    Image::make($image_tmp)->resize(600,600)->save($mediumimagepath);
                    Image::make($image_tmp)->resize(300,300)->save($smallimagepath);
                    $product->image =$filename;
                }
            }
            $product->save();
            // return redirect()->back()->with('flash_message_success','Product has been added successfully!');
            return redirect('/admin/viewproduct')->with('flash_message_success','Product has been added successfully!');
        }


        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .="<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where (['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value ='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        return view ('admin.products.addproduct')->with(compact('categories_dropdown'));
    }

    public function viewProduct(){
        $products = Product::get();
        $product = json_decode(json_encode($products));
        foreach($products as $key => $val){
            $categoryname = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->categoryname = $categoryname->name;
        }
        return view ('admin.products.viewproduct')->with(compact('products'));

    }
    public function editProduct(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();

            if($request->hasFile('productimage')){
                $image_tmp = Input::file('productimage');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $largeimagepath='images/Backendimages/products/large/'. $filename;
                    $mediumimagepath='images/Backendimages/products/medium/'. $filename;
                    $smallimagepath='images/Backendimages/products/small/'. $filename;

                    //resize
                    Image::make($image_tmp)->save($largeimagepath);
                    Image::make($image_tmp)->resize(600,600)->save($mediumimagepath);
                    Image::make($image_tmp)->resize(300,300)->save($smallimagepath);
                }
            }else{
                $filename = $data['current_image'];
            }
            Product::where(['id'=>$id])->update(['product_name'=>$data['productname'],'product_code'=>$data['productcode'],
            'product_color'=>$data['productcolor'],'category_id'=>$data['category_id'],'price'=>$data['productprice'],
            'description'=>$data['description'],'image'=>$filename]);
            return redirect()->back()->with('flash_message_success','Product has been updated!');
        }

        $productDetails = Product::where(['id'=>$id])->first();

        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id==$productDetails->category_id){
            $selected="selected";        
            }else{
                $selected="";
            }
            $categories_dropdown .="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where (['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id==$productDetails->category_id){
                        $selected="selected";        
                    }else{
                        $selected="";
                    }
                $categories_dropdown .= "<option value ='".$sub_cat->id."'".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        return view ('admin.products.editproduct')->with(compact('productDetails','categories_dropdown'));


    }
    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product has been deleted');
    }
    public function addAttributes(Request $request,$id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        $productDetails = json_decode(json_encode($productDetails));
        if($request->isMethod('post')){
            $data=$request->all();
            foreach($data['sku']as $key => $val){
                if(!empty($val)){
                    $attribute = new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute ->save();
                }
            }
            return redirect('admin/addatributes/'.$id)->with('flash_message_success','Product Attributes Sucessfully Added!');    
        }
        return view('admin.products.addatributes')->with(compact('productDetails'));
    }
    public function deleteAttribute ($id=null){
        ProductsAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Attribute has been deleted!');
    }
    public function product($url=null){

        $countCategory = Category::where(['url'=>$url,'status'=>1])->count();
        if($countCategory==0){
            abort(404);
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $categoryUrl = Category::where (['url'=> $url])->first();

        if ($categoryUrl->parent_id==0){
            $subCategories = Category::where(['parent_id'=>$categoryUrl->id])->get();
            foreach($subCategories as $subcat){
                $cat_ids[] = $subcat->id;
            }
            //echo $cat_ids; 
            $allProducts = Product::whereIn ('category_id',$cat_ids)->get();
            $allProducts = json_decode(json_encode($allProducts));
           //dd($allProducts);
        }else{
            $allProducts = Product::where (['category_id'=> $categoryUrl->id])->get();
        }

        return view('product.list')->with(compact('categories','categoryUrl','allProducts'));

    }
    public function products($id=null){
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        //dd($productDetails);
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('product.detail')->with(compact('productDetails','categories'));
    }
}
