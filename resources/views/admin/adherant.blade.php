@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            @include("menu")
            <div class="panel-body">
                Liste des utilisateurs<br><br>
                <table class="table  table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Rôle</th>
                            <th>Opérations</th>
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
                                <a href="{{ url('referent/adherant/'.$row->id) }}" title="Supprimer">SUPPRIMER</a>
                                -
                                <a href="{{ url('adherant/update/'.$row->id) }}" title="Modifier">MODIFIER</a>
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