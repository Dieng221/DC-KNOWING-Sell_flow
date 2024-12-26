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
                      <li class="breadcrumb-item"><a href="/"><i class="uil uil-estate"></i>Accueil</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Modification de mot de passe</li>
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
                <h6>Modification de mot de passe </h6>
             </div>
             <div class="card-body py-md-30">
                <form>
                   <div class="row">
                      <div class="form-group col-md-12 mb-25">
                        <label for="current-password">Mot de passe actuel</label>
                         <input type="text" id="current-password" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="">
                      </div>
                      <div class="col-md-12 mb-25">
                      <label for="new-password">Nouveau mot de passe</label>
                         <input type="text" id="new-password" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="">
                      </div>
                      <div class="col-md-6">
                         <div class="layout-button mt-0">
                            <!-- <button type="button" class="btn btn-default btn-squared btn-light px-20 ">cancel</button> -->
                            <button type="button" class="btn btn-primary btn-default btn-squared px-30">Enregistrer</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
          <!-- ends: .card -->

       </div>
    </div>
 </div>
@endsection
