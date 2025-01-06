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
                      <a href="#"><i class="uil uil-estate"></i>Article</a>

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
                <h6>Modifier un article</h6>
             </div>
             <div class="card-body py-md-30">
                <form method="POST" action="">
                    @csrf
                   <div class="row">
                    <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_facturation" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Nom de l'article (Désignation)">
                     </div>
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Unité...</option>
                            <option value="Bim Bara">Pièces (Pc(s))</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Catégorie...</option>
                            <option value="Bim Bara">Electronique</option>
                            <option value="Bim Bara">Maison et décoration</option>
                            <option value="Bim Bara">Vêtement</option>
                        </select>
                    </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Quatité">
                     </div>
                     <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Taxe de vente...</option>
                            <option value="Bim Bara">Aucun</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Type de taxe de vente...</option>
                            <option value="Bim Bara">Compris</option>
                            <option value="Bim Bara">Exclusif</option>
                        </select>
                    </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prix d'achat">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prix de vente">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Poids">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="file" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Image de l'article">
                     </div>
                      <div class="col-md-6">
                         <div class="layout-button mt-0">
                            <button type="submit" class="btn btn-default btn-squared btn-light px-20 ">Annuler</button>
                            <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Envoyer</button>
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
