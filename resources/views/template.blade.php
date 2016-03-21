
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
        if ($("#roleamapien_id").find("option:selected").text()!="Role_PRODUCTEUR"){
            $("#s_adresse").hide();
            $("#s_numSiret").hide();
        }
        $("#roleamapien_id").unbind("change").bind("change",function(){
            var _laVal=$(this).find("option:selected").text();
            console.log(_laVal);
            if (_laVal=="Role_PRODUCTEUR"){
                $("#s_adresse").show();
                $("#s_numSiret").show();
            }else{
                $("#s_adresse").hide();
                $("#s_numSiret").hide();
            }
        })



        // ----- SCRIPT POUR : updateAdherant.blade.php
        $("#div_newMDP").hide();
        $("#bt_modifMDP").unbind("click").bind("click",function(){
            console.log($("#chp_newMDP").val());
            if ($("#chp_newMDP").val()=="false"){
                console.log($("#chp_newMDP").val());
                $("#div_oldMDP").hide();
                $("#div_newMDP").show();
                $("#chp_newMDP").val("true");
                $("#bt_modifMDP").text("Annuler");
            }else{
                $("#div_newMDP").hide();
                $("#div_oldMDP").show();
                $("#chp_newMDP").val("false");
                $("#bt_modifMDP").text("Modifier le mot de passe ?");
            }
        });

        $("#bt_saveUpdateAdherant").unbind("click").bind("click",function(){
            if ($("#chp_newMDP").val()=="true"){                
                var _newPassord=$.trim($("#newPassword").val());
                var _newPassord2=$.trim($("#newPassword2").val());
                if (!_newPassord || !_newPassord2){
                    alert("Veuillez saisir un nouveau mot de passe");
                    event.stopPropagation();
                    event.stopImmediatePropagation();
                    return false;
                }else if (_newPassord!=_newPassord2){
                    alert("Les mots de passes saisis doivent être identiques.");
                    event.stopPropagation();
                    event.stopImmediatePropagation();
                    return false;
                }
            }else{
                var _password=$.trim($("#password").val());
                console.log(_password);
                if (!_password){
                    alert("Veuillez saisir un mot de passe");
                    event.stopPropagation();
                    event.stopImmediatePropagation();
                    return false;
                }
            }
        });
    });

calInit("calendarMain", "", "champ_date", "jsCalendar", "day", "selectedDay");
</script>
</body>
</html>