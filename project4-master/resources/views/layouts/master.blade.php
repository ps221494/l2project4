<html lang="en">

<head>
</head>
@include('layouts/parts.meta')

<body class="container">
    @include('layouts/parts.header')
    <div class="">
        @yield('content')
    </div>
    @include('layouts/parts.footer')
</body>

</html>