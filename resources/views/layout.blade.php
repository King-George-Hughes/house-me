<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/d58d3ee06a.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>HouseMe</title>
  </head>
  <style>
    .readmore,
    .categoryup,
    .commentup {
      transition: 0.25s;
    }
  </style>
  <body>
    <!-- NAV BAR -->
    @include('partials._navbar')
    <!-- NAVBAR END -->

    <!-- MAIN AREA -->
    @yield('content')
    <!-- MAIN AREA END -->

    <script src="{{ asset('script/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('script/all.min.js') }}"></script>
    {{-- <script src="{{ asset('script/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      const year = document.querySelector("#year");
      year.textContent = new Date().getUTCFullYear();
    </script>
  </body>
</html>
