<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="{{asset('js/app.js')}}"></script>

        <title>AtaDigital</title>
    </head>
    <body>
      @include('inc.navbar')
      <nav class="navbar navbar-default "></nav>
      <div class="container">
        @include('inc.messages')
        @yield('content')
      </div>
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script>
        CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>
