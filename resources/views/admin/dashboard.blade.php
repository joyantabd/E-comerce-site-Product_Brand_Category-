@extends('admin.layouts.master')


@section('title','')


@push('css')

@endpush


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">shopping_cart</i>
                            </div>
                            <p class="card-category">Total Products</p>
                            <h3 class="card-title">{{ $productCount }}
                                <small>Pcs</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <p class="card-category">Total Brand</p>
                            <h3 class="card-title">{{ $brandCount }}
                                <small>Total</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">games</i>
                            </div>
                            <p class="card-category">Total Category</p>
                            <h3 class="card-title">{{ $categoryCount }}
                                <small>Total</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">update</i> Just Updated
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
