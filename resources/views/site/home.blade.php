@extends('site.layouts.app')
@section('title', __('الرئيسية'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ getSetting('header_desc_' . app()->getLocale()) }}</h2>
        <h3>{{ getSetting('sub_header_desc_' . app()->getLocale()) }}</h3>
        <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">{{ __('طلب خدمة') }}</a>
    </div>
@endsection


@section('content')
    <!-- start about-us -->
    <section class="about-us">
        <div class="main-container">
            <div class="row ">
                <div class="col-lg-6  col-md-6 col-sm-6">
                    <div class="about-content" data-aos="fade-up">
                        <h1>{{ __('من نحن') }}</h1>

                        <p>{{ getSetting('home_about_desc_' . app()->getLocale()) }}</p>
                        <a href="{{ route('site.about') }}">{{ __('قراءة المزيد') }}</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" data-aos="fade-up">
                    <div class="about-img-container">
                        <div class="big-image">
                            <img src="{{ asset('storage/' . getSetting('about_image_one')) }}" alt="">
                        </div>
                        <div class="small-image">
                            <img src="{{ asset('storage/' . getSetting('about_image_two')) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about-us -->
    <!-- ============= -->
    <!-- ============== -->
    <!-- ============ -->
    <!-- start study-intrefaces-carousel -->
    <section class="study-intrefaces-carousel">
        <div class="main-container">
            <div class="study-header">
                <h1>{{ __('الوجهات الدراسية') }}</h1>
            </div>
            <div class="owl-carousel owl-one owl-theme">
                @forelse ($studys as $study)
                    <a href="{{ route('site.tourism.study', $study->slug) }}">
                        <div class="item">
                            <div class="item-text">
                                <h3>{{ $study->name }}</h3>
                            </div>
                            <div class="study-img">
                                <img src="{{ $study->main_image_path }}">
                            </div>
                        </div>
                    </a>
                @empty
                    <a href="study-interface.html">
                        <div class="item">
                            <div class="item-text">
                                <h3>{{ __('not found data') }}</h3>
                            </div>
                            <div class="study-img">
                                <img src="{{ asset('site/images/notFound.png') }}">
                            </div>
                        </div>
                    </a>
                @endforelse




            </div>
        </div>
    </section>
    <!-- end study-intrefaces-carousel -->
    <!-- ============ -->
    <!-- ============ -->
    <!-- start our-service -->
    <section class="our-services">
        <div class="services-img">
            <img src="{{ asset('site/images/services.png') }}" alt="">
        </div>
        <div class="main-container">
            <div class="services-text">
                <h2>{{ __('خدماتنا') }}</h2>
                <h3>{{ __('نقدم العديد من الخدمات لعملاؤنا') }}</h3>
            </div>
        </div>
        <div class="owl-carousel owl-two owl-theme">
            @forelse ($services as $service)
                <a href="{{ route('site.services') }}">
                    <div class="item">
                        <div class="item-img">
                            <img src="{{ $service->icon_path }}" alt="">
                        </div>
                        <div class="item-text">
                            <p>{{ $service->name }}</p>
                        </div>

                    </div>
                </a>
            @empty
                <a ">
                        <div class="item">
                            <div class="item-img">
                                <img src="{{ asset('site/images/notFound.png') }}" alt="">
                            </div>
                            <div class="item-text">
                                <p>{{ __('not found data') }}</p>
                            </div>

                        </div>
                    </a>
     @endforelse


        </div>
    </section>
    <!-- end our-services -->
    <!-- ==================== -->
    <!-- ==================== -->

    <!-- start Tourist-destinations-carousel -->
    <section class="Tourist-destinations-carousel">
        <div class="main-container">
            <div class="tourist-header">
                <h1>{{ __('الوجهات السياحية') }}</h1>
            <a href="{{ route('site.destinations') }}">{{ __('المزيد') }}</a>
            </div>

            <div class="owl-carousel owl-one owl-theme">
                @forelse ($tourists as $tourist )
                    <a href="{{ route('site.tourism.destinations', $tourist->slug) }}">
                        <div class="item">
                            <div class="item-text">
                                <h3>{{ $tourist->name }}</h3>
                                <ul>
                                    @for ($i = 0; $i < $tourist->rate; $i++)
                                        <li><i class="fa-solid fa-star"></i></li>
                                    @endfor

                                </ul>
                                <p>{{ __('السعر') }} : <span>
                                        {{ $tourist->price }} {{ __('ريال سعودي') }}
                                    </span></p>
                            </div>
                            <div class="Tourist-img">
                                <img src="{{ $tourist->main_image_path }}">
                            </div>
                        </div>
                    </a>
                @empty
                    <a href="tourism-interface.html">
                        <div class="item">
                            <div class="item-text">
                                <h3>{{ __('لايوجد بيانات') }}</h3>
                                <ul class="d-flex">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <p>{{ __('السعر') }} : <span>
                                        {{ __('not found data') }}
                                    </span></p>
                            </div>
                            <div class="Tourist-img">
                                <img src="{{ asset('site/images/notFound.png') }}">
                            </div>
                        </div>
                    </a>

                @endforelse






            </div>
        </div>
    </section>
    <!-- end study-intrefaces-carousel -->
    <!-- ============================ -->
    <!-- ============================= -->
    <!-- start comments -->
    <section class="comments">
        <div class="main-container">
            <h1>{{ __('آراء العملاء') }}</h1>
        </div>
        <div class="owl-carousel owl-three owl-theme">
            @forelse ($customerReview as $review)
                <div class="item">
                    <div class="item-text">
                        <p>"{{ $review->review }}"</p>
                        <ul>
                            @for ($i = 0; $i < $review->rating; $i++)
                                <li><i class="fa-solid fa-star"></i></li>
                            @endfor
                        </ul>
                        <p>
                            {{ $review->name }}
                        </p>
                    </div>
                </div>
            @empty

                <div class="item">
                    <div class="item-text">
                        <p>"{{ __('لايوجد بيانات') }}"</p>
                        <ul>
                            <li><i class="fa-solid fa-star"></i></li>

                        </ul>
                        <p>
                            {{ __('لايوجد بيانات') }}
                        </p>
                    </div>
                </div>
            @endforelse


        </div>
    </section>
@endsection
