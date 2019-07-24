@extends('admin.layouts.master')

@section('title','Category Info')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.partials.msg')

                    <a href="#addcategoryModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                        <i class="fa fa-plus"></i> Add Category Info
                    </a>
                    <div class="clearfix"></div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{!! route('category.store') !!}"  method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Parent Category (optional)</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="">Please select a Parent category</option>
                                                @foreach ($main_categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="image">Category Image (optional)</label>

                                        </div>
                                        <input type="file" class="form-control" name="image" id="image" >



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
                            <h4 class="card-title ">CATEGORY Info Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Parent Category ID</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key=>$category)
                                        <tr>
                                            <td>CAT-{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td><img src="{{ asset('uploads/category/'.$category->image) }}" class="img rounded-circle" style="width:100px"></td>
                                            <td>
                                                @if ($category->parent_id == NULL)
                                                    Primary Category
                                                @else
                                                   CAT-{{ $category->parent_id }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $category->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th>ID</th>
                                    <th>category Name</th>
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
