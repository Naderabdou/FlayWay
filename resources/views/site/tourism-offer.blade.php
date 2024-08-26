@extends('site.layouts.app')
@section('title', __('الوجهات السياحية'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('الوجهات السياحية') }}</h2>
    </div>
@endsection



@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a href="/"> {{ __('الوجهات السياحية') }} </a>
                <span> / </span>
                <a> {{ $tourist->name }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')


    <section>
        <div class="main-container">
            <div class="tourism-offer-images">
                <div class="img-container">
                    <div class="img"><img src="{{ $tourist->main_image_path }}" alt=""></div>
                </div>
                @foreach (array_chunk($tourist->image, 2) as $imageChunk)
                    <div class="img-container">
                        @foreach ($imageChunk as $image)
                            <div class="img"><img src="{{ asset('storage/' . $image) }}" alt=""></div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="tourism__offer_carousel">
                <div class="owl-carousel  ">
                    <div class="item"><img src="{{ $tourist->main_image_path }}" alt=""></div>
                    @foreach ($tourist->image as $image)
                    <div class="item"> <img src="{{ asset('storage/'. $image) }}" alt=""> </div>
                @endforeach

                </div>
            </div>

            <div class="tourism__offer__text">
                <h2> {{ $tourist->name }}</h2>

                <div class="stars">
                    @for ($i = 0; $i < $tourist->rate; $i++)
                    <i class="fa-solid fa-star"></i>
                @endfor
                </div>

                <div class="price"> {{ __('السعر للفرد') }}: <span> {{ $tourist->price }} {{ __('ريال سعودي') }}
                    </span> </div>
                <p> {{ $tourist->sub_title }} </p>
            </div>

            <div class="tourism__offer__card__container">
                <div class="tourism__offer__card">
                    <h3> {{ __('العرض يشمل:') }} </h3>
                    {!! $tourist->includes !!}
                </div>
                <div class="tourism__offer__card">
                    <h3> {{ __('العرض لا يشمل:') }} </h3>
                    {!! $tourist->excludes !!}
                </div>
            </div>
        </div>
    </section>

    <section class="service__order">
        <div class="white__space"></div>
        <div class="service__order_img">
            <img src="{{ asset('site/images/service__order__img.png') }}" alt="">
        </div>
        <form action="{{ route('site.service.request') }}" class="form_service" method="post">

            <div class="service__order__form form__absolute">
                <h3>{{ __('طلب الخدمة') }}</h3>

                <div class="input">
                    <div class="input-error">
                    <input type="text" name="name" placeholder="{{ __('الإسم') }}">
                    </div>
                    <div class="input-error">
                    <input type="text" name="email" placeholder="{{ __('البريد الإلكتروني') }}">
                    </div>
                </div>
                <div class="input">
                    <div class="input-error">
                    <input type="number" name="phone" placeholder="{{ __('رقم الهاتف') }}">
                    </div>
                    <div class="input-error">
                    <input type="number" name="whatapp" placeholder="{{ __('رقم الواتس اب') }}">
                    </div>
                </div>
                <div class="input">
                    <div class="select__form">
                        <div for="select" class="icon__arrow"> <i class="fa-solid fa-angle-down"></i> </div>
                        <select id="select" name="best_contact_method">
                            <option value="" selected disabled> {{ __('أفضل طريقة للتواصل') }}</option>
                            <option value="email"> {{ __('email') }} </option>
                            <option value="phone"> {{ __('phone') }} </option>
                            <option value="whatsapp"> {{ __('whatsapp') }} </option>
                        </select>
                    </div>
                    <div class="select__form">
                        <div for="select" class="icon__arrow"> <i class="fa-solid fa-angle-down"></i> </div>
                        <select name="service_name" id="service_name">
                            <option value="" selected disabled>{{ __('الخدمة المطلوبة') }}</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->name }}"> {{ $service->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <textarea name="message" placeholder="{{ __('نص الرسالة') }}"></textarea>
                <button type="submit" class="service__order__form__btn ctm-btn-services"> {{ __('إرسال') }} </button>

            </div>
        </form>
    </section>
@endsection
@push('js')
<script src="js/owl.carousel.min.js"></script>
<!-- aos -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init(); </script>

    <script>
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
              0: {
                items: 1
              },
              400: {
                items: 2
              },
              600: {
                items: 3
              },
              1000: {
                items: 5
              }
            }
          });
        });
      </script>
@endpush
