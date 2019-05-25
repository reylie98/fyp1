@extends('layouts.frontlayout.frontdesign')
@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('layouts.frontlayout.frontsidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img class="mainImage" src="{{ asset('images/Backendimages/products/medium/'.$productDetails->image)}}" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
											@foreach($productImages as $img)
												<img class="changeImage"  style="width:80px; cursor:pointer;" src="{{asset('images/Backendimages/products/small/'.$img->image)}}" alt="">
											@endforeach
										</div>	
									</div>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$productDetails -> product_name}}</h2>
								<p>Code: {{$productDetails -> product_code}}</p>
								<p>
									<select id = "sellsize" name="size" style="width:150px;">
											<option value="">Select Size </option>
											@foreach($productDetails->attributes as $sizes)
											<option value="{{$productDetails->id}}-{{$sizes->size}}">{{$sizes->size}}</option>
											@endforeach
									</select>
								</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span id="getPrice">RM {{$productDetails -> price}}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									@if($totalstock>0)
										<button type="button" class="btn btn-fefault cart" id="cartButton">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									@endif
								</span>
								<p><b>Availability:</b><span id="Ava">@if($totalstock>0) In Stock @else Out of stock @endif</p>
								<p><b>Condition:</b> New</p></span>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class ="active"><a href="#description" data-toggle="tab">Description</a></li>
								<li><a href="#delivery" data-toggle="tab">Delivery Option</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="description" >
								<div class="col-sm-12">
									<p>{{$productDetails -> description}}</p>
								</div>				
							</div>
							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
										<p></p>
								</div>	
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count=1; ?>
								@foreach($relatedProducts->chunk(3) as $chunk) 
								<div <?php if($count==1){ ?> class="item active" <?php } else { ?> class="item" <?php } ?>>	
											@foreach($chunk as $item)	
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img style="200px;"src="{{ asset('images/Backendimages/products/small/'.$item->image)}}" alt="" />
															<h2>MYR {{$item->price}}</h2>
															<p>{{$item->product_name}}</p>
															<a href="{{url('product/'.$item->id)}}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
								<?php $count++; ?>
								@endforeach
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
@endsection