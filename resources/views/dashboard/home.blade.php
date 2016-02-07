@extends('app')

@section('content')

        <div class="row">
            <div class="col ">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        You are logged in! {{$name}}
                    </div>
                </div>
            </div>
        </div>

@endsection