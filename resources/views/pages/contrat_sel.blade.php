@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        <h1>Bienvenue Sur la pages de selection de <b>CONTRATS</b> </h1>


                        <form method="POST" action="{!! url('contrat/selContrat') !!}" accept-charset="UTF-8">
                        {!! csrf_field() !!} 
                            <div class="row">
                            <div class="input-field col s12">
                                <input type="date" class="datepicker">
                                <label>Choissisez la date de départ</label>
                            </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select multiple>
                                      <option value="" disabled selected>Choissisez vos périodicitées</option>
                                      <option value="1">Pair</option>
                                      <option value="2">Inpair</option>
                                      <option value="3">Spéciale</option>
                                    </select>
                                    <label>Choix de périodicité des livraisons</label>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

@endsection