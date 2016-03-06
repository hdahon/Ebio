@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            @include("Admin/menu")
            <div class="panel-body">
                <table class="table  table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Rôle</th>
                            <th><a href="{{ url('create-users') }}" title="Ajouter">[ AJOUTER ]</a></th>
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
                                {{$row->email}}
                            </td>
                            <td>
                                {{$row->tel}}
                            </td>
                            <td>
                                {{$row->roleamapien_id}}
                            </td>
                            <td>
                                <a href="{{ url('delete-users/'.$row->id) }}" title="Supprimer">[ SUPPRIMER ]</a>
                                -
                                <a href="{{ url('update-users/'.$row->id) }}" title="Modifier">[ MODIFIER ]</a>
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