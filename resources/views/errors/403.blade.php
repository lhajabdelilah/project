@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md8 col-md-offset-2">
                <h2>Cette page est nest pas autoriser</h2>
                <a href="{{url('/')}}">Retour</a>
            </div>
        </div>
    </div>
@endsection