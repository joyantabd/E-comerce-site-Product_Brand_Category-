@extends('admin.layouts.master')

@section('title','Brand Info')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.partials.msg')

                    <a href="#addbrandModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                        <i class="fa fa-plus"></i> Add Brand Info
                    </a>
                    <div class="clearfix"></div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addbrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{!! route('brand.store') !!}"  method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Brand Name<small class="text-danger">(required)</small></label>
                                            <input type="text" class="form-control" name="name" id="name" required>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label for="description">Description<small class="text-danger">(required)</small></label>
                                            <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                                        </div>
                                        <br>


                                        <div class="form-group">
                                            <label for="image">Brand Image (optional)</label>

                                        </div>
                                        <input type="file" class="form-control" name="image" id="image" >
                                        <br>



                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">BRAND Info Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $key=>$brand)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $brand->name }}</td>
                                            <td><img src="{{ asset('uploads/brand/'.$brand->image) }}" class="img rounded-circle" style="width:100px"></td>
                                            <td>{{ $brand->description }}</td>
                                            <td>
                                                <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy',$brand->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $brand->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        @endsection

        @push('scripts')
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                } );
            </script>
        @endpush
