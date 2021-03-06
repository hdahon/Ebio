@extends('template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Inscription</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Prenom</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail </label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tel</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tel" value="{{ old('tel')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom Co-contractant</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nomC" value="{{ old('nomC') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Prenom Co-contractant</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="prenomC" value="{{ old('prenomC') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Co-contractant</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="emailC" value="{{ old('emailC') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tel</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telC" value="{{ old('telC')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Inscription</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection