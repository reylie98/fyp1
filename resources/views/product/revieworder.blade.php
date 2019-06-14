@extends('layouts.frontlayout.frontdesign')
@section('content')
<section id="form" style="margin-top:0px"><!--form-->
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
	</section><!--/form-->

@endsection