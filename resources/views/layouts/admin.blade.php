<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('./fontawesome/css/all.min.css') }}">
    <script defer src="{{ asset('./js/bootstrap.min.js') }}"></script>
    <script defer src="{{ asset('./js/admin.js') }}"></script>


</head>
<body>

    @include('components.admin.header')
    @yield('content')
    {{-- @include('components.admin.footer') --}}

</body>

</html>
