<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

    <!-- Favicons -->
    <!-- <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->

    <!-- MDB icon -->
    <link rel="icon" href="{{ asset('bootstrap-md5/img/mdb-favicon.ico') }}" type="image/x-icon" />

    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('bootstrap-md5/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap-md5/css/dev/new-prism.css') }}" />

</head>

<body>

    <div class="container">
        @include('pages.layouts.navbar')

        @yield('content')

        @include('pages.layouts.footer')
    </div>


    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('bootstrap-md5/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <!--  -->

</body>

</html>