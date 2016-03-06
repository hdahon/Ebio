@extends('template')

@section('content')

        <div class="row">
            <div class="col-md-12">
                        You are logged in! {{$user->nom}}
                </div>
            </div>
        </div>

@endsection