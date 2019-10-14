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
	            		<form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data" name="formEditProduct">
	            			@csrf
	            			<div class="form-group">
	            				<label for="cate_parent">{{ trans('message.parent_category') }} *</label>
	            				<select name="cate_parent" class="form-control" id="cate_parent">
	            					<option value="0">{{ trans('message.chooce') }}</option>
	            					@foreach($cate_parent as $value)
	            					<option {{ $product->cate_parent == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
	            					@endforeach
	            				</select>
	            			</div>
	            			<div class="form-group">
	            				<label for="category_id">{{ trans('message.category_name') }} *</label>
	            				<select name="category_id" class="form-control" id="category_id">
	            					<option value="0">{{ trans('message.chooce') }}</option>
	            					@foreach($category_id as $value)
	            					<option {{ $product->category_id == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
	            					@endforeach
	            				</select>
	            				@if ($errors->has('name'))
	            					<p class="danger">{{ $errors->first('name') }}</p>
	            				@endif
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.product_name') }} *</label>
	            				<input type="text" name="name" class="form-control" placeholder="{{ trans('message.enter_product') }}" value="{{ $product->name }}">
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.status') }} *</label>
	            				<input type="text" name="status" class="form-control" placeholder="{{ trans('message.enter_status') }}" value="{{ $product->status }}">
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.price') }} *</label>
	            				<input type="text" name="price" class="form-control" placeholder="{{ trans('message.enter_price') }}" value="{{ $product->price }}"> 
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.description') }}</label>
	            				<textarea name="description" class="form-control" placeholder="{{ trans('message.enter_description') }}" value="{{ $product->description }}"></textarea>
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.image') }} *</label><br>
	            				<img name="image_current" src="upload/{{ $product->image }}" class="img_margin" alt="" width="150" height="200">
	            				<input type="file" id="file" name="image" class="form-control" style="display: none"><br>
	            				<input type="button" id="upload_file" value="{{ trans('message.choose_image') }}" class="form-control btn-info">
	            				<input type="hidden" name="img_current" value="{{ $product->image }}">
	            			</div>
	            			<div class="form-group">
	            				<label for="">{{ trans('message.image_detail') }}</label><br>
	            				@foreach ($img_detail as $key => $value)
	            				<div id="{{ $key }}" class="img_margin">
	            					<img name="img_detail" src="upload/detail/{{ $value->name }}" alt="" width="150" height="200" idHinh="{{ $value->id }}" id="{{ $key }}">
	            					<a href="javascript:void(0)" id="del_img" class="btn btn-danger btn-circle icon-del"><i class="fa fa-times"></i></a>
	            				</div>
	            				@endforeach
	            				<input type="file" name="image_detail[]" class="form-control" multiple id="file_detail" style="display: none"><br>
	            				<input type="button" id="upload_file_detail" value="{{ trans('message.choose_image') }}" class="form-control btn-info">
	            			</div>

	            			<button type="submit" class="btn btn-primary">{{ trans('message.update') }}</button>
	            		</form>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
