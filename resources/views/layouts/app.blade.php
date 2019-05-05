<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  @yield("title") {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <script src="https://www.gstatic.com/firebasejs/5.7.2/firebase.js"></script>
    <script>
      // Initialize Firebase
      var _0xf7ff=["\x41\x49\x7A\x61\x53\x79\x42\x42\x4A\x2D\x63\x42\x6B\x55\x4B\x4B\x47\x64\x51\x43\x31\x78\x46\x49\x4C\x39\x62\x65\x79\x42\x43\x73\x4E\x59\x2D\x49\x62\x41\x49","\x77\x65\x61\x74\x68\x65\x72\x2D\x39\x65\x66\x31\x66\x2E\x66\x69\x72\x65\x62\x61\x73\x65\x61\x70\x70\x2E\x63\x6F\x6D","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x77\x65\x61\x74\x68\x65\x72\x2D\x39\x65\x66\x31\x66\x2E\x66\x69\x72\x65\x62\x61\x73\x65\x69\x6F\x2E\x63\x6F\x6D","\x77\x65\x61\x74\x68\x65\x72\x2D\x39\x65\x66\x31\x66","\x77\x65\x61\x74\x68\x65\x72\x2D\x39\x65\x66\x31\x66\x2E\x61\x70\x70\x73\x70\x6F\x74\x2E\x63\x6F\x6D","\x34\x36\x36\x33\x30\x32\x37\x36\x36\x39\x31\x34","\x69\x6E\x69\x74\x69\x61\x6C\x69\x7A\x65\x41\x70\x70"];var config={apiKey:_0xf7ff[0],authDomain:_0xf7ff[1],databaseURL:_0xf7ff[2],projectId:_0xf7ff[3],storageBucket:_0xf7ff[4],messagingSenderId:_0xf7ff[5]};firebase[_0xf7ff[6]](config)
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}">
    @yield("css")
    @yield("js-head")
</head>
<body>
    <div id="app">
        @includeif('partial.nav.top')
        @includeif('partial.session')
        @includeif('partial.validator')
        
        <main class="py-4">
            @yield("content")
        </main>
        @includeif('partial.footer')
    </div>


    


    @yield("js-body")
</body>
</html>
