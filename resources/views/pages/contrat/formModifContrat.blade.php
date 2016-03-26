@extends('template')
@section("title")
    Reférent
 @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                   <h2> Modification du modèle de contrat</h2>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modification-contrat</div>
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

                        <form role="form" method="POST" action="{{ url('modifier-contrat/'.$contrat->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="form-group">
                                <label class="col-md-6 control-label">Catégorie de produit</label>
                                
                                    <select class=form-control name="categorie">
                                        @foreach ($categories as $cat)  
                                        @if($cat->id == $contrat->categorie_id)
                                         <option selected value={{$cat->id}}>{{$cat->libelle}}</option>
                                        @else                  
                                        <option value={{$cat->id}}>{{$cat->libelle}}</option>
                                        @endif
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="dateDebut">Date de debut</label>
                                
                                    <input class="form-control input-lg date " type="date" value="{{$dateDebut}}" placeholder="jj-mm-yyyy" name="dateDebut" >
                                    
                                </div>
                        
                         <div class="form-group">
                                <label class="control-label">Date de fin</label>
                                    <input class="form-control input-lg date" type="date" value="{{$dateFin}}"  placeholder="jj-mm-yyyy"  name="dateFin"  >
                                </div>
                             <div class="form-group">
                                <label class="control-label">Vacance</label>
                                    <input class="form-control input-lg date" type="date" value="{{$vacance}}"  placeholder="jj-mm-yyyy"   name="vacance" >
                                </div>  
                              <div class="form-group">
                                <label class="control-label">Vacance</label>
                                    <input class="form-control input-lg date" type="date" value="{{$vacance1}}"  placeholder="jj-mm-yyyy"   name="vacance1" >
                                </div>  
                              <div class="form-group">
                                <label class="control-label">Vacance</label>
                                    <input class="form-control input-lg date" type="date"  value="{{$vacance2}}" placeholder="jj-mm-yyyy"   name="vacance2" >
                                </div>  
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Modifier</button>
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