<?php  

<<<<<<< HEAD
    if(Session::has('role') and Auth::check()){
        $niveau = session('role');
    } else {
        $niveau = 0;
         Auth::logout();
    }
=======
if(Session::has('role') and Auth::check()){
    $niveau = session('role');
} else {
    $niveau = 0;
}
>>>>>>> b8719925554ad1ba36752759cde660824abf570a

?>

<nav class="navbar navbar-inverse container-fluid">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="{{ url('dashboard/home') }}" class="navbar-brand">Amap de Garbejaire</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
        </button>

<<<<<<< HEAD
    
        <div class="collapse navbar-collapse">
=======
        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
>>>>>>> b8719925554ad1ba36752759cde660824abf570a
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accueil <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if (!$niveau)
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('auth/login') }}">Login</a></li>
                        <li><a href="{{ url('auth/register') }}">Register</a></li>
                        @else 
                        <li><a href="{{ url('dashboard/home') }}">Home</a></li>
                        <li><a href="{{url('auth/logout')}}">Se déconnecter</a></li>
                        @endif
                    </ul>
                </li>
               <!-- MENUE AMAPIEN  --> 
                    @if($niveau == 1)
                        @include("amapien/menu")                          
                    @endif
                    <!-- MENUE PRODUCTEUR -->
                    @if($niveau == 2)
                        @include("producteur/menu")
                    @endif
                    <!-- MENUE REFERENT -->
                    @if($niveau == 3)
                        @include("referent/menu")
                    @endif
                    <!-- MENUE REFERENT PLUS -->
                    @if($niveau == 4)
                        @include("referentPlus/menu")
                    @endif
                <!-- MENUE ADMIN -->
                    @if($niveau == 5)
                         @include("admin/menu")
                    @endif
            </ul>
        </div>
    </div>
</nav>