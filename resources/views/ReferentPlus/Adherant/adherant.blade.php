@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <!-- @include("/ReferentPlus/menu") -->
                    <div class="panel-body">
                        <h2>Liste des amapiens</h2>
                        <table  class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Nom et Prenom</th>
                            <th>Contact</th>
                            <th>Coadherant</th>
                            <th>Contrat</th>
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
            </div>
        </div>

@endsection