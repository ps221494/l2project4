<html lang="en">

<head>

</head>
@include('layouts/parts.meta')

<body class="">
    @include('layouts/parts.header')
    <div>
        @yield('content')
    </div>
    @livewireScripts
    @include('layouts/parts.footer')
    
</body>

</html>