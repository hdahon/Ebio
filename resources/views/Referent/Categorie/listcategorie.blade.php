@extends('template')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-body">
                <h2>Liste des catégories </h2>
                 <div class="table-responsive">    
                <table class="table  table-bordered">
                    <thead class="thead-inverse text-center">
                        <tr >
                            <th>Catégorie</th>
                            <th>Periodicite</th>
                            <th>Producteur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($categories) >0) 
                        @foreach ($categories as $key => $row)
                        <tr>
                            <td>
                                {{$row['libelle']}}
                            </td>
                            <td>
                             @if(count($periodicites) >0) 
                             {{$periodicites[$row->id]->libelle}}
                             @endif
                             @if(count($periodicites2) >0)
                             {{$periodicites2[$row->id]->libelle}}
                             @endif
                             @if(count($periodicites3) >0)
                             {{$periodicites3[$row->id]->libelle}}
                             @endif
                         </td>
                         <td>
                            @if (count($producteurs) >0) 
                            {{$producteurs[$row->id]->prenom." ".$producteurs[$row->id]->nom}}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('categorie-details/'.$row->id) }}" class="btn  btn-info btn-sm">Détails</a>                             
                        </td>
                    </tr>                    
                    @endforeach 
                    @endif
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</div>
@endsection