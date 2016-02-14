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
                                      <option value="Bi-mensuel semaine paire">Bi-mensuel semaine paire</option>
                                      <option value="Bi-mensuel semaine impaire">Bi-mensuel semaine impaire</option>
                                      <option value="Hebdomadaire">Hebdomadaire</option>
                                      <option value="Ponctuel">Ponctuel</option>
                                      <option value="Mensuel semaine paire">Mensuel semaine paire</option>
                                      <option value="Mensuel semaine impaire">Mensuel semaine impaire</option>
                                      <option value="Hebdomadaire ou Bi-mensuell">Hebdomadaire ou Bi-mensuel</option>
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