<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="" class="simple-text logo-normal">
            Humaclab-junior-dev
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a class="nav-link" href="dashboard">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request::is('admin/brand*')? 'active': ''}}">
                <a class="nav-link" href="{{route('brand.index')}}">
                    <i class="material-icons">verified_user</i>
                    <p>Manage Brand</p>
                </a>
            </li>
            <li class="{{Request::is('admin/category*')? 'active': ''}}">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">games</i>
                    <p>Manage Category</p>
                </a>
            </li>

            <li class="{{Request::is('admin/product*')? 'active': ''}}">
                <a class="nav-link" href="{{route('product.index')}}">
                    <i class="material-icons">shopping_cart</i>
                    <p>Manage Product</p>
                </a>
            </li>



















        </ul>
    </div>
</div>