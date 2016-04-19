@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
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

                        <form  role="form" method="POST" action="{{ url('create-contrat') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                             <div class="form-group">
                                <label for="c">Catégorie de produit</label>
                                
                                    <select class="form-control" id="c" name="categorie">
                                        <option value="" selected>Choix</option>
                                        @foreach ($categories as $cat)                    
                                        <option value={{$cat->id}}>{{$cat->libelle}}</option>
                                        @endforeach
                                        
                                    </select>
                                
                            </div>
                              <div class="form-group">
                                 <div class="col-xs-6">
                                <label class="control-label">Début & fin souscription </label>
                            </div>
                             <div class="col-xs-6">
                                    <input class="form-control " type="date"  placeholder="jj-mm-yyyy"  name="debutS"  >
                                    <br>
                                    <input class="form-control col-sm-5 " type="date"  placeholder="jj-mm-yyyy"  name="finS"  >
                                 </div>   
                                </div>
                             <div class="form-group">
                                <label for="dateDebut">Date de début</label>
                                
                                    <input class="form-control input-lg date " type="date"  placeholder="jj-mm-yyyy" name="dateDebut" >
                                    
                                </div>
                          
                        
                         <div class="form-group">
                                <label class="control-label">Date de fin</label>
                                    <input class="form-control input-lg date" type="date"  placeholder="jj-mm-yyyy"  name="dateFin"  >
                                </div>
                             <div class="form-group">
                                <label class="control-label">Vacances</label>
                                    <input class="form-control input-lg date" type="date"  placeholder="jj-mm-yyyy"   name="vacance" >
                                </div>  
                              <div class="form-group">
                                <label class="control-label">Vacances</label>
                                    <input class="form-control input-lg date" type="date"  placeholder="jj-mm-yyyy"   name="vacance1" >
                                </div>  
                              <div class="form-group">
                                <label class="control-label">Vacances</label>
                                    <input class="form-control input-lg date" type="date"  placeholder="jj-mm-yyyy"   name="vacance2" >
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
