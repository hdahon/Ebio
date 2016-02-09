@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @include("menu")
                    <div class="panel-body">
                        <br><br>
                          <div class="row drop-shadow">  
                            <h3 class="text-center">Distributions</h3>
                            <table class="table  table-bordered">
                                <thead class="thead-inverse">
                                    <tr>
                                     <th>Semaine Paire</th>
                                     <th>Semaine Impaire</th>
                                     <th>Vacances</th>
                                     </tr>
                                </thead>
                        <tbody>

                            @foreach ($semainePaire as $key => $date)
                                 <tr>
                                    <td>
                                         {{$date}}
                                         <br>
                                    </td>
                                     <td>
                                         {{$semaineImpaire[$key]}}
                                         <br>
                                    </td>
                                    <td> </td>
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