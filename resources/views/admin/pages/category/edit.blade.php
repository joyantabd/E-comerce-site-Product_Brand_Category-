@extends('admin.layouts.master')

@section('title','Category')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.partials.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit CATEGORY Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $category->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description (optional)</label>
                                        <textarea name="description" rows="8" cols="80" class="form-control"> {!! $category->description !!}</textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Parent Category (optional)</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="">Please select a Primary category</option>
                                            @foreach ($main_categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="oldimage">Category Old Image</label> <br>

                                        <img src="{!! asset('uploads/category/'.$category->image) !!}" width="100"> <br>

                                        <label for="image">Category New  Image (optional)</label>
                                    </div>
                                    <input type="file" class="form-control" name="image" id="image" >



                                    <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

@endpush