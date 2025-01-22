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
                <h6>Détails du partenaire </h6>
             </div>
             <div class="card-body py-md-30">
             <div class="container mt-4">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Nom ou Raison sociale:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$partner->nom}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Type de partenariat:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$partner->type_partenariat}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Statut du partenaire:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$partner->statut}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Contact téléphonique:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$partner->contact}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Ligne fixe:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$partner->ligne_fixe}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Email:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">{{$partner->email}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Adresse de l'entreprise:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">{{$partner->adresse}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Adresse de livraison:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">{{$partner->adresse_livraison}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Numéro d'identification fiscale:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">{{$partner->numero_identification_fiscal}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Solde d'ouverture:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">{{$partner->solde_ouverture}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Limite de crédit:</h5>
            </div>
            <div class="col-md-8">
                  <p class="card-text">{{$partner->limite_credit}}</p>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Condition de paiement:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$partner->condition_paiement}}</p>
            </div>
          </div>
          <div class="d-flex text-center mt-4">
            <a href="{{route('partners.list')}}" class="btn btn-outline-secondary me-2">Retour</a>
            <a href="{{route('partners.edit', $partner->id)}}" class="btn btn-outline-primary me-2">Modifier</a>
            <a href="{{route('partners.delete', $partner->id)}}" class="btn btn-outline-danger">Supprimer</a>
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
