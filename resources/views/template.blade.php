
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EBIO - @yield('title')</title>
    <!--
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
    -->
    <link href="{{ URL::asset('assets/css/materialize.min.css')}}" rel="stylesheet">


    <!-- Fonts -->
    <!--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{ URL::asset('assets/js/functions.js')}}"></script>

    <![endif]-->
</head>
<body>

@include('header')
<!-- div class="parallax-container">
    <div class="parallax"><img src="{{ URL::asset('assets/img/agr2.jpg')}}"></div>
</div> -->
<div class="section">
@yield('content')

</div>

<!-- <div class="parallax-container">
    <div class="parallax"><img src="{{ URL::asset('assets/img/agr1.jpg')}}"></div>
</div> -->

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/functions.js')}}"></script>
-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/materialize.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/matAction.js')}}"></script>

 
</script>
</body>
</html>