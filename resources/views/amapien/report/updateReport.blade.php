@extends('template')
@section("title")
Report
@endsection
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">MODIFIER</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('report/update') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">livraison_id</label>
                                            <div class="col-md-6">
                                                <input type="text" disabled class="form-control" name="livraison_id" value="{{$livraison_id}}" >
                                            </div>
                                        </div>

                                        <!--div class="form-group">
                                            <label class="col-md-4 control-label">user_id</label>
                                            <div class="col-md-6">
                                                <input type="text" disabled class="form-control" name="user_id" value="{{$user_id}}" >
                                            </div>
                                        </div-->

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">ancienneDateLivraison</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name="ancienneDateLivraison" value="{{$ancienneDateLivraison}}" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">nouvelleDateLivraison</label>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" name="nouvelleDateLivraison" value="{{$nouvelleDateLivraison}}" >
                                            </div>
                                        </div>


                                        
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">MODIFIER</button>
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" name="id" value="{{$id}}">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection