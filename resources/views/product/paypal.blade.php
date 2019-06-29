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
				<h3>Your Order Has been Placed</h3>
				<p>Your Order Number is {{Session::get('order_id')}} and total is MYR {{Session::get('grand_total')}} </p>
                <p> </p>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <!-- Saved buttons are identified by their button IDs -->
                <input type="hidden" name="hosted_button_id" value="221">

                <!-- Saved buttons display an appropriate button image. -->
                <input type="image" name="submit"
                src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                alt="PayPal - The safer, easier way to pay online">
                <img alt="" width="1" height="1"
                src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                </form>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
<?php
Session::forget('grand_total');
Session::forget('order_id');
?>