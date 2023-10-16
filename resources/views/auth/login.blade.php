@extends('frontend.layouts.master')

@section('page_title', 'Sign In')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-140"
        data-bgimg="{{ asset('frontend/assets/img/bg/breadcrumbs-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text text-center">
                        <h1>
                            Sign In
                        </h1>
                        <ul class="d-flex justify-content-center">
                            <li><a href="">Home </a></li>
                            <li> <span>//</span></li>
                            <li>
                                Sign In
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->

    <!-- page wrapper start -->
    <div class="page_wrapper">
        <!-- contact section start -->
        <section class="contact_page_section mb-140">
            <div class="container">
                <div class="row justify-content-between align-items-center mb-n50">
                    <div class="col-lg-6 col-md-8 col-12 mx-auto mb-50">
                        <img width="550" height="550"
                            src="https://htmldemo.net/bonx/bonx/assets/img/bg/hero-position-img.webp" alt="" />
                    </div>
                    <div class="col-lg-5 col-md-8 col-12 mx-auto mb-50">
                        <div class="section_title text-center mb-60">
                            <h2>Login</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form_input">
                                <input name="login" placeholder="Email or Name or Phone" type="text" />
                                @error('login')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form_input">
                                <input name="password" placeholder="Password" type="password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form_input_btn text-center mb-40">
                                <button type="submit" class="btn btn-link">
                                    Login<img width="20" height="20"
                                        src="{{ asset('frontend/assets/img/icon/arrrow-icon.webp') }}" />
                                </button>
                            </div>
                        </form>
                        <p class="text-center">
                            Don't have any account,
                            <a href="">Signup here</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact section end -->
    </div>
    <!-- page wrapper end -->
@endsection
