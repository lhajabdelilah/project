@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">Liste des commandes de location de voiture</h1>
    <table class="table table-bordered table-striped">
      <thead class="bg-dark text-white">
        <tr>
         
          <th >Nom et Prénom</th>
          <th>Téléphone</th>
          <th>Date de début</th>
          <th>Date de fin</th>
          <th>IMM Voiture louée</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
              @foreach($loc as $l)
               <tr>
                    <td>{{$l->client_name}}</td>
                    <td>{{$l->Telephone}}</td>
                    <td>{{$l->start_date}}</td>
                    <td>{{$l->end_date}}</td>
                    <td>{{$l->car_id}}</td>
                    <td>{{$l->amount}}</td>
          <td><a  href="{{url('Location/'.$l->id.'/edit')}}"  class="btn btn-primary">Modifier</a></td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
  @endsection