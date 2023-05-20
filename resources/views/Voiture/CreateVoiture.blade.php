@extends('layouts.master')
@section('content')

{{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-md-12">

<form action="{{url('/Voiture/store')}}" method="post"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group @if($errors->get('id')) has-error @endif" >
        <label for="">IMM</label>
        <input type="text" name="id" class="form-control"  value="{{old('id')}}">
        @if($errors->get('id'))
@foreach($errors->get('id') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
    </div>


        <div class="form-group @if($errors->get('CNI')) has-error @endif">
            <label for="">CNI</label>
            <input type="text" name="CNI" class="form-control" value="{{old('CNI')}}">
            @if($errors->get('CNI'))
            @foreach($errors->get('CNI') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>

        <div class="form-group @if($errors->get('Model')) has-error @endif">
            <label for="">Model</label>
            <input type="text"   name="Model" class="form-control" value="{{old('Model')}}">
            @if($errors->get('Model'))
            @foreach($errors->get('Model') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>

        <div class="form-group @if($errors->get('Marque')) has-error @endif">
            <label for="">Marque</label>
            <input type="text" name="Marque" list="marquesList" class="form-control" placeholder="Saisissez une marque de voiture">
            <datalist id="marquesList">
                @foreach ($marques as $marque)
                    <option value="{{ $marque }}">
                @endforeach
            </datalist>
            @if($errors->get('Marque'))
            @foreach($errors->get('Marque') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
        <div class="form-group @if($errors->get('Couleur')) has-error @endif">
            <label for="">Couleur</label>
            <input type="text" name="Couleur" class="form-control" value="{{old('Couleur')}}">
            @if($errors->get('Couleur'))
            @foreach($errors->get('Couleur') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
      
        <div class="form-group @if($errors->get('Puissance')) has-error @endif">
            <label for="">Vitesse Max</label>
            <input type="text" name="Puissance" class="form-control" value="{{old('Puissance')}}">
            @if($errors->get('Puissance'))
            @foreach($errors->get('Puissance') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
        <div class="form-group @if($errors->get('Puissance')) has-error @endif">
            <label for="">Nombre des places</label>
            <input type="number" name="nbp" class="form-control" value="{{old('nbp')}}">
            @if($errors->get('nbp'))
            @foreach($errors->get('nbp') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>




        <div class="form-group @if($errors->get('Categorie')) has-error @endif">
            <label for=""> Categorie</label>
            <input type="text" name="Categorie" class="form-control" value="{{old('Categorie')}}">
            @if($errors->get('Categorie'))
            @foreach($errors->get('Categorie') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
        <div class="form-group @if($errors->get('Cous_par_jour')) has-error @endif">
            <label for="">Cous Par Jour</label>
            <input type="text" name="Cous_par_jour" class="form-control" value="{{old('Cous_par_jour')}}">
            @if($errors->get('Cous_par_jour'))
            @foreach($errors->get('Cous_par_jour') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
        </div>
        <div class="form-group @if($errors->get('Image')) has-error @endif">
            <label for="">Image</label>
            <input type="text" name="Image" class="form-control" value="{{old('Image')}}">
            @if($errors->get('Image'))
            @foreach($errors->get('Image') as $msg)
<li>{{$msg}}</li>
@endforeach
@endif
<div class="form-group ">
    <label for="">photos</label>
    <input type="file" name="image" id="image"  class="form-control" accept="image/*"  >
</div>
        </div>
        <div class="form-group">
            
            <input type="submit" name="submit" value="Submit" class="form-control btn btn-primary">
        </div>
            

</form>



            </div>
        </div>
    </div>
@endsection