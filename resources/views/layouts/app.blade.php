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
      var _0x8df2=["\x41\x49\x7A\x61\x53\x79\x44\x46\x74\x68\x73\x30\x37\x4E\x6C\x31\x7A\x30\x44\x68\x44\x51\x71\x69\x76\x6C\x79\x44\x46\x63\x69\x6B\x42\x34\x79\x4F\x4F\x76\x73","\x77\x65\x61\x74\x68\x65\x72\x2D\x73\x74\x61\x74\x69\x6F\x6E\x2D\x31\x34\x32\x66\x65\x2E\x66\x69\x72\x65\x62\x61\x73\x65\x61\x70\x70\x2E\x63\x6F\x6D","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x77\x65\x61\x74\x68\x65\x72\x2D\x73\x74\x61\x74\x69\x6F\x6E\x2D\x31\x34\x32\x66\x65\x2E\x66\x69\x72\x65\x62\x61\x73\x65\x69\x6F\x2E\x63\x6F\x6D","\x77\x65\x61\x74\x68\x65\x72\x2D\x73\x74\x61\x74\x69\x6F\x6E\x2D\x31\x34\x32\x66\x65","\x77\x65\x61\x74\x68\x65\x72\x2D\x73\x74\x61\x74\x69\x6F\x6E\x2D\x31\x34\x32\x66\x65\x2E\x61\x70\x70\x73\x70\x6F\x74\x2E\x63\x6F\x6D","\x39\x35\x39\x38\x36\x39\x30\x36\x38\x38\x34\x32","\x69\x6E\x69\x74\x69\x61\x6C\x69\x7A\x65\x41\x70\x70"];
var config={apiKey:_0x8df2[0],authDomain:_0x8df2[1],databaseURL:_0x8df2[2],projectId:_0x8df2[3],storageBucket:_0x8df2[4],messagingSenderId:_0x8df2[5]};
firebase[_0x8df2[6]](config)
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
