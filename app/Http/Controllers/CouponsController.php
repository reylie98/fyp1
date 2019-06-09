<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $coupon = new Coupon;
            $coupon->coupon_code = $data['couponcode'];
            $coupon->amount = $data['Amount'];
            $coupon->amount_type = $data['amountype'];
            $coupon->expiry_date = $data['Expiry'];
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success','Coupon has been added Successfully !');
        }
        return view('admin.coupons.addcoupon');
    }
    public function viewCoupons(){
        $coupons = Coupon::get();
        return view('admin.coupons.viewcoupon')->with(compact('coupons'));
    }
    Public function editCoupon(request $request, $id=null){
        if($request->isMethod('post')){
            $data  = $request->all();
            $coupon = Coupon::find($id);
            $coupon->coupon_code = $data['couponcode'];
            $coupon->amount = $data['Amount'];
            $coupon->amount_type = $data['amountype'];
            $coupon->expiry_date = $data['Expiry'];
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success','Coupon has been updated Successfully !');
        }
        $coupondetails = Coupon::find($id);
        return view ('admin.coupons.editcoupon')->with(compact('coupondetails'));
    }
    public function deleteCoupon($id){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','coupon has been deleted !!');

    }
}
