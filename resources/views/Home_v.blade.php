@extends('layouts.master')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        
        @foreach($voi as $v)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="height:95%;">
           
            <img src="{{'storage/'.$v->photos}}" class="card-img-top mb-4 shadow-sm"  style="height:50%;" alt="sorry"  >
            <div class="card-body">
             
        <div class="d-flex justify-content-between align-items-center">
                <div style="margin-left:2%;text-align:center;">
                  <x-pepicon-persons style="height:25px;width:25px"/><br>
                {{$v->nbp}}
                </div>
                <div style="margin-left:10%;text-align:center;">
                  <x-bi-speedometer style="height:25px;width:25px" /><br>
                {{$v->Puissance}}
                </div>
              <div style="margin-left:10%;text-align:center;">
                <x-far-money-bill-alt style="height:25px;width:25px" />
                {{$v->Cous_par_jour}}
              </div>
                
            <div style="margin-left:5%;text-align:center;" >   <x-elusive-car  style="height:25px;width:25px"/>
                <br>
          <div > {{$v->Marque}}</div>
            </div>
                
                <br>
               
                
              </div>
            </div>


            <div class="btn-group">
              <a href="{{url('Voiture/'.$v->id.'/show')}}" class="btn btn-sm btn-outline-secondary  btn btn-primary">View</a>
              <a href="{{'/Location/{id}/create'}}" class="btn btn-sm btn-outline-secondary btn btn-primary" > Réserve</a>
            </div>


          </div>
        </div>
        @endforeach
      </div>
      <div class="pagination-links" style=" margin-top: 20px; margin-left: 500px; " >
        {{ $voi->links('pagination::bootstrap-4', ['prev_text' => '&laquo; Précédent', 'next_text' => 'Suivant &raquo;']) }}
    </div>
    
</div>
@endsection