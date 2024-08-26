@extends('site.layouts.app')
@section('title', __('دورات متخصصة'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('دورات متخصصة') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a> {{ __('دورات متخصصة') }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
    <section class="study-offers-page">
        <div class="studing">
            <div class="main-container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="studing-img"data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ asset('storage/' . getSetting('courses_image')) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="studing-text">
                            <h2 data-aos="fade-up" data-aos-duration="800">{{ __('دورات متخصصة') }}</h2>

                            {!! getSetting('courses_desc', app()->getLocale()) !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
@endpush
