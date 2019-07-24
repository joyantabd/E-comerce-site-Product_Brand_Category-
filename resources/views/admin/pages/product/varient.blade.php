@extends('admin.layouts.varient')


@section('title','')


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
                            <h4 class="card-title ">PRODUCT VARIENT</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="panel panel-header">

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="department">Category<small class="text-danger"></small></label>
                                                <select class="form-control" name="category_id">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="brand">Brand<small class="text-danger"></small></label>
                                                <select class="form-control" name="brand_id">
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div></div>

            <div class="panel panel-footer" >
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Set</th>
                        <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="color[]" class="form-control color"></td>
                        <td><input type="text" name="size[]" class="form-control size"></td>
                        <td><input type="number" name="price[]" class="form-control price"></td>
                        <td><input type="text" name="craft[]" class="form-control craft"></td>
                        <td><input type="text" name="set[]" class="form-control set"></td>
                        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
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

    <script type="text/javascript">
        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow()
        {
            var tr='<tr>'+
                '<td><input type="text" name="color[]" class="form-control color"></td>'+
                '<td><input type="text" name="size[]" class="form-control size"></td>'+
                '<td><input type="number" name="price[]" class="form-control price"></td>'+
                '<td><input type="text" name="craft[]" class="form-control craft"></td>'+
                '<td><input type="text" name="set[]" class="form-control set"></td>'+
                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                '</tr>';
            $('tbody').append(tr);
        };
        $('.remove').live('click',function(){
            var last=$('tbody tr').length;
            if(last==1){
                alert("you can not remove last row");
            }
            else{
                $(this).parent().parent().remove();
            }

        });
    </script>




@endpush
