@extends('frontend.layouts.master')

@section('page_title', 'Home')
@section('content')
    <!-- page wrapper start -->
    <div class="page_wrapper">
        <!--slide banner section start-->
        @include('frontend.home.sections.hero-section')
        <!--slider area end-->

        <!-- gaming  world section start -->
        @include('frontend.home.sections.services-section')
        <!-- gaming  world section end -->

        <!-- gaming video section start -->
        @include('frontend.home.sections.video-section')
        <!-- gaming video section end -->

        <!-- popular gaming  section start -->
        @include('frontend.home.sections.popular-gaming-section')
        <!-- popular gaming section end -->

        <!-- testimonial section start -->
        @include('frontend.home.sections.testimonial-section')
        <!-- testimonial section end -->

        <!-- blog section start -->
        @include('frontend.home.sections.blog-section')
        <!-- blog section end -->
    </div>
    <!-- page wrapper end -->
@endsection
