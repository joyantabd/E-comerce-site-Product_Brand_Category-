@extends('admin.layouts.master')

@section('title','Product Info')

@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.partials.msg')
                    <a href="{{route('product.create')}}" class="btn btn-info">Add New PRODUCT</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">PRODUCT Info Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Set</th>
                                    <th>PRODUCT VARIENT</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key=>$product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>{{ $product->color }}</td>
                                            <td>{{ $product->size }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->craft }}</td>
                                            <td>{{ $product->set }}</td>
                                            <td><a href="{{ route('product.edit',$product->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a></td>
                                            <td>


                                                <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $product->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>PRODUCT VARIENT</th>
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
