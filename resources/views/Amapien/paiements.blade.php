@extends('template')
@section("title")
    Mes Paiements
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    Bienvenue sur la page de gestion des <b>Paiements</b>
                    <br>


                    <div>
	                    <!-- liste des paiements -->
	                    <table class="table  table-bordered">
	                        <thead class="thead-inverse">
	                        <tr>
	                            <th></th>
	                            <th></th>
	                            <th></th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        @foreach ($name as $row)
	                        <tr>
	                            <td>
	                                {{}}
	                            </td>
	                            <td>
	                                {{}}
	                            </td>
	                            <td>
	                                {{}}
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