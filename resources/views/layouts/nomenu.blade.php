<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Laravel Pharma</title>
    <style>
        .center-text {
            text-align: center;
        }
    </style>
</head>
<body>
   
    @yield('content')

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
