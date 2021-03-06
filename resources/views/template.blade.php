
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
    <link  rel="stylesheet" href="{{ URL::asset('assets/css/css.css')}}"></script-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <style type="text/css">
    body{ background: {{ URL::asset("assets/img/agr2.jpg")}} }
    </style> 
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

        $("#form_contratClient").unbind("submit").bind("submit",function(event){
            var fields = $("input[name='produit[]']").serializeArray(); 
            if (fields.length == 0) { 
                alert('Il faut ajouter au moins un produit'); 
                event.stopPropagation();
                event.stopImmediatePropagation();
                return false;
            }
        });



        var _d="";
        $.each($("#ancienneDateLivraison").find("option"),function(index,value){
            _d="";
            _d=new Date($(this).val());
            $(this).val(getFormattedDate(_d));
            $(this).text(getFormattedDate(_d));
        });
});

function recupererPeriodicite(){
    var selected= $("#selected option:selected").attr("id");
    if(selected.toLowerCase() === "ponctuel".toLowerCase()){
        document.getElementById('po').style.visibility="visible";
        document.getElementById('poD').style.visibility="visible";
        alert("good p");
    }
    else if(selected.toLowerCase() === "Bi-mensuel semaine impaire".toLowerCase()){
        document.getElementById('bmi').style.visibility="visible";
        alert("good i");
    }
}

function getFormattedDate(date) {
  var year = date.getFullYear();
  var month = (1 + date.getMonth()).toString();
  month = month.length > 1 ? month : '0' + month;
  var day = date.getDate().toString();
  day = day.length > 1 ? day : '0' + day;
  return year + '-' + month + '-' + day;
}


function dateMax(_dateDeFinLivraison){
    var _d=new Date(_dateDeFinLivraison);
   // alert(getFormattedDate(_d));
    $("#nouvelleDateLivraison").attr("max",getFormattedDate(_d));
}
</script>
</body>
</html>