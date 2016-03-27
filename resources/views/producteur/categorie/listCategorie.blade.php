@extends('template')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h2>Liste des catégories </h2>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse text-center">
                        <tr >
                            <th>Catégorie</th>
                            <th>Periodicite</th>
                            <th>Producteur</th>
                            <th>Referent</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @foreach ($categories as $key => $row)
                        <tr>
                            <td>
                                {{$row->libelle}}
                            </td>
                            <td>@if(count($periodicites)>0)
                                    {{$periodicites[$row->id]->libelle}}<br>
                                @endif
                                @if(count($periodicites2[$row->id])>0)
                                {{$periodicites2[$row->id]->libelle}}<br>
                                @endif
                                @if(count($periodicites3[$row->id])>0)
                                {{$periodicites3[$row->id]->libelle}}
                                @endif
                            </td>
                             <td>
                                {{$producteurs[$row->id]->prenom." ".$producteurs[$row->id]->nom}}
                            </td>
                            <td>
                                {{$referents[$row->id]->prenom.' '.$referents[$row->id]->nom}}
                            </td>
                            <td>
                                 <a href="{{ url('categorie-details/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>
                                 @if(session('role')>=3)
                                 <a href="{{ url('categorie-modifier/'.$row->id) }}" class="btn  btn-info btn-sm">Modifier</a>
                                 <a href="{{ url('supprimer-categorie/'.$row->id) }}" class="btn  btn-danger btn-sm confirm">Supprimer</a>
                                 @endif
                            
                            </td>
                        </tr>

                         @endforeach       
                        </tbody>
                        </table>
    </div>
    </div>
        </div>
    </div>
@endsection