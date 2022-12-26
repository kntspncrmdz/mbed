<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

  <script src="{{URL::asset('../assets/js/plugin/webfont/webfont.min.js')}}"></script>

  <script>
    WebFont.load({
      google: {
        "families": ["Lato:300,400,700,900"]
      },
      custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
        urls: ['{{URL::asset("../assets/css/fonts.min.css")}}']
      },
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <link rel="stylesheet" href="{{URL::asset('../assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('../assets/css/atlantis.min.css')}}">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="wrapper">
    @include('layouts.shared.header')
    @include('layouts.shared.sidebar')
    <div class="main-panel">
      <div class="content">
        <!-- Page Content -->
        <main>
          {{ $slot }}
        </main>
      </div>
    </div>
  </div>

  <script src="{{URL::asset('../assets/js/core/jquery.3.2.1.min.js')}}"></script>
  <script src="{{URL::asset('../assets/js/core/popper.min.js')}}"></script>
  <script src="{{URL::asset('../assets/js/core/bootstrap.min.js')}}"></script>

  <!-- jQuery UI -->
  <script src="{{URL::asset('../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
  <script src="{{URL::asset('../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

  <!-- jQuery Scrollbar -->
  <script src="{{URL::asset('../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


  <!-- Chart JS -->
  <script src="{{URL::asset('../assets/js/plugin/chart.js/chart.min.js')}}"></script>

  <!-- jQuery Sparkline -->
  <script src="{{URL::asset('../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

  <!-- Chart Circle -->
  <script src="{{URL::asset('../assets/js/plugin/chart-circle/circles.min.js')}}"></script>

  <!-- Datatables -->
  <script src="{{URL::asset('../assets/js/plugin/datatables/datatables.min.js')}}"></script>

  <!-- Bootstrap Notify -->
  <script src="{{URL::asset('../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

  <!-- jQuery Vector Maps -->
  <script src="{{URL::asset('../assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{URL::asset('../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

  <!-- Sweet Alert -->
  <script src="{{URL::asset('../assets/js/plugin/sweetalert/sweetalert.min.j')}}s"></script>

  <!-- Atlantis JS -->
  <script src="{{URL::asset('../assets/js/atlantis.min.js')}}"></script>
</body>

</html>