@extends('layouts.frontlayout.frontdesign')
@section('content')
<section id="form" style="margin-top:0px"><!--form-->
		<div class="container">
			<div class="row">
            @if(Session::has('flash_message_error')) 
					<div class="alert alert-danger alert-block">
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
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Update account</h2>
					</div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>Update Password</h2>
						<form id="passwordform" name="passwordform" method="post" action="{{url('/updatepswd')}}">{{csrf_field()}}
							<input type="text" name="currentpwd" id="currentpwd" placeholder="Current Password">
							<span id="chkPwd"></span>
							<input type="text" name="newpwd" id="newpwd" placeholder="New Password">
							<input type="text" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password">
							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
	
@endsection