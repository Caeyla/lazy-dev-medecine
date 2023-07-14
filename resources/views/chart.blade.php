<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- <script src="./chart.js"></script> --}}
    <title>Chart Sample</title>
</head>
<body>
    <h1>Chart Sample</h1>
    {!! $chart->container() !!}
    {{ $chart->script() }}
</body>
</html>
