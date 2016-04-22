@extends('template')
@section('content')
<script>
</script>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                 <div class="table-responsive">    
                <table class="table table-bordered table-striped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Libellé</th>
                            <th><a href="{{ url('create-typepanier') }}" title="Ajouter" class="btn  btn-success btn-sm">AJOUTER</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elements as $row)
                        <tr>
                            <td>
                                {{$row->libelle}}
                            </td>
                            <td>
                                <a href="{{ url('update-typepanier/'.$row->id) }}" title="Modifier"  class="btn  btn-warning btn-sm">MODIFIER</a>
                                <a href="{{ url('delete-typepanier/'.$row->id) }}" title="Supprimer" class="confirm btn  btn-danger btn-sm confirm">SUPPRIMER</a>
                            </td>
                        </tr>
                        @endforeach       
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
