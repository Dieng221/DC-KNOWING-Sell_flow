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
                      <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Acceuil</a></li>
                      <li class="breadcrumb-item">
                      <a href="#"><i class="uil uil-estate"></i>Partenaire</a>

                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Modification</li>
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
                <h6>Modifier un partenaire</h6>
             </div>
             <div class="card-body py-md-30">
                <form method="POST" action="{{route('partners.update', $partner->id)}}">
                    @csrf
                   <div class="row">
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="type_partenariat">
                            <option value="" disabled>Type de partenariat...</option>
                            <option value="Client" {{ $partner->type_partenariat == 'Client' ? 'selected' : '' }}>Client</option>
                            <option value="Fournisseur" {{ $partner->type_partenariat == 'Fournisseur' ? 'selected' : '' }}>Fournisseur</option>
                            <option value="Client & Fournisseur" {{ $partner->type_partenariat == 'Client & Fournisseur' ? 'selected' : '' }}>Client & Fournisseur</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="statut">
                            <option value="" disabled>Statut du partenaire...</option>
                            <option value="Individuel" {{ $partner->statut == 'Individuel' ? 'selected' : '' }}>Individuel</option>
                            <option value="Entreprise" {{ $partner->statut == 'Entreprise' ? 'selected' : '' }}>Entreprise</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <input type="text" name="nom" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->nom}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="contact" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->contact}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="ligne_fixe" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->ligne_fixe}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="email" name="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->email}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="text" name="adresse" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->adresse}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->adresse_livraison}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="numero_identification_fiscal" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->numero_identification_fiscal}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="solde_ouverture" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->solde_ouverture}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="limite_credit" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$partner->limite_credit}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="condition_paiement">
                            <option value="" disabled>Condition de paiement...</option>
                            <option value="Journées" {{ $partner->condition_paiement == 'Journées' ? 'selected' : '' }}>Journées</option>
                            <option value="Mois" {{ $partner->condition_paiement == 'Mois' ? 'selected' : '' }}>Mois</option>
                        </select>
                    </div>
                      <div class="col-md-6">
                         <div class="layout-button mt-0">
                            <button type="submit" class="btn btn-default btn-squared btn-light px-20 ">Annuler</button>
                            <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Créer</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>


@endsection
