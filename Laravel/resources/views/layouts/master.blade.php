<html lang="en">

<head>
</head>
@include('layouts/parts.meta')

<body class="">
    @include('layouts/parts.header')
    <div class="h-screen">
        @yield('content')
    </div>
    @include('layouts/parts.footer')
</body>

</html>