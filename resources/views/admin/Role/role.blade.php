@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>nomRole</th>
                            <th>niveau</th>
                            <th><a href="{{ url('create-roles') }}" title="Ajouter">[ AJOUTER ]</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $row)
                        <tr>
                            <td>
                                {{$row->nomRole}}
                            </td>
                            <td>
                                {{$row->niveau}}
                            </td>
                            <td>
                                <a href="{{ url('delete-roles/'.$row->id) }}" title="Supprimer">[ SUPPRIMER ]</a>
                                -
                                <a href="{{ url('update-roles/'.$row->id) }}" title="Modifier">[ MODIFIER ]</a>
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