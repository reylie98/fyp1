@extends('layouts.adminlayout.admindesign')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products Attribute</a> <a href="#" class="current">Validation</a> </div>
    <h1>Add Products Attributes</h1>
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
            <h5>Add Products Attribute</h5>
          </div>
          <div class="widget-content nopadding">
          <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/addatributes/'.$productDetails->id)}}" name="add_atribute" id="add_atribute">{{ csrf_field() }}
            <div class="widget-content nopadding">
              <input type="hidden" name="product_id" value="{{$productDetails->id}}">
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label"><strong>{{$productDetails->product_name}}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><strong>{{$productDetails->product_code}}</strong></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Color</label>
                <label class="control-label"><strong>{{$productDetails->product_code}}</strong></label>
              </div><br>
              <div class="control-group">
                <label class="control-label"style="width:95px;"></label>
                <div class="field_wrapper">
                        <input required type="text" name="sku[]" placeholder="SKU" style="width:120px;"/>
                        <input required type="text" name="size[]" placeholder="Size" style="width:120px;"/>
                        <input required type="text" name="price[]" placeholder="Price" style="width:120px;"/>
                        <input required type="text" name="stock[]" placeholder="Stock" style="width:120px;"/>
                        <a href="javascript:void(0)" class="add_button" title="add field">Add</a>

                </div>
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>    
        </div>
  </div>
  <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{url('admin/editatributes/'.$productDetails->id)}}" method="post">{{ csrf_field() }}
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($productDetails->attributes as $attribute)
                  <tr class="gradeX">
                      <td><input type="hidden" name="AttrId[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                      <td>{{ $attribute->sku }}</td>
                      <td>{{ $attribute->size }}</td>
                      <td><input type="text" name="AttrPrice[]" value="{{ $attribute->price }}"></td>
                      <td><input type="text" name="AttrStock[]" value="{{ $attribute->stock }}"></td>
                        <td class="center">
                        <input type="submit" value="Update" class="btn btn-primary btn-mini"> 
                        <a id="deleteatt" href="{{url('/admin/deleteatribute/'.$attribute->id) }}" class="btn btn-danger btn-mini">Delete</a>
                      </td>
                  </tr>   
                  @endforeach
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection