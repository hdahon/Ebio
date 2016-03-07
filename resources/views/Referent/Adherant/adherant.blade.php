@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                        Bienvenue sur la pages de gestion des <b>ADHERANTS</b>
                        <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nom et Prenom</th>
                            <th>Contact</th>
                            <th>Co_Contractant</th>
                            <th>Produit</th>
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
                                <a href="">Voir</a>
                            </td>
                             
                        </tr>

                         @endforeach        
                        </tbody>
                        </table>
            </div>
        </div>

@endsection