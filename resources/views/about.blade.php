@extends('layouts.app')
@section('content')


<div class="container">
  <h1 class="text-center">A propos de notre entreprise de location de voitures</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <img src="{{asset('assets/images/ima.png')}}" alt="Image de l'entreprise" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2>Notre histoire</h2>
      <p>Nous sommes une entreprise de location de voitures créée en 2010 dans le but de répondre aux besoins croissants des voyageurs et des gens d'affaires à la recherche de solutions de mobilité flexibles. Nous avons débuté modestement avec seulement quelques voitures, mais nous avons rapidement connu une croissance phénoménale grâce à la qualité de nos services et à la satisfaction de nos clients.</p>
      <h2>Notre mission</h2>
      <p>Notre mission est de fournir à nos clients une expérience de location de voitures de qualité supérieure et sans tracas à un prix abordable. Nous offrons une large sélection de véhicules de qualité supérieure, des tarifs compétitifs et un service à la clientèle exceptionnel.</p>
    </div>
  </div>
  <hr>
  <h2 class="text-center">Notre équipe</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="img/team-member-1.jpg" alt="Image de membre d'équipe" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">John Doe</h5>
          <p class="card-text">Directeur général</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="img/team-member-2.jpg" alt="Image de membre d'équipe" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Jane Doe</h5>
          <p class="card-text">Directeur financier</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="img/team-member-3.jpg" alt="Image de membre d'équipe" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Bob Smith</h5>
          <p class="card-text">Directeur des ventes</p>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection