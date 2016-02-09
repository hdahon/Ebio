extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("ReferentPlus/menu")
                    <div class="panel-body">
                        Bienvenue Sur la pages de gestion des <b>ADHERANT </b>
                         <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Nom et Prenom</th>
                            <th>Contact</th>
                            <th>Co_Contractant</th>
                            <th>Produits</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($adherants as $row)
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
                                {{$row->prenomCAdherant." ".$row->nomCAdherant}}
                                <br>
                                {{$row->emailCAdherant}} <br> {{$row->telCAdherant}}
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