@extends('template')
@section("title")
    Mes Paiements
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                    <h1>Bienvenue sur la page de gestion des <b>Paiements</b></h1>
	                    <!-- liste des paiements -->
	                    <table class="table  table-striped">
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
@endsection