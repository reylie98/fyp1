@extends('layouts.frontlayout.frontdesign')
@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Orders</li>
				</ol>
			</div>
		</div>
    </section> <!--/#cart_items-->
    
    <section id="do_action">
		<div class="container">
			<div class="heading" align="center">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Ordered Products</th>
                <th>Payment Method</th>
                <th>Total</th>
                <th>Created on</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>
                @foreach($order->orders as $produ)
                    {{$produ->product_name}}<br>
                @endforeach
                </td>
                <td>{{$order->payment_method}}</td>
                <td>MYR {{$order->grand_total}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection