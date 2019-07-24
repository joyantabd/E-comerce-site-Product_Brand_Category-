@extends('admin.layouts.master')

@section('title','Create')

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
                            <h4 class="card-title ">Add New PRODUCT</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                    @csrf


                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product name">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="department">Category<small class="text-danger">(required)</small></label>
                            <select class="form-control" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="brand">Brand<small class="text-danger">(required)</small></label>
                            <select class="form-control" name="brand_id" required>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('scripts')

    <script>
        $(document).ready(function(){
            $('#color').multiselect({
                nonSelectedText: 'Select color',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth:'400px'
            });

            $('#color_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        $('#color option:selected').each(function(){
                            $(this).prop('selected', false);
                        });
                        $('#color').multiselect('refresh');
                        alert(data);
                    }
                });
            });


        });
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

@endpush