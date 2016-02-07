@extends('template')
@section('content')
        <div class="row">
            <div class="col s12">
                        Bienvenue Sur la pages de gestion des <b>ADHERANT</b>
                        <table class="striped">
                        <thead>
                        <tr>
                            <th data-field="nom">Nom</th>
                            <th data-field="prenom">Prenom </th>
                            <th data-field="mail">Email </th>
                            <th data-field="telephone">Telephone</th>
                            <th data-field="cotractant">co-contractant</th>
                            <th data-field="produits">Produits</th>

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

@endsection