@extends('components.layout')

@section('content')
   
   <div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">

          <div class="breadcrumb-main">
             <h4 class="text-capitalize breadcrumb-title"></h4>
             <div class="breadcrumb-action justify-content-center flex-wrap">
                <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Accueil</a></li>
                      <li class="breadcrumb-item"><a href="#">Entreprise</a></li>
                      <li class="breadcrumb-item active" aria-current="page">10</li>
                   </ol>
                </nav>
             </div>
          </div>

       </div>
    </div>
    <div class="row">
       <div class="col-lg-12">
          <div class="card card-Vertical card-default card-md mb-4">
             <div class="card-header">
                <h6>Détails de la vente </h6>
             </div>
             <div class="card-body py-md-30">
             <div class="container mt-4">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Nom:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">DC-Knowing</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Secteur d'activité:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">Comptabilité</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Localisation:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">Abidjan, Cocody</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Email:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">dc-knowing@gmail.com</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Contact:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">+225 0778087378</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Statut:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">Actif</p>
            </div>

          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Date d'Enregistrement:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">30/12/2024</p>
            </div>
          </div>
          <div class="d-flex text-center mt-4">
            <a href="" class="btn btn-outline-secondary me-2">Retour</a>
            <a href="" class="btn btn-outline-primary me-2">Modifier</a>
            <a href="" class="btn btn-outline-danger">Supprimer</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
             </div>
          </div>
          <!-- ends: .card -->

       </div>
    </div>
 </div>

@endsection
