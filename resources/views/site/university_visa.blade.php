@extends('site.layouts.app')
@section('title', __('الجامعات والتأشيرات'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('الجامعات والتأشيرات') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a> {{ __('الجامعات والتأشيرات') }}</a>
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
                <div class="img"> <img src="{{ asset('storage/' . getSetting('university_visa_image_one')) }}"
                    alt=""> </div>
            <div class="img img-visa"> <img src="{{ asset('storage/' . getSetting('university_visa_image_two')) }}"
                    alt=""> </div>
            <div class="img img-visa"> <img src="{{ asset('storage/' . getSetting('university_visa_image_three')) }}"
                    alt=""> </div>
            </div>

        </div>
    </section>
    <!-- start study-intrefaces-carousel -->
    <section class="study-intrefaces-carousel visa">
        <div class="main-container">
            <h1>{{ __('تأشيرات السفر') }}</h1>
            <div class="owl-carousel owl-one owl-theme">
                @forelse ($StudyDestination as $destination)
                    <a href="{{ route('site.tourism.study', $destination->slug) }}">
                        <div class="item">
                            <div class="item-text">
                                <h3>{{ $destination->name }}</h3>
                            </div>
                            <div class="study-img">
                                <img src="{{ $destination->main_image_path }}">
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="item">
                        <div class="item-text">
                            <h3>{{ __('لا يوجد بيانات') }}</h3>
                        </div>
                        <div class="study-img">
                            <img src="{{ asset('site/images/study-english.png') }}">
                        </div>
                    </div>
                @endforelse





            </div>
        </div>
    </section>
    <!-- end study-intrefaces-carousel -->
@endsection
@push('js')
@endpush
