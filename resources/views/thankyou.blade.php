@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success" role="alert">
            Thank you for contacting us! We will get back to you soon.
          
        </div>
        <div>  <input type="button"  href="{{url('/')}}" hre class="btn btn-primary" value="Retour"/></div>
    </div>
@endsection
