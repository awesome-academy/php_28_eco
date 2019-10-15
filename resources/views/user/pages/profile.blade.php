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
					{{ trans('message.profile') }}
				</span>
			</div>
		</div>
		<section class="bg0 p-t-104 p-b-116">
			<div class="container">
				<div class="flex-w flex-tr">
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<form action="{{ route('update-profile', Auth::user()->id ) }}" method="POST">
							@csrf
							<h4 class="mtext-105 cl2 txt-center p-b-30">
								{{ strtoupper(trans('message.profile')) }}
							</h4>

							<div class="form-group">
								<label for="">{{ trans('message.name') }} *</label>
								<input type="text" name="name" class="form-control" value="{{ Auth::check() ? Auth::user()->name : null }}">
								@if ($errors->has('name'))
									<p class="danger">{{ $errors->first('name') }}</p>
								@endif
							</div>
							
							<div class="form-group">
								<label for="">{{ trans('message.email') }} *</label>
								<input type="email" name="email" class="form-control" value="{{ Auth::check() ? Auth::user()->email : null }}">
								@if ($errors->has('email'))
									<p class="danger">{{ $errors->first('email') }}</p>
								@endif
							</div>

							<div class="form-group">
								<label for="">{{ trans('message.telephone') }} *</label>
								<input type="text" name="tel" class="form-control" value="{{ Auth::check() ? Auth::user()->tel : null }}">
								@if ($errors->has('telephone'))
									<p class="danger">{{ $errors->first('telephone') }}</p>
								@endif
							</div>

							<div class="form-group">
								<label for="">{{ trans('message.address') }} *</label>
								<input type="text" name="address" class="form-control" value="{{ Auth::check() ? Auth::user()->address : null }}">
								@if ($errors->has('address'))
									<p class="danger">{{ $errors->first('address') }}</p>
								@endif
							</div>

							<div class="form-group">
								<label for="">{{ trans('message.gender') }}</label>
								<div class="form-check form-check-inline">
									<input type="radio" name="gender" class="form-check-input margin-left" value="1" {{ Auth::user()->gender == 1 ? 'checked' : '' }}>
									<label for="" class="form-check-label">{{ trans('message.male') }}</label>
								</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="gender" class="form-check-input margin-left" value="2" {{ Auth::user()->gender == 2 ? 'checked' : '' }}>
									<label for="" class="form-check-label">{{ trans('message.female') }}</label>
								</div>
							</div>
							<input type="hidden" name="role_id" value="3">
							<a href="">Thay đổi mật khẩu</a>

							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer margin-top">
								{{ trans('message.update') }}
							</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
