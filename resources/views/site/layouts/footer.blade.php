<footer>
    <div class="footer-cover">
        <img src="{{ asset('storage/' . $setting->footer_image) }} " alt="">
    </div>
    <div class="main-container">
        <div class="top-footer">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>{{ __('روابط سريعة') }}</h3>
                    <ul>
                        <li><a href="{{ route('site.about') }}">{{ __('من نحن') }}</a></li>
                        {{-- <li><a href="{{  }}">{{ __('دراسة اللغة الإنجليزية') }}</a></li> --}}
                        <li><a href="{{ route('site.study') }}">{{ __('عروض الدراسة') }}</a></li>
                        <li><a href="{{ route('site.summer.camp') }}">{{ __('مخيمات صيفية للأطفال') }}</a></li>
                        <li><a href="{{ route('site.courses') }}">{{ __('دورات متخصصة') }}</a></li>
                        <li><a href="{{ route('site.contact') }}"> {{ __('تواصل معنا') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>{{ __('خدماتنا') }}</h3>
                    <ul>
                        @foreach ($services->take(4) as $service)
                            <li><a href="{{ route('site.services') }}">{{ $service->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>{{ __('تواصل معنا') }}</h3>
                    <ul class="footer-element">
                        <li>
                            <a href="tel:{{ $setting->phone }}">
                                <i class="fa-solid fa-phone"></i>
                                <p>{{ $setting->phone }}</p>

                            </a>
                        </li>
                        <li>
                            <a href="mailto: {{ $setting->email }} ">
                                <i class="fa-regular fa-envelope"></i>
                                <p>{{ $setting->email }}</p>


                            </a>
                        </li>
                        <li>

                            <ul>


                                <li><a target="__blank" href="{{ $setting->instagram }}"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                                <li><a target= "__blank" href="{{ $setting->linkedin }}"><i
                                            class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a target= "__blank" href="{{ $setting->twitter }}"><i
                                            class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a target= "__blank" href="{{ $setting->facebook }}"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>




                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="end-footer">
            <div class="footer-logo">
                <a href="/"> <img src="{{ asset('storage/' . $setting->logo) }}"> </a>
            </div>
            <div class="footer-end ">
                <p>

                    {{ __('كل الحقوق محفوظة') }} {{ $setting->{'site_name_' . app()->getLocale()} }} &copy;
                    {{ date('Y') }}
                </p>
                <a href="https://jaadara.com/"> {{ __('صنع بكل حب') }}<i class="fa-solid fa-heart"></i>
                    {{ __('في معامل جدارة') }}</a>
            </div>
        </div>
    </div>
</footer>



<!-- start menu responsive ===
    ======== -->
<div class="bg_menu ">
</div>
<div class="menu_responsive" id="menu-div">

    <div class="element_menu_responsive">
        <div class="nav-img">
            <img src="{{ asset('site/images/world-map.png') }}">
        </div>
        <ul>
            <li>
                <a href="/">{{ __('الرئيسية') }}</a>
            </li>
            <li>
                <a href="{{ route('site.about') }}">{{ __('من نحن') }}</a>
            </li>
            <li>
                <a href="{{ route('site.services') }}">{{ __('خدماتنا') }}</a>
            </li>
            <li>
                <a href="{{ route('site.hotel') }}">{{ __('حجوزات الفنادق والطيران') }}</a>
            </li>
            <li class="dropdown">

                <a class="dropbtn">{{ __('دراسة اللغات') }}<i class="fa-solid fa-angle-down"></i></a>
                <div class="dropdown-content">
                    @foreach ($language as $lang)
                        <a href="{{ route('site.language', $lang->slug) }}">{{ $lang->name }}</a>
                    @endforeach

                </div>
            </li>

            <li>
                <a href="{{ route('site.study') }}">{{ __('عروض الدراسة') }}</a>
            </li>
            <li>
                <a href="{{ route('site.summer.camp') }}">{{ __('مخيمات صيفية للأطفال') }}</a>
            </li>
            <li>
                <a href="{{ route('site.university.visa') }}">{{ __('الجامعات والتأشيرات') }}</a>
            </li>
            <li>
                <a href="{{ route('site.courses') }}">{{ __('دورات متخصصة') }}</a>
            </li>
            <li>
                <a href="{{ route('site.contact') }}">{{ __('تواصل معنا') }}</a>
            </li>
        </ul>
    </div>




    <div class="remove-mune">
        <span></span>
    </div>




</div>

<!-- modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <form action="{{ route('site.service.request') }}" class="form_service" method="post">
                    @csrf
                    <div class="service__order__form">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        <h3> {{ __('طلب الخدمة') }}</h3>
                        <div class="input">
                            <div class="input-error">
                                <input type="text" name="name" id="name" placeholder="{{ __('الإسم') }}">
                            </div>
                            <div class="input-error">
                                <input type="text" name="email" id="email"
                                    placeholder="{{ __('البريد الإلكتروني') }}">
                            </div>
                        </div>
                        <div class="input">
                            <div class="input-error">
                                <input type="number" name="phone" id="phone"
                                    placeholder="{{ __('رقم الهاتف') }}">
                            </div>
                            <div class="input-error">
                                <input type="number" name="whatsapp" id="phone"
                                    placeholder="{{ __('رقم الواتس اب') }}">
                            </div>
                        </div>
                        <div class="input">
                            <div class="select__form">
                                <div for="select" class="icon__arrow"> <i class="fa-solid fa-angle-down"></i>
                                </div>
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
                        <button type="submit" class="service__order__form__btn ctm-btn-services">
                            {{ __('إرسال') }} </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- whats app icon -->






{{-- <div class="whatsapp-container">



        <a target="__blank" >

            <div class="whats-icon whatsapp-main">
                <span data-tooltip="whats app">
                    <i class="fa-brands fa-whatsapp"></i>
                </span>
            </div>

        </a>




        <a target="__blank" >

            <div class="whats-icon whatsapp-main">
                <span data-tooltip="whats app">
                    <i class="fa-brands fa-whatsapp"></i>
                </span>
            </div>

        </a>

        <a target="__blank" >

            <div class="whats-icon whatsapp-main">
                <span data-tooltip="whats app">
                    <i class="fa-brands fa-whatsapp"></i>
                </span>
            </div>

        </a>

    </div> --}}



{{-- <div class="whatsapp-container">
            <div class="whats-icon whatsapp-main" id="whatsappMain">
                <i class="fa-brands fa-whatsapp"></i>
            </div>
            <div class="whatsapp-options" id="whatsappOptions">
                <div class="whatsapp-option">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="whatsapp-option">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="whatsapp-option">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
            </div>
        </div> --}}
<div class="whatsapp-container">
    <div class="whatsapp-main" id="whatsappMain">
        <i class="fa-brands fa-whatsapp"></i>
    </div>
    <div class="whatsapp-options" id="whatsappOptions">
        <a href="https://wa.me/{{ $setting->whatsapp  }}" target="__blank">
            <div class="whatsapp-option" data-tooltip="{{ __('حجوزات الفنادق والطيران') }}">
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </a>
        <a href="https://wa.me/{{ $setting->whatsapp_hotal  }}" target="__blank">
            <div class="whatsapp-option" data-tooltip="{{ __('الدراسه بالخارج') }}">
                <i class="fa-brands fa-whatsapp"></i>
            </div>
        </a>
    </div>
</div>





@include('site.layouts.script')
</body>
