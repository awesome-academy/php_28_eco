@extends('user.layouts.master')
@section('content')
	<div class="container-wrap" style="margin-top: 50px">
		<div class="container-wrap">
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
					{{ trans('message.home') }}
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					{{ trans('message.login') }}
				</span>
			</div>
		</div>
    	@if (Session::has('flash_message'))
    		<div class="alert alert-{{ Session::get('type_message') }}">
    			{{ Session::get('flash_message') }}
    		</div>
    	@endif
		<section class="bg0 p-t-104 p-b-116">
			<div class="container">
				<div class="flex-w flex-tr">
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<form action="{{ route('post-login') }}" method="POST">
							@csrf
							<h4 class="mtext-105 cl2 txt-center p-b-30">
								{{ strtoupper(trans('message.home')) }}
							</h4>
							
							<div class="form-group">
								<label for="">{{ trans('message.email') }} *</label>
								<input type="email" name="email" class="form-control">
								@if ($errors->has('email'))
									<p class="danger">{{ $errors->first('email') }}</p>
								@endif
							</div>

							<div class="form-group">
								<label for="">{{ trans('message.password') }} *</label>
								<input type="password" name="password" class="form-control">
								@if ($errors->has('password'))
									<p class="danger">{{ $errors->first('password') }}</p>
								@endif
							</div>

							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer margin-top">
								{{ trans('message.login') }}
							</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
