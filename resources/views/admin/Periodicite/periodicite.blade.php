@extends('template')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>libelle</th>
                            <th><a href="{{ url('create-periodicites') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>
                                {{$row->libelle}}
                            </td>
                            <td>
                                <a href="{{ url('update-periodicites/'.$row->id) }}" title="Modifier"  class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-periodicites/'.$row->id) }}" title="Supprimer" class="btn  btn-danger btn-sm">SUPPRIMER</a>
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