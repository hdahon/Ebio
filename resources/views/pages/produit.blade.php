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
{{--
<!--                     <br><button onclick='getProduits()'>list</button>
 -->--}}
                    <br>
                    <table class="table  table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Produit</th>
                            <th>Referent</th>
                            <th>Produit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($name as $row)
                        <tr>
                            <td>
                                {{$row->nomProduit}}
                            </td>
                            <td>
                                {{$row->referent_id}}
                            </td>
                            <td>
                                {{$row->producteur_id}}
                            </td>
                        </tr>

                         @endforeach       
                        </tbody>
                        </table>
                    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau produit</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/produit/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom Produit</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nom" value="{{ old('produit') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Producteur</label>
                                <div class="col-md-6">
                                    <select class=form-control>
                                        <option value=un>Un</option>
                                        <option value=deux>Deux</option>
                                        <option value=trois>Trois</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">créer</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
        </div>
    </div>
@endsection