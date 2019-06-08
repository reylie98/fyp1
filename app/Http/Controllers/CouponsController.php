<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function addCoupon(){
        return view('admin.coupons.addcoupon');
    }
}
