@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('create-paiement') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="form-group">
                                        <div class="col-md-6">
                                            <h3>{{$amapien->prenom}} {{$amapien->nom}} </h3>
                                            <input type="hidden"  class="form-control" name="amapien_id" value="{{$amapien->id}}">
                                        </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-md-6">
                                   <h3>{{$contrat->titre}}</h3>
                                   <input type="hidden"  class="form-control" name="contrat_id" value="{{$contrat->id}}">
                                   <input type="hidden"  class="form-control" name="contratc_id" value="{{$contratclient}}">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre de panier</label>
                                <div class="col-md-6">
                                    <input type="number" id="nbPanier" class="form-control" name="nbPanier" value="{{$nbPanier}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-md-4 control-label">Coût</label>
                                <div class="col-md-6">
                                    <input type="number " id="prix" class="form-control"  name="cout" value="{{$montant}}">
                                </div>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Mois</th>
                                        <th>N°Chèque</th>
                                        <th>Banque</th>
                                        <th>Titulaire</th>
                                        <th>Montant</th>
                                    </tr>
                                 </thead>
                                <tbody>
                                @foreach($mois as $key=>$value)
                                <tr> 
                                 <td> 
                                    <div class="form-group">
                                         <h4 class="text-center">{{ $value}}</h4>
                                         <div class="col-md-6">
                                            <input type="hidden" class="form-control" name="mois[]" value="{{ $value}}">
                                        </div>
                                    </div>
                                    </td> 
                                <td>    
                                     <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="numero[]" value="{{ old('numero') }}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                         <div class="col-md-12">
                                            <input type="text" class="form-control" name="banque[]" value="{{ old('banque') }}">
                                         </div>
                                    </div>
                                </td>    
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="titulaire" value="{{$amapien->prenom}} {{$amapien->nom}}">
                                        </div>
                                    </div> 
                                </td>
                                <td>    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="number" id="montant" class="form-control" name="montant" value="<?php echo $nbPanier*$montant ?>">
                                        </div>
                                    </div> 
                                </td>
                             </tr>
                             @endforeach
                            </tbody>
                            </table> 
                                <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" onclick="test()">Ajouter</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection