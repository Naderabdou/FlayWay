@extends('site.layouts.app')
@section('title', __('الوجهات الدراسة'))

@include('site.layouts.seo')

@section('header-hero')
    <div class="landing-content" data-aos="fade-up">
        <h2>{{ __('الوجهات الدراسة') }}</h2>
    </div>
@endsection


@section('breadcrumb')
    <section class="section-header">
        <div class="main-container">
            <div class="section-header-links">
                <a href="/"> {{ __('الرئيسية') }} </a>
                <span> / </span>
                <a > {{ $studys->name }}</a>
            </div>
        </div>
    </section>

@endsection


@section('content')
<section class="study-interface" >
    <div class="main-container">
       <div class="study-interface-content">
           <div class="text">
                {!! $studys->desc !!}
                {!! $studys->features !!}
                @if ($studys->attachment)
                <a target="__blank" href="{{ $studys->attachment_path  }}" class="mainbutton">{{ __('قراءه الكتالوج') }}</a>
                @endif
           </div>
           <div class="section-images">


            <div class="hotel__reservation__img">
                <div class="hotel-gallary">
                    <div class="img"> <img src="{{ $studys->main_image_path }}" alt=""> </div>
                    @foreach ($studys->image as $image )

                    <div class="img study-changes"> <img src="{{ asset('storage/'. $image) }}" alt=""> </div>
                    @endforeach
                </div>


            </div>

           </div>
       </div>
    </div>
 </section>
@endsection
@push('js')
@endpush
