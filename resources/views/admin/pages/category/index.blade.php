@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ trans('message.category') }}</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="m-0 font-weight-bold text-primary">{{ trans('message.category') }}/ {{ trans('message.list') }}</h6>
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

                @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('message.category_name') }}</th>
                                <th>{{ trans('message.parent_category') }}</th>
                                <th>{{ trans('message.created_at') }}</th>
                                <th>{{ trans('message.updated_at') }}</th>
                                <th colspan="2" class="align">{{ trans('message.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @foreach ($parent_id as $key => $value)
                                        @if ($value->id == $category->parent_id)
                                            {{ $value->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($category->created_at))->diffForHumans();
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo \Carbon\Carbon::createFromTimeStamp(strtotime($category->updated_at))->diffForHumans();
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-pencil" aria-hidden="true"> {{ trans('message.edit') }}</i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                        <div class="col-md-4 offset-md-4">{{ $categories->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
