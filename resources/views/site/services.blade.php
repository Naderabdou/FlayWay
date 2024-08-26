@extends('site.layouts.app')
@section('title', __('خدمتنا'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('خدمتنا') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a > {{ __('خدمتنا') }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
    <section class="our-services-page">
        <div class="services">
            <div class="row">
                @forelse ($services as $service)
                    <div class="col-lg-4">

                        <div class="service-card">
                            <div class="services-card-img">
                                <img src="{{ $service->icon_path }}" alt="">
                            </div>
                            <div class="service-card-text">
                                <p>{{ $service->name }}</p>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            {{ __('لا يوجد خدمات حاليا') }}
                        </div>
                    </div>
                @endforelse


                <div class="col-12">
                    <a class="order" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">{{ __('طلب خدمة') }}</a>
                </div>
            </div>
        </div>


    </section>
@endsection
@push('js')
@endpush
