@extends('template')
@section('content')
<script>
$(document).ready(function() {
    $(".confirm").click(function(event){
        if(!confirm('Etes vous sûr(e)?')){
            event.stopPropagation();
            event.stopImmediatePropagation();
            return false;
        }
    });
});
</script>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table  table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Contact</th>
                            <th>Rôle</th>
                            <th>Coadherant</th>
                            <th><a href="{{ url('create-users') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adherants as $row)
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
                                {{$roleamapiens[$row->id]->nomRole}}
                            </td>
                             <td>
                                @if($coadherants[$row->id] !="")
                                {{$coadherants[$row->id]->prenom}} {{$coadherants[$row->id]->nom}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('update-users/'.$row->id) }}" title="Modifier" class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-users/'.$row->id) }}" title="Supprimer" class="confirm btn  btn-danger btn-sm">SUPPRIMER</a>
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