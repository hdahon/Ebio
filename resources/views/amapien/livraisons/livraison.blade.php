@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
            <div class="table-responsive">    
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                           
                            <th>Date de livraison</th>
                            <th>Semaine</th>
                            <th>Action
                           
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($livraisons) >0)
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
                                 <a href="{{ url('list-panier/'.$row['id']) }}" title="new" class="btn  btn-info btn-sm">Panierr</a>
                                @else
                                <a href="{{ url('update-livraisons/'.$row['id']) }}" title="Modifier" class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-livraisons/'.$row['id']) }}" title="Supprimer" class="btn  btn-danger btn-sm confirm">SUPPRIMER</a>
                                @endif
                            </td>
                        </tr>
                       
                        @endforeach  
                        @endif     
                    </tbody>
                </table>
            </div>
                 <div class="pagination"><?php echo  $livraisons->render();  ?> </div> 
            </div>
        </div>
    </div>
</div>
@endsection