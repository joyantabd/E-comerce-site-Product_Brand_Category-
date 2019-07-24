@extends('admin.layouts.master')

@section('title','Product')

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
                            <h4 class="card-title ">Edit Product Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Product Name</label>
                                                <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="department">Category<small class="text-danger"></small></label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="brand">Brand<small class="text-danger"></small></label>
                                        <select class="form-control" name="brand_id">
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="color">Color<small class="text-danger"></small></label><br>
                                        <select id="color" name="color"  class="form-control" >
                                            <option value="Red">Red</option>
                                            <option value="Green">Green</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Black">Black</option>
                                            <option value="White">White</option>
                                            <option value="Orange">Orange</option>
                                        </select>
                                    </div><br>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Size</label>
                                        <input type="text" class="form-control" name="size" id="size" value="{{ $product->size }}">
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Quantity</label>
                                                <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Price</label>
                                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Description</label>
                                                <textarea name="craft" rows="8" cols="80" class="form-control">{{ $product->craft }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>



                                    <div class="form-group">
                                        <label for="oldimage">Product Old Image</label> <br>

                                        <img src="{!! asset('uploads/product/'.$product->image) !!}" width="100"> <br>

                                        <label for="image">Product New  Image (optional)</label>

                                    </div>
                                    <input type="file" class="form-control" name="image" id="image" >


                                    <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
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
    //Color Script
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

    //Size Script
    <script>
        $(document).ready(function(){
            $('#size').multiselect({
                nonSelectedText: 'Select Size',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth:'400px'
            });

            $('#size_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {
                        $('#size option:selected').each(function(){
                            $(this).prop('selected', false);
                        });
                        $('#size').multiselect('refresh');
                        alert(data);
                    }
                });
            });


        });
    </script>

@endpush