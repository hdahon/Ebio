@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include("menu")
                <div class="panel-body">
                    Bienvenue Sur la pages de gestion des <b>PRODUIT</b>
                    <br>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Produit</th>
                            <th>Referent</th>
                            <th>Producteur</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($name as $row)
                        <tr>
                            <td>
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$row->referent->nom}}
                            </td>
                            <td>
                                {{$row->producteur->nom}}
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