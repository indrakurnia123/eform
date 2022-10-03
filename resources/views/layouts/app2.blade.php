<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="turbolinks-root">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/logoweb.png')}}">
    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('stisla/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/izitoast/dist/css/iziToast.min.css')}}">
    @stack('css_libraries')


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">

    <!-- page_specific_css -->
    @stack('page_specific_css')
    
    <style>
        .loader {
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }
        
        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }   
    </style>

    @stack('page_specific_js_head')
    @livewireStyles
</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <livewire:auth.navbar/>

            <livewire:auth.main-sidebar/>

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('section-header')</h1>
                    </div>
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <livewire:modals/>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
    <script src="{{ mix('js/app.js') }}"></script>  
    {{-- <script src="{{asset('stisla/modules/tooltip.js/dist/tooltip.js')}}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{asset('stisla/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('stisla/modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('stisla/modules/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('stisla/modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('stisla/modules/summernote/dist/summernote-bs4.js')}}"></script>
    <script src="{{asset('stisla/modules/jquery-ui-dist/jquery-ui.min.js')}}"></script>
    <script src="{{asset('stisla/modules/izitoast/dist/js/iziToast.min.js')}}"></script>
    @stack('js_libraries')


    <!-- Template JS File -->
    <script src="{{asset('stisla/js/scripts.js')}}"></script>
    <script src="{{asset('stisla/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    @stack('page_specific_js')
    <script>
        @if(session()->has('success'))
            iziToast.success({title:'Success',message:"{{ session('success') }}"});
        @elseif(session()->has('error'))
            iziToast.error({title:'Error',message:"{{ session('error') }}"});
        @endif
    </script>
    <livewire:scripts/>
</body>