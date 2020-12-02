<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @include('extensions.favicon')
</head>
<body class="text-gray-800 overflow-x-hidden">
@include('layouts.home.navbar')
@yield('content')
</body>
</html>
