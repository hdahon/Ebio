@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>nomRole</th>
                            <th>niveau</th>
                            <th><a href="{{ url('create-roles') }}" title="Ajouter"  class="btn  btn-success btn-sm">AJOUTER</a></th>
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
                                <a href="{{ url('update-roles/'.$row->id) }}" title="Modifier" class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-roles/'.$row->id) }}" title="Supprimer" class="confirm btn  btn-danger btn-sm">SUPPRIMER</a>
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