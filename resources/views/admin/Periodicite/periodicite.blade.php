@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            @include("Admin/menu")
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>libelle</th>
                            <th><a href="{{ url('create-periodicites') }}" title="Ajouter">[ AJOUTER ]</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>
                                {{$row->libelle}}
                            </td>
                            <td>
                                <a href="{{ url('delete-periodicites/'.$row->id) }}" title="Supprimer">[ SUPPRIMER ]</a>
                                -
                                <a href="{{ url('update-periodicites/'.$row->id) }}" title="Modifier">[ MODIFIER ]</a>
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