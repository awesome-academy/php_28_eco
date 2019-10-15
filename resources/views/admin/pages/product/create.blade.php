@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
	    <h1 class="h3 mb-2 text-gray-800">{{ trans('message.product') }}</h1>
	    <div class="card shadow mb-4">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">{{ trans('message.product') }}/{{ trans('message.add') }}</h6>
	        </div>
	        <div class="card-body">
	            <div class="row">
	            	<div class="col-md-6">
	            		<form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data">
	            			@csrf
	            			<div class="form-group">
	            				<label for="cate_parent">{{ trans('message.parent_category') }} *</label>
	            				<select name="cate_parent" class="form-control" id="cate_parent">
	            					<option value="">{{ trans('message.chooce') }}</option>
	            					@foreach($cate_parent as $value)
	            					<option {{ old('cate_parent') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
	            					@endforeach
	            				</select>
	            				@if ($errors->has('cate_parent'))
	            					<p class="danger">{{ $errors->first('cate_parent') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="category_id">{{ trans('message.category_name') }} *</label>
	            				<select name="category_id" class="form-control" id="category_id">
	            					<option value="">{{ trans('message.chooce') }}</option>
	            					@foreach($category_id as $value)
	            					<option {{ old('category_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
	            					@endforeach
	            				</select>
	            				@if ($errors->has('category_id'))
	            					<p class="danger">{{ $errors->first('category_id') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.product_name') }} *</label>
	            				<input type="text" name="name" class="form-control" placeholder="{{ trans('message.enter_product') }}" value="{{ old('name') }}">
	            				@if ($errors->has('name'))
	            					<p class="danger">{{ $errors->first('name') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.status') }} *</label>
	            				<input type="text" name="status" class="form-control" placeholder="{{ trans('message.enter_status') }}" value="{{ old('status') }}">
	            				@if ($errors->has('status'))
	            					<p class="danger">{{ $errors->first('status') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.price') }} *</label>
	            				<input type="text" name="price" class="form-control" placeholder="{{ trans('message.enter_price') }}" value="{{ old('price') }}">
	            				@if ($errors->has('price'))
	            					<p class="danger">{{ $errors->first('price') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.description') }}</label>
	            				<textarea name="description" class="form-control" placeholder="{{ trans('message.enter_description') }}" value="{{ old('description') }}"></textarea>
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.image') }} *</label>
	            				<input type="file" name="image" id="file" class="form-control" style="display: none;"><br>
	            				<input type="button" id="upload_file" value="{{ trans('message.choose_image') }}" class="form-control">
	            				@if ($errors->has('image'))
	            					<p class="danger">{{ $errors->first('image') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.image_detail') }}</label>
	            				<input type="file" name="image_detail[]" id="file_detail" class="form-control" multiple style="display: none"><br>
	            				<input type="button" id="upload_file_detail" value="{{ trans('message.choose_image') }}" class="form-control">
	            			</div>

	            			<button type="submit" class="btn btn-primary">{{ trans('message.add') }}</button>
	            		</form>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
