@extends('layouts.adminlayout.admindesign')
@section('content')

<div id="content">
<div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Ticket</a> </div>
    <h1>Tickets</h1>
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
            <h5>View Tickets</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Ticket ID</th>
                  <th>User ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Created Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tickets as $ticket)
                <tr class="gradeX">
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->user_id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->comment }}</td>
                    <td>
                    @if($ticket->status==1) Done @else On Process @endif
                    </td>
                    <td>{{ $ticket->created_at }}</td>
                    <td class="center">
                        <a href="" class="btn btn-primary btn-mini" style="margin-left:30%;">Edit</a>
                    </td>
                </tr>   

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