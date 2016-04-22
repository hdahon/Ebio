@extends('template')
@section('content')
<?php
    $role = Auth::user()->roleamapien_id;
?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">    
                <table class="table  table-bordered  table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Contact</th>
                            <th>Rôle</th>
                            <th>Co-contractant</th>
                            @if($role!="4")
                            <th>
                                <a href="{{ url('create-users') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a>
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adherants as $key => $row)
                        <tr>
                            <td>
                                {{$row->nom}}
                            </td>
                            <td>
                                {{$row->prenom}}
                            </td>
                            <td>
                                {{$row->email}}<br>
                                {{$row->tel}}
                            </td>
                            <td>
                                {{$roleamapiens[$key]->nomRole}}
                            </td>
                             <td>
                                @if($coadherants[$key] !="")
                                {{$coadherants[$key]->prenom}} {{$coadherants[$key]->nom}}
                                @endif
                            </td>
                            @if($role!="4")
                            <td>
                                <a href="{{ url('update-users/'.$row->id) }}" title="Modifier" class="btn  btn-warning btn-sm">MODIFIER</a>
                                @if($roleamapiens[$key]->nomRole !="Role_ADMIN")
                                <a href="{{ url('delete-users/'.$row->id) }}" title="Supprimer" class="confirm btn  btn-danger btn-sm confirm">SUPPRIMER</a>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach       
                    </tbody>
                </table>
            </div>
                <div class="pagination"><?php echo  $adherants->render();  ?> </div>   

            </div>
        </div>
    </div>
</div>
@endsection
