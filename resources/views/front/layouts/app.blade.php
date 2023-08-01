<!DOCTYPE html>
<html lang="en">
<x-front.head></x-front.head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CBS</title>
  <link rel="stylesheet" href="{{ 'assets/front/css/components/header.css' }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/components/media/header.css' }}">
    <link rel="stylesheet" href="{{ 'assets/front/css/components/footer.css' }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/common/reset.css' }}">
  <link rel="stylesheet" href="{{ 'assets/front/css/common/main.css' }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield('links')
    @stack('styles')
</head>
<body>
  <x-front.header></x-front.header>
  @yield('content')
  <x-front.footer></x-front.footer>
  @stack('scripts')
</body>
</html>
