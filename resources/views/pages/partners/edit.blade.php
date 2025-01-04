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
                      <li class="breadcrumb-item active" aria-current="page">Création</li>
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
                <form method="POST" action="">
                    @csrf
                   <div class="row">
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Type de partenariat...</option>
                            <option value="Bim Bara">Client</option>
                            <option value="Bim Livraison">Fournisseur</option>
                            <option value="Bim Dabali">Client & Fournisseur</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Statut du partenaire...</option>
                            <option value="Bim Bara">Individuel</option>
                            <option value="Bim Bara">Entreprise</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_facturation" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Nom ou Raison sociale">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Contact téléphonique">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Ligne fixe">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="email" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Email">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_facturation" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Adresse de l'entreprise">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_facturation" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Adresse de livraison">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Numéro d'identification fiscale">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Solde d'ouverture">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Limite de crédit">
                     </div>
                     <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Condition de paiement...</option>
                            <option value="Bim Bara">Journées</option>
                            <option value="Bim Bara">Mois</option>
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
