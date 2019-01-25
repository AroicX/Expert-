@extends('/users/layout.auth')

@section('title')
	<title>Register</title>
@endsection


@section('content')
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 login col-lg-offset-1">
				<div class="card-heading">
					<p> EXPERT Resigter 	<a href="{{url('/users/login')}}"><button class="btn btn-default">Login</button></a></p>
				</div>
			<div class="card">
			
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					</div>
						@endforeach
					@endif

					 @if(session('info'))
			    <div class='alert alert-danger'>
			      <button class='close' data-dismiss='alert'>&times;</button>
			        <strong>Sorry! </strong> {{session('info')}}
			    </div>
			      
			    @endif
			    
		<form action="{{ route('signup')}}" method="post">
				{{csrf_field()}}
				<h3 class="text-center"> Resigter:</h3>
				<div class="form-group">
					<label>Firstname:</label>
					<input class="form-control" type="text" name="firstname" placeholder="*Firstname" required>
				</div>
				<div class="form-group">
					<label>Lastname:</label>
					<input class="form-control" type="text" name="lastname" placeholder="*Lastname" required>
				</div>
				<div class="form-group">
					<label>Username </label>
					<input class="form-control" type="text" name="username" placeholder="*Username " required>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="email" name="email" placeholder="*Email" required>
				</div>
				{{csrf_field()}}
				<div class="form-group">
					<label>Password:</label>
					<input class="form-control" type="password" name="password" placeholder="*Password" required>
				</div>

				<div class="form-group">
							<button class="btn btn-info btn-block">Sumbit</button>
						</div>
			</form>
		
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>



	<style type="text/css">
	/* --- Google Fonts --- */
	@import url("http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Montserrat:400,700");

		body{
			overflow-x: hidden !important;
		}

		.login{
			margin: 20px 20px 0px 20px !important;
			padding: 20px 10px 10px 10px;
		}


			.card{
		
		/*border-bottom-left-radius: 10px !important;
		border-bottom-right-radius: 10px !important;*/
		border-radius:0px !important;
		border-color: 1px solid #000;
		padding: 20px 10px 10px 10px;
	}

	.card-heading{
		width: 100% !important;
		margin-bottom: -15px !important;
		padding: 10px 0px 5px 5px;
		background: black;
		color: #fff;
	}
	.card-heading > p{
		color: #fff;
		position: relative;
		font-weight: bold;
		font-size: 16px;
		line-height: 30px;
		text-align: center;
	}

		label{
			margin-top: 10px;
			margin-left: 20px;
			color: #404040;
			font-size: 15px !important;
		}

		.form-control{
			margin: 0px 0px 20px 0px;
			width: 90%;
			position: relative;
			left: 20px;
			font-size: 15px !important;
			transition: all 0.5s ease-in;
			border-radius: 0px !important;
			border: 0px !important;
			border-bottom: 1px solid #999 !important;

		}

		.form-control:focus, .form-control:hover{
			
			transition: all 0.5s ease-in;
		}

	</style>

	@endsection

	@section('script')
	  <script type="text/javascript" src="/js/jquery.backstretch.min.js"></script>
	    <script>
	        $.backstretch("/images/login.jpg", {speed: 500});
	    </script>

	@endsection

