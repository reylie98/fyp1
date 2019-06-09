@extends('layouts.adminlayout.admindesign')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Coupons</a> <a href="#" class="current">Validation</a> </div>
    <h1>Coupons</h1>
    @if(Session::has('flash_message_error')) 
       <div class="alert alert-error alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif   
    @if(Session::has('flash_message_success')) 
        <div class="alert alert-success alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif      
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Coupon</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/editcoupon/'.$coupondetails->id)}}" name="add_coupon" id="add_coupon">{{ csrf_field() }}
            <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Coupon Code</label>
                <div class="controls">
                  <input value="{{$coupondetails->coupon_code}}" type="text" name="couponcode" id="couponcode" minlength="5" maxlength="15" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Amount</label>
                <div class="controls">
                  <input value="{{$coupondetails->amount}}" type="number" name="Amount" id="Amount" min="0" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Expiry Date</label>
                <div class="controls">
                  <input value="{{$coupondetails->expiry_date}}" type="text" name="Expiry" id="Expiry" autocompete="off" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Amount Type</label>
                <div class="controls">
                  <select name="amountype" id="amountype" style="width: 220px">
                    <option @if($coupondetails->amount_type=="Percentage") selected @endif value = "Percentage">Percentage</option>
                    <option @if($coupondetails->amount_type=="Fixed") selected @endif value = "Fixed"> Fixed </option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($coupondetails->status==1) checked @endif>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Coupon" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
  </div>
</div>
@endsection