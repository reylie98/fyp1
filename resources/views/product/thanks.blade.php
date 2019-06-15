@extends('layouts.frontlayout.frontdesign')
@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Thanks</li>
				</ol>
			</div>
		</div>
    </section> <!--/#cart_items-->
    
    <section id="do_action">
		<div class="container">
			<div class="heading" align="center">
				<h3>Your Cash on Delivery Order Has been Placed</h3>
				<p>Your Order Number is {{Session::get('order_id')}} and total is MYR {{Session::get('grand_total')}} </p>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
<?php
Session::forget('grand_total');
Session::forget('order_id');
?>