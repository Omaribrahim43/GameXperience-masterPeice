@extends('frontend.layouts.master')

@section('page_title', 'Player Profile')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs_aree breadcrumbs_bg mb-140"
        data-bgimg="{{ asset('frontend/assets/img/bg/breadcrumbs-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text text-center">
                        <h1>
                            Player Profile
                        </h1>
                        <ul class="d-flex justify-content-center">
                            <li><a href="">Home </a></li>
                            <li> <span>//</span></li>
                            <li>
                                Player Profile
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
        <!-- player list section start -->
        <section class="player_details_section mb-125">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-player-details">
                            <div class="side__left">
                                <div class="image">
                                    <img class="img-fluid"
                                        src="{{ !empty($profileData->photo) ? asset($profileData->photo) : url('uploads/no_image.jpg') }}">
                                </div>

                                <div class="player-profile">
                                    <h4 class="title">{{ $profileData->name }}</h4>
                                    <h5 class="level-text">36 LEVEL COMPLETED</h5>
                                    <div class="content-shape-img">
                                        <img src="{{ asset('frontend/assets/img/others/tam-text-shape2.webp') }}">
                                    </div>
                                </div>

                                <div class="social-link">
                                    <a href="https://www.twitch.tv" target="_blank" rel="noopener noreferrer"><i
                                            class="icofont-twitch"></i></a>
                                    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer"><i
                                            class="icofont-youtube-play"></i></a>
                                    <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer"><i
                                            class="icofont-twitter"></i></a>
                                </div>
                            </div>
                            <div class="side__right">
                                <div class="content">
                                    <span class="title-tag">PLAYER PROFILE</span>
                                    <h4 class="title">{{ $profileData->name }}</h4>
                                    <p>It is a long established fact that a reader will be distracted
                                        readable content page when looking at it layout the point using
                                        lorem Ipsum that it has more-or-less normal distribution lette
                                        desktop packages and web page now editors.</p>
                                    <p>It is a long established fact that and reader will been distracted
                                        readable content page when looking at it layout the point using
                                        desktop packages and web page now editors.</p>

                                    <a class="btn btn-link" href="">Settings</a>
                                </div>
                            </div>

                            <div class="mascot-logo">
                                <img class="img-fluid" src="assets/img/others/player-bg-maskot.webp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- player list section end -->
    </div>
    <!-- page wrapper end -->
@endsection
