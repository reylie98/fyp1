@extends('layouts.frontlayout.frontdesign')
@section('content')
<div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Order Review</li>
                </ol>
            </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1">
                            <div class="login-form"><!--login form-->
                                <h2>Billing Address</h2>
                                    <div class="form-group">
                                    {{$billingdetails->name}}     
                                    </div>
                                    <div class="form-group">
                                    {{$billingdetails->address}}  
                                    </div>
                                    <div class="form-group">
                                        {{$billingdetails->city}}  
                                    </div>
                                    <div class="form-group">
                                        {{$billingdetails->state}} 
                                    </div>
                                    <div class="form-group">
                                        {{$billingdetails->country}} 
                                    </div>
                                    <div class="form-group">
                                        {{$billingdetails->postcode}} 
                                    </div>
                                    <div class="form-group">
                                        {{$billingdetails->mobile}}
                                    </div>
                            </div><!--/login form-->
                        </div>
                        <div class="col-sm-1">
                            <h2></h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="signup-form"><!--sign up form-->
                                <h2>Ship To</h2>
                                    <div class="form-group">
                                        {{$shippingdetails->name}}
                                    </div>
                                    <div class="form-group">
                                        {{$shippingdetails->address}}
                                    </div>
                                    <div class="form-group">
                                        {{$shippingdetails->city}}
                                    </div>
                                    <div class="form-group">
                                        {{$shippingdetails->state}}
                                    </div>
                                    <div class="form-group">
                                        {{$shippingdetails->postcode}}
                                    </div>
                                    <div class="form-group">
                                        {{$shippingdetails->mobile}}
                                    </div>
                            </div><!--/sign up form-->
                        </div>
                    </div>
</div>
<section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">			
				</div>
            </div>
            
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
                        <?php $totalamount = 0; ?>
                        @foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:150px;" src="{{asset('images/Backendimages/products/medium/'.$cart->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product_name}}</a></h4>
								<p>Product Code :{{$cart->product_code}} | Size :{{$cart->size}}</p>
								<p>Product Color :{{$cart->product_color}}</p>
							</td>
							<td class="cart_price">
								<p>MYR {{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                <p>{{$cart->quantity}}</p>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">MYR {{$cart->price*$cart->quantity}}</p>
							</td>
                        </tr>
                        @endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

@endsection