@extends('templateImprimer')
@section('content')
<h1>Fiche de distribution du {{$date}}</h1>
            <table class="table table-bordered ">
                    <thead class="thead-inverse">
                        <tr>
                         <th>Amapien</th>   
                       @foreach ($categories as $key => $value)
                            <th>{{$value->libelle}}</th>
                        @endforeach
                         <th>Signature</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                      @foreach ($paniers as $key => $value)
                      <tr>
                         <td>{{$amapiens[$key]->prenom}} {{$amapiens[$key]->nom}}</td> 
                         @foreach ($categories as $k => $v)
                            @if($v->libelle == $catAmapiens[$key]->libelle)
                               
                            <td>X</td>
                            @else 
                                <td></td>
                             @endif     
                        @endforeach  
                        <td></td>
                      </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection