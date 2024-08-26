@extends('site.layouts.app')
@section('title', __('الوجهات السياحية'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2> {{ __('الوجهات السياحية') }} </h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <p>{{ __('الوجهات السياحية') }}</p>
            </div>
        </div>
    </section>

@endsection


@section('content')
    <section>
        <div class="main-container" id="order_data">
            <div class="tourism-interface-content list" id="">

                @forelse ($tourists as $tourist)
                    <a href="{{ route('site.tourism.destinations', $tourist->slug) }}" class="tourism-card">
                        <div class="img"> <img src="{{ $tourist->main_image_path }}" alt=""> </div>
                        <div class="text">
                            <div class="text-head"> {{ $tourist->name }}</div>
                            <div class="tourism-stars">
                                @for ($i = 0; $i < $tourist->rate; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>

                            <div class="tourism-price">
                                <p> {{ __('السعر') }} : <span> {{ $tourist->price }} {{ __('ريال سعودي') }} </span>
                                </p>
                            </div>
                        </div>
                    </a>

                @empty

                    <div class="no-data">
                        <p> {{ __('لا يوجد بيانات') }} </p>
                    </div>

                @endforelse


            </div>
            @if ($tourists->count() > 0)
                <ul class="pagination custom-pagination"></ul>
            @endif
        </div>
    </section>
@endsection
@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        $(document).ready(function() {
            function initializeListJS() {
                var options = {
                    valueNames: ['text-head'],
                    page: 9,
                    pagination: true
                };
                var addressList = new List('order_data', options);
            }

            // Initialize List.js on page load
            initializeListJS();
        });
    </script>
@endpush
