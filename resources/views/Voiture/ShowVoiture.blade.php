@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Page de location de voiture</title>
</head>

<body>

  <div class="container">
    <h1>Détails de la voiture de location</h1>
    <div class="row">
      <div class="col-lg-6">
        <img src="{{asset('storage/'.$v->photos)}}"  class="img-fluid" alt="Image de la voiture">
      </div>
      <div class="col-lg-6">
        <h2>Information sur la Voiture</h2>
        <p>
Le principe de l'automobile consiste à placer sur un
châssis roulant un groupe motopropulseur et tous les 
 accessoires nécessaires à son fonctionnement. Ces éléments 
 sont contrôlés par le conducteur via des commandes, le plus
souvent sous la forme d'un volant de direction et de pédales
 commandant l'accélération, le freinage et souvent l'embrayage.
Un châssis ou une carrosserie autoporteuse supporte et réunit tous les composants de
 l'automobile. Le châssis est monté sur quatre roues, dont deux sont directrices ou 
 plus rarement les quatre, permettant sa mobilité. Des suspensions réalisent quant à 
 elles une liaison élastique entre le châssis et les roues. Une carrosserie, en partie 
 vitrée, constituant un habitacle fermé muni de sièges, permet le transport de personnes 
 assises, par tout temps tandis que les cabriolets reçoivent une capote ou un toit escamotable.
        </p>
        <ul>
        <strong>  <li>Marque: <h5>{{$v->Marque}}</h5></span></li></strong>
        <strong>  <li>Modèle: <h5>{{$v->Model}}</h5></li></strong>
          <strong>  <li>Couleur: <h5>{{$v->Couleur}}</h5></li></strong>
            <strong><li>Prix par jour: <h5>{{$v->Cous_par_jour}}</h5></li></strong>
        </ul>
        <div class="row">
        @if($v->disponible==1)
        <a class="btn btn-success" href="{{'/Location/{id}/create'}}"> Réserver maintenant</a>
        <a class="btn btn-warning" href="{{'/'}}">Retour</a>
      @endif
      @if($v->disponible==0)
        <a class="btn btn-primary" href="{{'/'}}">deja Réserver</a>
      @endif
        </div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
@endsection