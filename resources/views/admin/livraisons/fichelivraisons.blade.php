@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="{{url('list-livraisons/1') }}" class="btn btn-info btn-sm">Retour</a>
                <br>
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                         <th>Amapien</th>   
                       @foreach ($categories as $key => $value)
                            <th>{{$value->libelle}}</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($paniers as $key => $value)
                      <tr>
                         <td>{{$amapiens[$key]->prenom}} {{$amapiens[$key]->nom}}</td> 
                         @foreach ($categories as $k => $value)
                            @if($value->libelle == $catAmapiens[$key]->libelle)
                                <td>O</td>
                            @else 
                                <td>X</td>  
                             @endif     
                        @endforeach  
                      </tr>
                       @endforeach
                    </tbody>
                </table>
                <a href="{{url('imprimer/'.$element->id)}}" class="btn btn-info"> Imprimer</a>
            </div>
        </div>
    </div>
</div>
@endsection