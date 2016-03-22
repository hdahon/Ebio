@extends('template')
@section("title")
Amapien
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>id</th>
                            <th>livraison_id</th>
                            <th>user_id</th>
                            <th>ancienneDateLivraison</th>
                            <th>nouvelleDateLivraison</th>
                            <th><a href="{{ url('create-report') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->livraison_id}}</td>
                            <td>{{$row->user_id}}</td>
                            <td>{{$row->ancienneDateLivraison}}</td>
                            <td>{{$row->nouvelleDateLivraison}}</td>
                            <td>
                                <a href="{{ url('update-report/'.$row->id) }}" title="Modifier"  class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-report/'.$row->id) }}" title="Supprimer" class="confirm btn  btn-danger btn-sm confirm">SUPPRIMER</a>
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