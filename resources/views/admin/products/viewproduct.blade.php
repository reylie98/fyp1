@extends('layouts.adminlayout.admindesign')
@section('content')

<div id="content">
<div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>
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
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Color</th>
                  <th>Price</th>
                  <th>image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr class="gradeX">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->categoryname }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->product_color }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                    @if(!empty($product->image))
                        <img src="{{asset('/images/Backendimages/products/small/'.$product->image)}}" style="width:50px;"> </td>
                    @endif
                      <td class="centre"><a href="{{url('/admin/editproduct/'.$product->id) }}" class="btn btn-primary btn-mini">Edit</a> <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> <a id="deleteProduct" href="{{url('/admin/deleteproduct/'.$product->id)}}" class="btn btn-danger btn-mini">Delete</a>
                      <a href="{{url('/admin/addatributes/'.$product->id) }}" class="btn btn-success btn-mini">Add</a>
                    </td>
                </tr>   
                            <div id="myModal{{ $product->id }}" class="modal hide">
                              <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3>{{ $product->product_name }} Details</h3>
                              </div>
                              <div class="modal-body">
                                <p>Product ID: <strong>{{ $product->id }} </strong> </p>
                                <p>Product CODE: <strong>{{ $product->product_code }}</strong> </p>
                                <p>Product COLOR: <strong>{{ $product->product_color }}</strong> </p>
                                <p>Product PRICE: <strong>{{ $product->price }}</strong> </p>
                                <p>Product DESCRIPTION: <strong>{{ $product->description }} </strong> </p>
                              </div>
                            </div>
                          </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection