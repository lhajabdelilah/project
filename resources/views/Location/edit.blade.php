@extends('layouts.app')
@section('content')

{{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-md-12">

<form action="{{url('/Location/{id}/store')}}" method="get"  enctype="multipart/form-data">
    
  
    <div class="form-group @if($errors->get('id')) has-error @endif" >
        <label for="">Votre Nom Et Prenom</label>
        <input type="text" name="nom" class="form-control"  >
        @if($errors->get('nom'))
@foreach($errors->get('nom') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
    </div>

    <div class="form-group @if($errors->get('telephone')) has-error @endif" >
        <label for="">Numero de telephone</label>
        <input type="text" name="telephone" class="form-control"  >
        @if($errors->get('telephone'))
@foreach($errors->get('telephone') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
    </div>


            </div>

        <div class="form-group @if($errors->get('date_d')) has-error @endif">
            <label for="">Date de Debut</label>
            <input type="date"   name="date_d" class="form-control" value="{{old('Model')}}">
            @if($errors->get('date_d'))
            @foreach($errors->get('date_d') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>

        <div class="form-group @if($errors->get('date_f')) has-error @endif">
            <label for="">Date de fin</label>
            <input type="date" name="date_f" class="form-control" value="{{old('Marque')}}">
            @if($errors->get('date_f'))
            @foreach($errors->get('date_f') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
      
        <div class="form-group @if($errors->get('payment')) has-error @endif">
            <label for="">Type De Payment</label>
            <input type="text" name="payment" class="form-control" value="{{old('payment')}}">
            @if($errors->get('payment'))
            @foreach($errors->get('payemt') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
      
        <div class="form-group">
            
            <input type="submit" name="submit" value="Update" class="form-control btn btn-primary">
        </div>
            

</form>



            </div>
        </div>
    </div>
@endsection