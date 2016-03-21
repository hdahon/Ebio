@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <h2>Liste des amapiens</h2>
                        <table  class="table  table-bordered table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Contact</th>
                            <th>Coadherant</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($adherants as $key =>$row)
                        <tr>
                            <td>
                                {{$row->nom}}
                            </td>
                            <td>
                                {{$row->prenom}}
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
                        </tr>
                         @endforeach       
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection