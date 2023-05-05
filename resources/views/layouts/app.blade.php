<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kamba one and only stream') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="{{asset('jplayer.blue.monday.min.css')}}" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('jquery.jplayer.js')}}"></script>
        <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function(){
        
            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        title: "samakw'o radio ..Press to Stream",
                        m4a: "http://http://127.0.0.1:8001/stream",
                        oga: "http://jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
                    });
                },
            swfPath: "{{ asset('jplayer') }}",
                supplied: "m4a, oga",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                remainingDuration: true,
                toggleDuration: true
            });
        });
        //]]>
        </script>
        <script>
        $(document).ready(function() {
          var randomNumber = Math.floor(Math.random() * 9000) + 1001;
          $("#random-number").html(randomNumber);
        });
        
        </script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
