@extends('template')
@section("title")
    Reférent
    @endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @include("Referent/menu")
                <div class="panel-body">
                    Bienvenue Sur la pages de gestion des <b>PRODUIT</b> de l'adherant ....
                    <br>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Produit</th>
                            <th>Type</th>
                            <th>Periode</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($name as $row)
                        <tr>
                            <td>
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$row->type}}
                            </td>
                            <td>
                                {{$row->periode}}
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