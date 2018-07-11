<!DOCTYPE html>
<html>

<head>
    <title>@yield('title','Sample')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>

    @include('layouts._header')

    <div class="container">
        @include('shared._message')
        @yield('content') 
        @include('layouts._footer')
<<<<<<< HEAD
    </div>
=======
>>>>>>> 170a1cbf99290dede9caaf2aa7d8fb07f1b75935
 

<script src="/js/app.js"></script>
</body>

</html>