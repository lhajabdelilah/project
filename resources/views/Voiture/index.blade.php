@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


        
            @if(session()->has('success')) 

            <div class="alert alert-success">
               {{session()->get('success')}}
            </div>
            @endif
        
        <h1> La liste des Voitures </h1>
    <div class="pull-right">
     <a href="{{url('Voiture/create')}}" class="btn btn-success">New Voiture</a>
   </div>

        <table class="table">
            <head>
            <tr>
                <th>Marque</th>
                <th>Model</th>
                <th>Couleur</th>
                <th>Puissance</th>
                <th>Categorie</th>
                <th>Cous_par_jour</th>
            </tr>
            </head>
            <body>
                @foreach ($voi as $v)
                    
            
                <tr>
                    <td>{{$v->Marque}}</td>
                    <td>{{$v->Model}}</td>
                    <td>{{$v->Couleur}}</td>
                    <td>{{$v->Puissance}}</td>
                    <td>{{$v->Categorie}}</td>
                    <td>{{$v->Cous_par_jour}}</td>
                    <td>
                      
                        <form action="{{url('Voiture/'.$v->id.'/destroy')}}" method="post">
                              
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <a href=""class="btn btn-primary">Details</a>
                            <a href="{{url('Voiture/'.$v->id.'/edit')}}" class="btn btn-default">editer</a>
    

                           
                        <input  type="submit" class="btn btn-danger" value="Suprimer" />
                        </form>
                    </td>
                </tr>
                @endforeach
            </body>
        </table>
    </div>
    </div>
</div>


@endsection