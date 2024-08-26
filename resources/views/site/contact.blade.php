@extends('site.layouts.app')
@section('title', __('تواصل معنا'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('تواصل معنا') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a href="tourism-interface.html"> {{ __('تواصل معنا') }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
<section class="contact-page">
    <div class="contact-cover">
        <img src="{{ asset('site/images/contact-cover.png') }}">
    </div>
    <div class="contact-form">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h5 data-aos="fade-up"
                    data-aos-duration="600">{{ __('تواصل معنا اذا كنت تريد إحدي خدماتنا') }}</h5>
                        <p data-aos="fade-up"
                        data-aos-duration="800">{{ __('إذا كان لديك استفسار عن الخدمات التي نقدمها تواصل معنا علي أرقامنا أو راسلنا عبر البريد الإلكتروني') }}</p>
                        <ul>
                            <li data-aos="fade-up"
                            data-aos-duration="1000">
                                <a href="mailto:{{ getSetting('email') }}">
                                    <h5>{{ getSetting('email') }}</h5>
                                    <i class="fa-regular fa-envelope"></i>

                                </a>
                            </li>
                            <li data-aos="fade-up"
                            data-aos-duration="1200">
                                <a href="tel:{{ getSetting('phone')}}">
                                    <h5>{{ getSetting('phone') }}</h5>
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                            </li>
                            <li data-aos="fade-up"
                            data-aos-duration="1400">
                                <a href="https://www.google.com/maps?q={{ getSetting('lat') }},{{ getSetting('lng') }}">
                                    <h5>
                                        {{getSetting('address')  }}
                                    </h5>
                                    <i class="fa-solid fa-location-dot"></i>
                                </a>
                            </li>
                        </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <form action="{{ route('site.contact.request') }}" method="POST" id="contact_form" data-aos="fade-up"
                    data-aos-duration="1000">
                        @csrf
                        <input name="name" id="name" type="text" placeholder="{{ __('الاسم') }}" >
                        <input type="email" name='email' id="email" placeholder=" {{ __('البريد الإلكتروني') }}">
                        <input type="text" name="phone" id="phone" placeholder="{{ __('رقم التواصل') }}">
                        <textarea name="message" id="message" placeholder="{{ __('نص الرسالة') }}"></textarea>
                        <button class="ctm-btn" type="submit">{{ __('إرسال') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
@push('js')
@endpush
