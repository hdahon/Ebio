@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include("menu")
                <div class="panel-body">
                   <h1 class="text-center"> Ajouter un nouveau modèle de contrat</h1>
                    <br>
                    <br>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau Contrat</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/contrat/new') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="form-group">
                                <label class="col-md-6 control-label">Produit</label>
                                <div class="col-md-8">
                                    <select class=form-control name="produit">
                                        @foreach ($produits as $prod)                    
                                        <option value={{$prod->id}}>{{$prod->nomProduit}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-6 control-label">Date de debut</label>
                                <div class="col-md-8 date">
                                    <input class="form-control input-lg" id="inputlg" name="dateDebut" placeholder="yyyy-mm-jj" type="date">
                                    </div>
                                </div>
                        
                         <div class="form-group">
                                <label class="col-md-6 control-label">Date de fin</label>
                                <div class="col-md-8 date">
                                    <input class="form-control input-lg" id="inputlg" name="dateFin" placeholder="yyyy-mm-jj" type="date">
                                    </div>
                                </div>
                             <div class="form-group">
                                <label class="col-xs-6 control-label">Vacances</label>
                                <div class="col-xs-8 date">
                                    <input class="form-control input-lg" id="inputlg" name="vacance" placeholder="yyyy-mm-jj" type="date">
                                    </div>
                                </div>  
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">créer</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
        </div>
    </div>

@endsection