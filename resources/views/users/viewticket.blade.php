@extends('layouts.frontlayout.frontdesign')
@section('content')
    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Orders</li>
				</ol>
			</div>
		</div>
    </section> <!--/#cart_items-->
    
    <section id="do_action">
		<div class="container">
			<div class="heading" align="center">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Ticket Id</th>
                <th>Ticket Title</th>
                <th>Ticket Description</th>
                <th>Ticket Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userticket as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                {{$user->title}}
                </td>
                <td>{{$user->description}}</td>
                <td>@if($user->status==1) Done @else On Process @endif</td>  
            </tr>
            @endforeach
        </tbody>
    </table>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection