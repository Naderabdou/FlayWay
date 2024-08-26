<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- owl carusel -->
<link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/owl.theme.default.css') }}">
<!-- aos -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--  -->

<link rel="stylesheet" href="{{ asset('site/css/general.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/main1.css') }}">
@if (app()->getLocale() == 'en')
<link rel="stylesheet" href="{{ asset('site/css/en.css') }}">
@else
<link rel="stylesheet" href="{{ asset('site/css/ar.css') }}">
@endif
<link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
@stack('css')
<style>
    .error {
        color: red;
        font-size: 11px;
        display: flex;

    }
</style>

<style>
    .pagination li {
        display: inline-block;
        padding: 5px;
    }

    .custom-pagination {
        display: flex;
        list-style: none;
        padding: 0;
        justify-content: center;
        margin-top: 20px;
    }

    .custom-pagination li {
        margin: 0 5px;
    }

    .custom-pagination a {
        background-color: #fff;
        border: 1px solid  #B3B8B9        ;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        color: #999999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-pagination a:hover,
    .custom-pagination .active a {
        border-color: var(--color-Primary2);
        color:red
        background-color: var(--color-Primary2);
    }
</style>

