@extends('site.layouts.app')
@section('title', __('اللغات'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ $showLang->name }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a > {{ $showLang->name }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
    <!-- ================= -->
    <!-- study english page -->
    <section class="study-english-page">
        <div class="studing">
            <div class="main-container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="studing-img"data-aos="fade-up" data-aos-duration="800">
                            <img src="{{ $showLang->image_path }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="study-cover-img">
                            <img src="{{ asset('site/images/world-cover.png') }}" alt="">
                        </div>
                        <div class="studing-text">
                            <h2 data-aos="fade-up" data-aos-duration="800">{{ $showLang->name }}</h2>
                            <h5 data-aos="fade-up" data-aos-duration="1000">
                                {{ $showLang->desc }}
                            </h5>
                            @if ($showLang->attachment)
                            <a target="__blank" href="{{ $showLang->attachment_path }}" class="mainbutton"> {{ __('قراءه الكتالوج') }}  </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ -->
    <!-- start study-intrefaces-carousel -->
    <section class="study-intrefaces-carousel studing">
        <div class="main-container">
            <h1>{{ __('ذات صلة') }}</h1>
            <div class="owl-carousel owl-one owl-theme">
                @foreach ($allLang as $Lang)
                <a href="{{ route('site.language',$Lang->slug) }}">
                    <div class="item">
                        <div class="item-text">
                            <h3>{{ $Lang->name }}</h3>
                        </div>
                        <div class="study-img">
                            <img src="{{ $Lang->image_path }}">
                        </div>
                    </div>
                </a>
                @endforeach






            </div>
        </div>
    </section>
    <!-- end study-intrefaces-carousel -->
    <!-- ============ -->
@endsection
@push('js')
@endpush
