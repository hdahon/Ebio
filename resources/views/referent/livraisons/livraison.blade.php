@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">

                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                           
                            <th>Date de livraison</th>  
                            <th>Semaine</th>                          
                            <th>Action 
                            @if($type == 1)
                             <a class="btn btn-info" href="{{ url('list-livraisons/2') }}">Ancien</a>
                             @elseif($type==2)
                             <a class="btn btn-info" href="{{ url('list-livraisons/1') }}">A Venir</a>
                             @endif

                         </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($livraisons  as $key=> $row)
                        <tr>
                           
                            <td>
                               {{date_format(date_create($row['dateLivraison']),'d-m-Y')}}
                            </td>
                            
                             <td>
                                @if($row->semaine%2 == 0)
                                  Paire
                                @else
                                    Impaire
                                @endif      
                            </td>
                            <td>
                                @if(session('role') ==1)
                                 <a href="{{ url('list-panier/'.$row->id) }}" title="new" class="btn  btn-info btn-sm">Panierr</a>
                                @else
                                <a href="{{ url('editer-livraisons/1/'.$row->id) }}" title="Modifier" class="btn  btn-warning btn-sm">Editer la fiche</a>
<!--                                 <a href="{{ url('delete-livraisons/'.$row->id) }}" title="Supprimer" class="btn  btn-danger btn-sm confirm">SUPPRIMER</a>
 -->                                @endif
                            </td>
                        </tr>
                        @endforeach       
                    </tbody>
                </table>
                 <div class="pagination"><?php echo  $livraisons->render();  ?> </div>   

            </div>
        </div>
    </div>
</div>
@endsection