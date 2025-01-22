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
                <h6>Ajouter un article</h6>
             </div>
             <div class="card-body py-md-30">
                <form method="POST" action="{{route('articles.update', $article->id)}}">
                    @csrf
                   <div class="row">
                    <div class="col-md-6 mb-25">
                        <input type="text" name="libelle" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$article->libelle}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="quantite" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$article->quantite}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="prix_achat" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$article->prix_achat}}">
                     </div>
                     <div class="col-md-6 mb-25">
                        <input type="number" name="prix_vente" class="form-control ih-medium ip-gray radius-xs b-light px-15" value="{{$article->prix_vente}}">
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
