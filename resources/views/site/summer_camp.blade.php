@extends('site.layouts.app')
@section('title', __('مخيمات صيفية للأطفال'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('مخيمات صيفية للأطفال') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a > {{ __('مخيمات صيفية للأطفال') }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
<section class="summer-camp-page">
    <div class="camping">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="camping-img"data-aos="fade-up" data-aos-duration="800">
                        <img src="{{ asset('storage/'. getSetting('summer_camp_image') ) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="study-cover-img">
                        <img src="{{ asset('site/images/world-cover.png') }}" alt="">
                    </div>
                    <div class="camping-text">
                        <h2 data-aos="fade-up" data-aos-duration="800">{{ __('مخيمات صيفية للأطفال') }}</h2>
                        {!! getSetting('summer_camp_desc',app()->getLocale()) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
@endpush
