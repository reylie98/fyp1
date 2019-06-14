@extends('layouts.frontlayout.frontdesign')
@section('content')
<section id="form" style="margin-top:0px"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
                        <h2>Bill to</h2>
                            <div class="form-group">
                                <input type="text" id="billingname" name="billingname" placeholder="Billing Name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="billingaddress" name="billingaddress" placeholder="Billing Address" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="billingcity" name="billingcity" placeholder="Billing City" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="billingstate" name="billingstate" placeholder="Billing State" class="form-control" />
                            </div>
                            <div class="form-group">
                                <select id="billingcountry" name="billingcountry" placeholder="Billing Country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" id="billingcode" name="billingcode" placeholder="Billing Postcode" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="billingnumber" name="billingnumber" placeholder="Billing Mobile Number" class="form-control"/>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="billship">
                                <label class="form-check-label" for="billship">Shipping Address same as Billing Address</label>
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
                                <input type="text" id="shippingname" name="shippingname" placeholder="Shipping Name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="shippingaddress" name="shippingaddress" placeholder="Shipping Address" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="shippingcity" name="shippingcity" placeholder="Shipping City" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="shippingstate" name="shippingstate" placeholder="Shipping State" class="form-control" />
                            </div>
                            <div class="form-group">
                                <select id="shippingcountry" name="shippingcountry" placeholder="Shiping Country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" id="shippingcode" name="shippingcode" placeholder="Shipping Postcode" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="text" id="shippingnumber" name="shippingnumber" placeholder="Shipping Mobile Number" class="form-control"/>
                            </div>
							<button type="submit" class="btn btn-warning">Checkout</button>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection