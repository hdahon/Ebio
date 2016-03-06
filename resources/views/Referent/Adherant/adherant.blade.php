@extends('template')
@section('content')
        <div class="row">

            <div class="col s12">
                        Bienvenue sur la pages de gestion des <b>ADHERANTS</b>
                        <table class="striped">
                        <thead>
                        <tr>
                            <th data-field="nomPrenom">Nom et Prenom</th>
                            <th data-field="contact">Contact</th>
                            <th data-field="coContractant">Co_Contractant</th>
                            <th data-field="Produit">Produit</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach ($adherants as $key =>$row)
                        <tr>
                            <td>
                                {{$row->prenom." ".$row->nom}}
                            </td>
                            <td>
                                {{$row->email}}
                                <br>
                                {{$row->tel}}
                            </td>
                            <td>
                                @if($coadherants[$key] !='')
                                {{$coadherants[$key]->prenom." ".$coadherants[$key]->nom}}
                                <br>
                                {{$coadherants[$key]->email}} <br> {{$coadherants[$key]->tel}}
                                @endif
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