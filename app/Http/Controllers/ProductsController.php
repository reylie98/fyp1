<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Coupon;
use App\Country;
use App\Adress;
use App\Bill;
use App\User;
use Image;
use DB;

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
            if(empty($data['status'])){
                $status= 0 ;
            }else{
                $status= 1;
            }
            $product->status = $status;
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

            if(empty($data['status'])){
                $status= 0 ;
            }else{
                $status= 1;
            }

   
            Product::where(['id'=>$id])->update(['product_name'=>$data['productname'],'product_code'=>$data['productcode'],
            'product_color'=>$data['productcolor'],'category_id'=>$data['category_id'],'price'=>$data['productprice'],
            'description'=>$data['description'],'image'=>$filename,'status'=>$status]);
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
                    $skucount = ProductsAttribute::where('sku',$val)->count();
                    if ($skucount>0){
                        return redirect('admin/addatributes/'.$id)->with('flash_message_error','SKU already exist!');
                    }

                    $sizecount = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($sizecount>0){
                        return redirect('admin/addatributes/'.$id)->with('flash_message_error','"'.$data['size'][$key].'" Size already exist!');
                    }

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
            $allProducts = Product::whereIn ('category_id',$cat_ids)->where('status',1)->get();
            $allProducts = json_decode(json_encode($allProducts));
           //dd($allProducts);
        }else{
            $allProducts = Product::where (['category_id'=> $categoryUrl->id])->where('status',1)->get();
        }

        return view('product.list')->with(compact('categories','categoryUrl','allProducts'));

    }
    public function products($id=null){
        //PROTECTING ROUTE USING COUNT
        $productsdisable = Product::where(['id'=>$id, 'status'=>1])->count();
        if($productsdisable == 0){
            abort(404);
        }
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        //dd($productDetails);

        $relatedProducts = Product::where('id','!=',$id)->where(['category_id' => $productDetails->category_id])->get();
        // $relatedProducts = json_decode(json_encode($relatedProducts));
        
        // foreach($relatedProducts->chunk(3) as $chunk){
        //     foreach($chunk as $item){
        //         echo $item; echo "<br>"; 
        //     }   
        //     echo "<br><br><br>";
        // }
        // die;

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $productImages = ProductsImage::where('product_id',$id)->get();
        $productImages = json_decode(json_encode($productImages));
        //dd($productImages);

        $totalstock = ProductsAttribute::where('product_id',$id)->sum('stock');
        // dd($totalstock);
        return view('product.detail')->with(compact('productDetails','categories','productImages','totalstock','relatedProducts'));
    }
    public function productprice(Request $request){
        $data = $request->all();
        $proArr = explode("-",$data['idSize']);
        $proAttr = ProductsAttribute::where(['product_id'=> $proArr[0], 'size'=>$proArr [1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;

    }
    public function addImages(Request $request,$id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        $productDetails = json_decode(json_encode($productDetails));
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach ($files as $file){
                    
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $largeimagepath = 'images/Backendimages/products/large/'.$filename;
                    $mediumimagepath = 'images/Backendimages/products/medium/'.$filename;
                    $smallimagepath = 'images/Backendimages/products/small/'.$filename;
                    Image::make($file)->save($largeimagepath);
                    Image::make($file)->resize(600,600)->save($mediumimagepath);
                    Image::make($file)->resize(300,300)->save($smallimagepath);
                    $image->image = $filename;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }

                return redirect('admin/addimages/'.$id)->with('flash_message_success','Product Images has been added successfully');
            }         
        }
        $productsimages= ProductsImage::where(['product_id'=>$id])->get();
        $productsimages= json_decode(json_encode($productsimages));
        return view('admin.products.addimages')->with(compact('productDetails', 'productsimages'));
    }
    public function deletealtimage($id=null){
        $productsImage= ProductsImage::where(['id'=>$id])->first();
        $largeimagepath='images/Backendimages/products/large/';
        $mediumimagepath='images/Backendimages/products/medium/';
        $smallimagepath='images/Backendimages/products/small/';

        if(file_exists($largeimagepath.$productsImage->image)){
            unlink($largeimagepath.$productsImage->image);
        }
        
        if(file_exists($mediumimagepath.$productsImage->image)){
            unlink($mediumimagepath.$productsImage->image);
        }
        
        if(file_exists($smallimagepath.$productsImage->image)){
            unlink($smallimagepath.$productsImage->image);
        }
        ProductsImage::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', ' Product image has been deleted');
    }
    public function editAttributes(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            Foreach($data['AttrId'] as $key=> $attr){
                ProductsAttribute::where(['id'=>$data['AttrId'][$key]])->update(['price'=>$data['AttrPrice'][$key],'stock'=>$data['AttrStock'][$key]]);
            }
        return redirect()->back()->with('flash_message_success','Products Attributes has been updated');
        }
   

    }
    public function addtocart(Request $request){
        Session::forget('couponamount');
        Session::forget('couponcode');

        $data = $request->all();
        //dd($data);
        if(empty($data['user_email'])){
            $data['user_email']='';
        }
        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id= str_random(40);
            Session::put('session_id',$session_id);
        }
        //funcri
        $sizeArr= explode("-",$data['size']);

        $duplicateproduct = 
        DB::table('cart')->where(['product_id'=>$data['product_id'],
        'product_color'=>$data['product_color'],'size'=>$sizeArr[1],'session_id'=>$session_id
        ])->count();

        if($duplicateproduct>0){
            return redirect()->back()->with('flash_message_error','Product already exist in Cart!');
        }else{
        $getSKU = ProductsAttribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$sizeArr[1]])->first();

        DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$getSKU->sku,
        'product_color'=>$data['product_color'],'price'=>$data['product_price'], 'size'=>$sizeArr[1], 'quantity'=>$data['quantity'] , 
        'user_email'=>$data['user_email'], 'session_id'=>$session_id]);
        }

        return redirect('cart')->with('flash_message_success','Product Successfully Added to cart');
    }
    public function cart(){
        $session_id = Session::get('session_id');
        $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        foreach($userCart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        return view('product.cart')->with(compact('userCart'));
    }
    public function deletecart($id=null){
        Session::forget('couponamount');
        Session::forget('couponcode');
        DB::table('cart')->where('id',$id)->delete();
        return redirect('cart')->with('flash_message_success', 'Product has been deleted from Cart!');
    }
    public function updatequantity($id=null,$quantity=null){
        Session::forget('couponamount');
        Session::forget('couponcode');
        $getdetails = DB::table('cart')->where('id',$id)->first();
        $getstock = ProductsAttribute::where('sku',$getdetails->product_code)->first();
        echo $getstock->stock; echo "--";
        echo $updatequantity = $getdetails->quantity+$quantity;
        if($getstock->stock >= $updatequantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return redirect('cart');
        }else{
            return redirect('cart')->with('flash_message_error', 'Product quantity is not enough !');
        }

    }
    Public function applyCoupon(Request $request){
        Session::forget('couponamount');
        Session::forget('couponcode');

        $data = $request->all();
        $checkCoupon = Coupon::where('coupon_code',$data['couponcode'])->count();
        if($checkCoupon == 0){
            return redirect()->back()->with('flash_message_error', 'Coupon is not valid');
        }else{
            //get coupon status
           $coupondetails = Coupon::where('coupon_code',$data['couponcode'])->first();
           if($coupondetails->status ==0){
            return redirect()->back()->with('flash_message_error', 'Coupon is Inactive');
           }
           //check expired date
           $expirydate = $coupondetails->expiry_date;
           $currentdate = date('y-m-d');
           if($expirydate < $currentdate){
            return redirect()->back()->with('flash_message_error', 'Coupon is Expired');  
           }
           //get cart total
           $session_id = Session::get('session_id');
           $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
           $totalamount = 0;
            foreach($userCart as $item){
                $totalamount = $totalamount + ($item->price * $item->quantity);
            }
           //if coupon eligible
          
           if($coupondetails->amount_type=="Fixed"){
               $couponamount = $coupondetails->amount;
           }else{
               $couponamount = $totalamount * ($coupondetails->amount/100);
           }
           //add coupon amount on session
           Session::put('couponamount',$couponamount);
           Session::put('couponcode',$data['couponcode']);

           return redirect()->back()->with('flash_message_success', 'Coupon code successfully applied');  
        }
    }
    public function checkout(Request $request){
        $countries=Country::get();
        $userid= Auth::user()->id;
        $email=Auth::user()->email;

        if($request->isMethod('post')){
            $data = $request->all();

            //check shipping address
            $shippingcount = Adress::where('user_id',$userid)->count();
            
            //update cart with user email
            $session_id=Session::get('session_id');
            DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$email]);
            if(empty($data['billingname']) || empty($data['billingaddress'])|| empty($data['billingcity']) 
            || empty($data['billingstate'])|| empty($data['billingcountry'])|| empty($data['billingcode'])
            || empty($data['billingnumber']) || empty($data['shippingname']) || empty($data['shippingaddress'])
            || empty($data['shippingcity']) || empty($data['shippingstate']) || empty($data['shippingcountry'])
            || empty($data['shippingcode']) || empty($data['shippingnumber'])){
                return redirect()->back()->with('flash_message_error','Please fill in all the field');
            }
            if($shippingcount>0){
                Adress::where('user_id',$userid)->update(['name'=>$data['shippingname'],'address'=>$data['shippingaddress']
                ,'city'=>$data['shippingcity'],'state'=>$data['shippingstate'],'country'=>$data['shippingcountry']
                ,'postcode'=>$data['shippingcode'],'mobile'=>$data['shippingnumber']]);

                Bill::where('user_id',$userid)->update(['name'=>$data['billingname'],'address'=>$data['billingaddress']
                ,'city'=>$data['billingcity'],'state'=>$data['billingstate'],'country'=>$data['billingcountry']
                ,'postcode'=>$data['billingcode'],'mobile'=>$data['billingnumber']]);
            }else{
                $address = new Adress;
                $address->user_id = $userid;
                $address->user_email=$email;
                $address->name=$data['shippingname'];
                $address->address=$data['shippingaddress'];
                $address->city=$data['shippingcity'];
                $address->state=$data['shippingstate'];
                $address->country=$data['shippingcountry'];
                $address->postcode=$data['shippingcode'];
                $address->mobile=$data['shippingnumber'];
                $address->save();

                $billing = new Bill;
                $billing->user_id = $userid;
                $billing->user_email=$email;
                $billing->name=$data['billingname'];
                $billing->address=$data['billingaddress'];
                $billing->city=$data['billingcity'];
                $billing->state=$data['billingstate'];
                $billing->country=$data['billingcountry'];
                $billing->postcode=$data['billingcode'];
                $billing->mobile=$data['billingnumber'];
                $billing->save();
            }
            return redirect()->action('ProductsController@revieworder');


        }
        return view('product.checkout')->with(compact('countries'));
    }
    public function revieworder(){
        $userid = Auth::user()->id;
        $email = Auth::user()->email;
        $userdetail = User::where ('id',$userid)->first();
        $shippingdetails= Adress::where('user_id',$userid)->first();
        $billingdetails = Bill::where('user_id',$userid)->first();

        return view('product.revieworder')->with(compact('userdetail','shippingdetails','billingdetails'));
    }
}
