<!doctype html>
<html lang="en" dir="ltr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sell flow</title>

   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">

   <!-- inject:css-->

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/bootstrap/bootstrap.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/daterangepicker.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/fontawesome.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/footable.standalone.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/fullcalendar@5.2.0.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/jquery-jvectormap-2.0.5.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/jquery.mCustomScrollbar.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/leaflet.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/line-awesome.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/magnific-popup.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/MarkerCluster.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/MarkerCluster.Default.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/select2.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/slick.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/star-rating-svg.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/trumbowyg.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/vendor_assets/css/wickedpicker.min.css')}}">

   <link rel="stylesheet" href="{{asset('style.css')}}">

   <!-- endinject -->

   <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/logo.png')}}">

   <!-- Fonts -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body class="layout-light side-menu">
   <div class="mobile-search">
      <form action="/" class="search-form">
         <img src="{{asset('img/svg/search.svg')}}" alt="search" class="svg">
         <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..." aria-label="Search">
      </form>
   </div>
   <div class="mobile-author-actions"></div>

   {{-- header --}}
    @include('components.header')
   {{-- header --}}

   <main class="main-content">

      {{-- sidebar --}}
        @include('components.sidebar')
      {{-- sidebar --}}

      <div class="contents">

         @yield('content')

      </div>

      {{-- footer --}}
      @include('components.footer')
      {{-- footer --}}

   </main>
   <div id="overlayer">
      <div class="loader-overlay">
         <div class="dm-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
         </div>
      </div>
   </div>
   <div class="overlay-dark-sidebar"></div>
   <div class="customizer-overlay"></div>
   <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>
   <!-- inject:js-->
   <script src="{{asset('assets/vendor_assets/js/jquery/jquery-3.5.1.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery/jquery-ui.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/bootstrap/popper.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/bootstrap/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/moment/moment.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/accordion.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/apexcharts.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/autoComplete.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/Chart.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/daterangepicker.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/drawer.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/dynamicBadge.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/dynamicCheckbox.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/footable.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/fullcalendar@5.2.0.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/google-chart.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery.countdown.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery.filterizr.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery.magnific-popup.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery.peity.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/jquery.star-rating-svg.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/leaflet.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/leaflet.markercluster.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/loader.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/message.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/moment.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/muuri.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/notification.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/popover.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/select2.full.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/slick.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/trumbowyg.min.js')}}"></script>
   <script src="{{asset('assets/vendor_assets/js/wickedpicker.min.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/apexmain.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/charts.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/drag-drop.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/footable.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/full-calendar.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/googlemap-init.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/icon-loader.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/jvectormap-init.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/leaflet-init.js')}}"></script>
   <script src="{{asset('assets/theme_assets/js/main.js')}}"></script>
   <!-- endinject-->
</body>

</html>
