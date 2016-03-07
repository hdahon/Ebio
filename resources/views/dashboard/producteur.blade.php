@extends('template')
@section('content')
        <div class="row">
            <div class="col-md-12">
                        <h1>Bienvenue sur la page {{$prod->nom}}</b></h1>
   
                        Voici vos informations: 
                        <ul>
                            <li>Votre nom : {{$prod->nom}}</li>
                            <li>Votre prénom : {{$prod->prenom}}</li>
                            <li>Votre mail: {{$prod->email}}</li>
                            <li>Votre numéro de téléphone: {{$prod->tel}}</li> 
                            <li>Votre rôle au sein de l'association :  </li>
                        </ul>

                        <h2>Voici les informations de votre conjoint: </h2>
                        <ul>
                            <li>Votre nom : {{$prod->nomCAdherant}}</li>
                            <li>Votre prénom : {{$prod->prenomCAdherant}}</li>
                            <li>Votre mail: {{$prod->emailCAdherant}}</li>
                            <li>Votre numéro de téléphone: {{$prod->telCAdherant}}</li> 
                        </ul>
                        </ul>  

                        </tbody>
                        </table>
            </div>
        </div>

@endsection