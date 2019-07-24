@extends('admin.layouts.master')

@section('title','Brand')

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
                            <h4 class="card-title ">Edit Brand Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Brand Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Description</label>
                                                <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="oldimage">Brand Old Image</label> <br>

                                        <img src="{!! asset('uploads/brand/'.$brand->image) !!}" width="100"> <br>

                                        <label for="image">Brand New  Image (optional)</label>
                                    </div>
                                    <input type="file" class="form-control" name="image" id="image" >





                                    <a href="{{ route('brand.index') }}" class="btn btn-danger">Back</a>
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