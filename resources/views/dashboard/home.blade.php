@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    @include('sidebar')
                    <div class="panel-body">
                        You are logged in! {{$name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection