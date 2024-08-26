@extends('site.layouts.app')
@section('title', __('حجوزات الفنادق والطيران'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('حجوزات الفنادق والطيران') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a > {{ __('حجوزات الفنادق والطيران') }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
    <section class="hotel__reservation main-container">
        <form class="hotel__reservation__text form_service" action="{{ route('site.service.request') }}" method="post">
            @csrf
            {!! getSetting('university_visa_desc', app()->getLocale()) !!}
            <div class="service__order__form">
                <h3> {{ __('طلب الخدمة') }}</h3>
                <div class="input">
                    <input type="text" name="name" placeholder="{{ __('الإسم') }}">
                    <input type="text" name="email" placeholder="{{ __('البريد الإلكتروني') }}">
                </div>
                <div class="input">
                    <input type="number" name="phone" placeholder="{{ __('رقم الهاتف') }}">
                    <input type="number" name="whatsapp" placeholder="{{ __('رقم الواتس اب') }}">
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
                        <div class="icon__arrow"> <i class="fa-solid fa-angle-down"></i> </div>
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
        <div class="hotel__reservation__img">
            <div class="hotel-gallary">
                <div class="img"> <img src="{{ asset('storage/' . getSetting('hotel_image_one')) }}" alt=""> </div>
                <div class="img img-change"> <img src="{{ asset('storage/' .  getSetting('hotel_image_two')) }}" alt=""> </div>
                <div class="img img-change"> <img src="{{ asset('storage/' .  getSetting('hotel_image_three')) }}" alt=""> </div>
            </div>


        </div>
    </section>
@endsection
@push('js')
@endpush
