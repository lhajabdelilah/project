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
        
        <h1> La liste des des clients </h1>
    <div class="pull-right">
    
   </div>

        <table class="table">
            <head>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>created_at</th>
                <th>updated_at</th>
                
            </tr>
            </head>
            <body>
                @foreach ($cl as $v)
                    
            
                <tr>
                    <td>{{$v->name}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->created_at}}</td>
                    <td>{{$v->updated_at}}</td>
                   
                    <td>
                      
                    </td>
                </tr>
                @endforeach
            </body>
        </table>
    </div>
    </div>
</div>


@endsection