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
                      <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Home</a></li>
                      <li class="breadcrumb-item">
                      <a href="#"><i class="uil uil-estate"></i>Administrateurs</a>

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
                <h6>Effectuer une vente </h6>
             </div>
             <div class="card-body py-md-30">
                <form method="POST" action="">
                    @csrf
                   <div class="row">
                      <div class="col-md-6 mb-25">
                         <input type="text" name="nom" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Nom">
                      </div>
                      <div class="col-md-6 mb-25">
                         <input type="text" name="prenom"class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prenom">
                      </div>
                      <div class="col-md-6 mb-25">
                         <input type="email" name="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Adresse mail">
                      </div>
                      <div class="col-md-6 mb-25">
                         <input type="text" name="numero" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Numéro">
                      </div>
                      <div class="col-md-6 mb-25">
                        <input type="password" name="password" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Mot de passe">
                     </div>
                      <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Module...</option>
                            <option value="Bim Bara">Bim Bara</option>
                            <option value="Bim Livraison">Bim Livraison</option>
                            <option value="Bim Dabali">Bim Dabali</option>
                            <option value="Bim Market-Event">Bim Market-Event</option>
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
