@extends('layouts.cslayout.csdesign')
@section('content')

<div id="content">
<div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Ticket</a> </div>
    <h1>Orders</h1>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Order</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>User ID</th>
                  <th>User Email</th>
                  <th>shipping Charge</th>
                  <th>coupon code</th>
                  <th>coupon amount</th>
                  <th>payment method</th>
                  <th>grand total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr class="gradeX">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->user_email }}</td>
                    <td>{{ $order->shippingcharge }}</td>
                    <td>{{ $order->coupon_code}}</td>
                    <td>{{$order->coupon_amount}}
                    </td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->grand_total }}</td>
                </tr>   

                @endforeach
                
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection