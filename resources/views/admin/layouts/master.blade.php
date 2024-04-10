<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin/css/theme.css')}}" rel="stylesheet" media="all">

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('admin/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        {{-- <li class="active has-sub">
                            <a class="js-arrow" href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Home Page
                            </a>
                        </li>
                        <li>
                            <a href="category.html">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li> --}}
                        <li>
                            <a href="{{route('category#list')}}">
                                <i class="fa-solid fa-list"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{route('product#list')}}">
                                <i class="fa-solid fa-cookie"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{route('admin#orderList')}}">
                                <i class="fa-solid fa-list-check"></i>Order List</a>
                        </li>
                        <li>
                            <a href="{{route('admin#userList')}}">
                                <i class="fa-solid fa-users"></i>User List</a>
                        </li>
                        <li>
                            <a href="{{route('admin#contactPage')}}">
                                <i class="fa-solid fa-envelope"></i>Contact Messages</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <span class="form-header">
                            <h3>Admin Dashboard Panel</h3>
                        </span>
                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    @if (Auth::user()->image==null)
                                        @if (Auth::user()->gender== 'female')
                                            <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail">
                                        @else
                                            <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                        @endif
                                    @else
                                    <img src="{{asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                    @endif
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                @if (Auth::user()->image==null)
                                                    @if (Auth::user()->gender == 'female')
                                                <img src="{{asset('image/girl_default_user.jpg')}}" class="img-thumbnail">
                                            @else
                                                <img src="{{asset('image/default_user.png')}}" class="img-thumbnail shadow-sm">
                                            @endif
                                                @else
                                                <img src="{{asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{Auth::user()->name}}</a>
                                            </h5>
                                            <span class="email">{{Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{route('admin#details')}}">
                                                <i class="fa-solid fa-user"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{route('admin#list')}}">
                                                <i class="fa-solid fa-users"></i>Admin List</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{route('admin#changePasswordPage')}}">
                                                <i class="fa-solid fa-lock"></i>Change Password</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer my-3">
                                        <form action="{{route('logout')}}" method="POST" class="d-flex justify-content-center">
                                            @csrf
                                            <button class="btn bg-success text-dark col-10" type="submit">
                                                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->

@yield('content')
    <!-- END PAGE CONTAINER-->
</div>

</div>
{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Jquery JS-->
<script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('admin/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendor/select2/select2.min.js')}}">
</script>

<!-- Main JS-->
<script src="{{asset('admin/js/main.js')}}"></script>

</body>

@yield('scriptSource')
</html>
<!-- end document-->
