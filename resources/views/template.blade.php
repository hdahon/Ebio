
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#333">
    <link rel="icon" type="image/png" href="./data/logo.ico"/>
    <link rel="icon" sizes="192x192" href="./data/logo.ico">
    <title>EBIO - @yield('title')</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!--script src="{{ URL::asset('assets/js/functions.js')}}"></script-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    @include('header')
    <div class="container">
        @yield('content')
    </div>
    <script type="text/javascript">
    $(function(){
        $(".confirm").click(function(event){
            if(!confirm('Etes vous sûr(e)?')){
                event.stopPropagation();
                event.stopImmediatePropagation();
                return false;
            }
        });

        // ----- SCRIPT POUR : newAdherant.blade.php
        //alert("ok");
        if ($("#roleamapien_id").find("option:selected").text()!="PRODUCTEUR"){
            $("#s_adresse").hide();
            $("#s_numSiret").hide();
        }
        $("#roleamapien_id").unbind("change").bind("change",function(){
            var _laVal=$(this).find("option:selected").text();
            console.log(_laVal);
            if (_laVal=="PRODUCTEUR"){
                $("#s_adresse").show();
                $("#s_numSiret").show();
            }else{
                $("#s_adresse").hide();
                $("#s_numSiret").hide();
            }
        })
    });

    </script>
</body>
</html>