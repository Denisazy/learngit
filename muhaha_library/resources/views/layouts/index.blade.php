<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="bozhon library system">
    <meta name="keywords" content="">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <title>博众图书管理系统</title>

    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <link type="text/css" href="{{ asset('images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/theme.css') }}" rel="stylesheet"> 
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>

    @include('layouts.template_navbar')

<div class="wrapper">
    <div class="container">
        <div class="row">

            @include('layouts.template_leftbar')

            <div class="col-md-9">

            @yield('content')

            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>

    @include('layouts.template_footer')
    

</body>
</html>