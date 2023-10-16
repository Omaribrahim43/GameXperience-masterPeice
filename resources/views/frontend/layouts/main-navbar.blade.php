<!--header area start-->
<header class="header_section header_transparent sticky-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main_header d-flex justify-content-between align-items-center">
                    <div class="header_logo">
                        <a class="sticky_none" href="index.php"><img
                                src="{{ asset('frontend/assets/img/logo/logo.png') }}" /></a>
                    </div>
                    <!--main menu start-->
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul class="d-flex">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="all-game.php">Lounges</a></li>
                                <li><a href="community.php">Community</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                @auth
                                    <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                    <!--main menu end-->
                    <div class="header_right_sidebar d-flex align-items-center">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <div class="sing_up_btn">
                                        <a class="btn btn-link" href="{{ url('/dashboard') }}">ACCOUNT
                                            <img src="{{ asset('frontend/assets/img/icon/arrrow-icon2.webp') }}" />
                                        </a>
                                    </div>
                                @else
                                    <div class="sing_up_btn">
                                        <a class="btn btn-link" href="{{ route('login') }}">LOGIN
                                            <img src="{{ asset('frontend/assets/img/icon/arrrow-icon2.webp') }}" />
                                        </a>
                                    </div>
                                @endauth
                                <div class="canvas_open">
                                    <a href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->
