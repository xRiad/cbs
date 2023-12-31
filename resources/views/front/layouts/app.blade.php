<!DOCTYPE html>
<html lang="en">
<x-front.head></x-front.head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>CBS</title>
  <link rel="stylesheet" href="{{ asset('assets/front/css/common/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/common/main.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/media/header.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/front/css/components/footer.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield('links')
  @stack('styles')
</head>

<body>
  <x-front.header></x-front.header>
  @yield('content')
  <x-front.footer></x-front.footer>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @stack('scripts')
  <script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> --}}
</body>
</html>
