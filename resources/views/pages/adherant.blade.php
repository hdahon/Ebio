@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("menu")
                    <div class="panel-body">
                        Bienvenue Sur la pages de gestion des <b>ADHERANT</b>
                         <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>co-contractant</th>
                            <th>Produits</th>

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
                                <a href="{{ url('adherant/coContractant') }}">Voir</a>
                            </td>
                            <td>
                                <a href="{{ url('produit/produitAdherant/'.$row->id) }}">Voir</a>
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