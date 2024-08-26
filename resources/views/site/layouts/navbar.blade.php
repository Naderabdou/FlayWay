<section class="header" style="background-image: url({{ asset('storage/' . $setting->header_image) }});">
    <div class="top-nav">
        <div class="main-container">
            <div class="logo-container">
                <a href="/">
                    <img src="{{ asset('storage/' . $setting->logo) }}">
                </a>
            </div>
            <ul>
                <li>
                    <ul class="social">

                        <li><a href="{{ route('site.lang', app()->getLocale() == 'ar' ? 'en' : 'ar') }}" class="language"><h3>{{ app()->getLocale() === 'ar' ? 'En' : 'Ar' }}</h3></a></li>

                        <li><a target="__blank" href="{{ $setting->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a target= "__blank" href="{{ $setting->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a target= "__blank" href="{{ $setting->twitter }}"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a target= "__blank" href="{{ $setting->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>



                    </ul>
                </li>

                <li>
                    <a href="mailto:{{ $setting->email }}">
                        <p>{{ $setting->email  }}</p>
                        <i class="fa-regular fa-envelope"></i>

                    </a>
                </li>
                <li>
                    <a href="tel:{{ $setting->phone }}">
                        <p>{{ $setting->phone }}</p>
                        <i class="fa-solid fa-phone"></i>
                    </a>
                </li>

            </ul>

        </div>
    </div>
    <nav>
        <div class="main-container">
            <div class="logo-container">
                <a href="/">
                    <img src="{{ asset('storage/' . $setting->logo) }}">
                </a>
            </div>
            <div class="element">
                <ul>
                    <li >
                        <a   href="/" class="{{ isActiveRoute('/') }}">{{ __('الرئيسية') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.about') }}" href="{{ route('site.about') }}">{{ __('من نحن') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.services') }}" href="{{ route('site.services') }}">{{ __('خدماتنا') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.hotel') }}" href="{{ route('site.hotel') }}">{{ __('حجوزات الفنادق والطيران') }}</a>
                    </li>
                    <!-- <li>
                        <a href="study-english.html">دراسة اللغة الإنجليزية</a>
                    </li> -->
                    <li class="dropdown">
                        <a class="{{ isActiveRoute('site.language') }}" " class="dropbtn">
                            {{ __('دراسة اللغات') }}<i class="fa-solid fa-angle-down"></i>
                        </a>
                        <div class="dropdown-content">
                            @foreach ($language as $lang)
                                <a  href="{{ route('site.language', $lang->slug) }}">
                                    {{ $lang->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.study') }}" href="{{ route('site.study') }}">{{ __('عروض الدراسة') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.summer.camp') }}" href="{{ route('site.summer.camp') }}">{{ __('مخيمات صيفية للأطفال') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.university.visa') }}" href="{{ route('site.university.visa') }}">{{ __('الجامعات والتأشيرات') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.courses') }}" href="{{ route('site.courses') }}">{{ __('دورات متخصصة') }}</a>
                    </li>
                    <li>
                        <a class="{{ isActiveRoute('site.contact') }}" href="{{ route('site.contact') }}">{{ __('تواصل معنا') }}</a>
                    </li>
                </ul>
            </div>

            <div class="menu-div">
                <div class="content" id="times-ican">
                    <a href="#" title="Navigation menu" class="navicon" aria-label="Navigation">
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                        <span class="navicon__item"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="landing">
        @yield('header-hero')
    </div>

</section>

@yield('breadcrumb')
