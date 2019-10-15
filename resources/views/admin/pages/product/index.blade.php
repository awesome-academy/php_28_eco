@extends('admin.layouts.master')
@section('content')
	<div class="container-fluid">
	    <!-- Page Heading -->
	    <h1 class="h3 mb-2 text-gray-800">{{ trans('message.product') }}</h1>
	    <!-- DataTales Example -->
	    <div class="card shadow mb-4">
	        <div class="card-header py-3">
	        	<div class="row">
	        		<div class="col-md-5">
	        			<h6 class="m-0 font-weight-bold text-primary">{{ trans('message.product') }}/ {{ trans('message.list') }}</h6>
	        		</div>
	        		<div class="col-md-7">
	        			<form>
	        				<div class="input-group">
					            <input type="text" class="form-control bg-light small" placeholder="{{ trans('message.search') }}..." name="search" value="{{ \Request::get('search') }}">
					            <div class="input-group-append">
					                <button class="btn btn-primary" type="submit">
					                    <i class="fas fa-search fa-sm"></i>
					                </button>
					            </div>
					        </div>
	        			</form>
	        		</div>
	        	</div>
	        </div>
	        <div class="card-header py-3">
	        	@if (Session::has('flash_message'))
	        		<div class="alert alert-{{ Session::get('type_message') }}">
	        			{{ Session::get('flash_message') }}
	        		</div>
	        	@endif
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>{{ trans('message.product_name') }}</th>
	                            <th>{{ trans('message.status') }}</th>
	                            <th>{{ trans('message.price') }}</th>
	                            <th>{{ trans('message.image') }}</th>
	                            <th>{{ trans('message.category_name') }}</th>
	                            <th>{{ trans('message.parent_category') }}</th>
	                            <th colspan="2" class="align">{{ trans('message.action') }}</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($products as $key => $product)
	                        <tr>
	                            <td>{{ $key+1 }}</td>
	                            <td>{{ $product->name }}</td>
	                            <td>{{ $product->status }}</td>
	                            <td>{{ number_format($product->price) }} VND</td>
	                            <td><img src="upload/{{ $product->image }}" alt="" height="100" width="100"></td>
	                            <td>
	                            	@foreach ($category_id as $cb)
	                            		@if ($cb->id == $product->category_id)
	                            			{{ $cb->name }}
	                            		@endif
	                            	@endforeach
	                            </td>
	                            <td>
	                            	@foreach ($cate_parent as $cp)
	                            		@if ($cp->id == $product->cate_parent)
	                            			{{ $cp->name }}
	                            		@endif
	                            	@endforeach
	                            </td>
	                            <td>
	                            	<a href="{{ route('product-edit', $product->id) }}">
	                            		<button class="btn btn-primary">
	                            			<i class="fa fa-pencil" aria-hidden="true"> {{ trans('message.edit') }}</i>
	                            		</button>
	                            	</a>
	                            </td>
	                            <td>
	                            	<form action="{{ route('product-delete', $product->id) }}" method="POST">
	                            		@csrf
	                            		@method('delete')
	                            		<button type="submit" class="btn btn-danger" onclick="return accessDelete('{{ trans('message.access_delete') }}')">
	                            			<i class="fa fa-trash"> {{ trans('message.delete') }}</i>
	                            		</button>
	                            	</form>
	                            </td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	                <div class="row">
	                	<div class="col-md-4 offset-md-4">{{ $products->links() }}</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection