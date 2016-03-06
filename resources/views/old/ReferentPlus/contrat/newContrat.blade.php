@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include("/ReferentPlus/menu")
                <div class="panel-body">
                   <h2> Ajouter un nouveau modèle de contrat</h2>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('create-contrat') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="form-group">
                                <label class="col-md-6 control-label">Catégorie de produit</label>
                                <div class="col-md-8">
                                    <select class=form-control name="categorie">
                                        @foreach ($categories as $cat)                    
                                        <option value={{$cat->id}}>{{$cat->libelle}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-6 control-label">Date de debut</label>
                                <div class="col-md-8 ">
                                    <input class="form-control input-lg date" name="dateDebut" >
                                    </div>
                                </div>
                        
                         <div class="form-group">
                                <label class="col-md-6 control-label">Date de fin</label>
                                <div class="col-md-8 ">
                                    <input class="form-control input-lg date"  name="dateFin" >
                                    </div>
                                </div>
                             <div class="form-group">
                                <label class="col-xs-6 control-label">Vacances</label>
                                <div class="col-xs-8 ">
                                    <input class="form-control input-lg date"  name="vacance" >
                                    </div>
                                </div>  
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Ajouter</button>
                                    <a href="{{url('liste-contrat/') }}" class="btn btn-info btn-sm">Annuler</a>                             
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