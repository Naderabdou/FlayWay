@extends('site.layouts.app')
@section('title', __('من نحن'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('من نحن') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a href="tourism-interface.html"> {{ __('من نحن') }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
    <section class="about-us-page">
        <div class="main-container">
            <div class="row">

                <div class="col-lg-5 col-md-12">
                    <div class="about-us-gallary" data-aos="fade-up">
                        <div class="moon-img">

                            <div class="moon-text">
                                <h3>+ {{ $setting->expert }} {{ __('عام') }}</h3>
                                <p>{{ __('من الخبرة') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="gallary-img">
                                    <img src="{{ asset('storage/' . $setting->about_image_one) }}" alt="">
                                </div>
                                <div class="gallary-img">
                                    <img src="{{ asset('storage/' . $setting->about_image_two) }}" alt="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="gallary-img">
                                    <img src="{{ asset('storage/' . $setting->about_image_three) }}" alt="">
                                </div>
                                <div class="gallary-img">
                                    <img src="{{ asset('storage/' . $setting->about_image_four) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="about-us-text" data-aos="fade-up">
                        <h1>{{ __('نبذة عنا') }}</h1>
                        {!! $setting->{'about_desc_' . app()->getLocale()} !!}


                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
@push('js')
    {{-- <script>
        $(document).ready(function() {
            var baseDuration = 500; // Starting duration
            var increment = 100; // Increment value

            function updateAOSClasses() {
                var scrollTop = $(window).scrollTop();
                var windowHeight = $(window).height();

                $('.about-us-text ul li').each(function(index) {
                    var duration = baseDuration + (increment * index);
                    $(this).attr('data-aos', 'fade-up')
                        .attr('data-aos-easing', 'linear')
                        .attr('data-aos-duration', duration);

                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();

                    if (elementTop < scrollTop + windowHeight && elementBottom > scrollTop) {
                        if (index < 4) {
                            console.log(index);

                            $(this).addClass('aos-init aos-animate');
                        }
                    }
                });
            }

            // Initial call to set classes
            updateAOSClasses();

            // Update classes on scroll
            $(window).on('scroll', function() {
                updateAOSClasses();
            });
        });
    </script> --}}
@endpush
