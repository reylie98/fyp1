@extends('layouts.cslayout.csdesign')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="current">Add Ticket</a> </div>
    <h1>Add Ticket</h1>
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
            <h5>Add Ticket</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="" name="editicket" id="editticket">{{ csrf_field() }}
            <div class="widget-content nopadding">
              <div class="control-group">
                <label class="control-label">Title</label>
                <div class="controls">
                  <input type="text" value="{{$ticketdetail->title}}" name="tickettitle" id="ticketitle" readonly>
                </div>
              </div>
              <label class="control-label">User ID</label>
                <div class="controls">
                  <input type="number" name="userid" id="userid" required min="0" value="{{$ticketdetail->user_id}}" readonly>
                </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" readonly>{{$ticketdetail->title}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Comment</label>
                <div class="controls">
                  <textarea name="Comment" id="Comment" required>{{$ticketdetail->comment}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <select name="statustype" id="statustype" style="width: 220px" required>
                    <option @if($ticketdetail->status == 0) selected @endif value = "0">Processing</option>
                    <option @if($ticketdetail->status == 1) selected @endif value = "1">Done</option>
                  </select>
                </div>
              <div class="form-actions">
                <input type="submit" value="Update Ticket" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
  </div>
</div>
@endsection