@extends('layouts.master')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">

     <div> <a class="btn btn-success" href="{{url('/')}}">Retour</a></div>
      <div class="row">
        @foreach($voi as $v)
        <div class="col-md-4" style="height:90%">
          <div class="card mb-4 shadow-sm">
           
            <img src="{{asset('storage/'.$v->photos)}}" class="card-img-top mb-4 shadow-sm" alt="sorry" style="height:90%" >
            <div class="card-body">
              <p class="card-text">
                lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <x-bi-speedometer /><br>
                {{$v->Puissance .'km/h'}}
                </div>

                 <div style="margin-left:5%;text-align:center;" >   <x-elusive-car  style="height:10%;width:10%"/>
                      <div> 
                             {{$v->Marque}}
                      </div>
                 </div>
                
              
               
              </div>
            </div>

            <div class="btn-group">
              <a href="{{url('Voiture/'.$v->id.'/show')}}" class="btn btn-sm btn-outline-secondary  btn btn-primary">View</a>
              <button type="button" class="btn btn-sm btn-outline-secondary btn btn-primary">Edit</button>
            </div>

          </div>
        </div>
        @endforeach
      </div>
</div>
</body>
</html>
   
@endsection