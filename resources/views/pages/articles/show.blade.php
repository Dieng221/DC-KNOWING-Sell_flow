@extends('components.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="shop-breadcrumb">

             <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Détails de l'article</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Accueil</a></li>
                         <li class="breadcrumb-item active" aria-current="page"><a href="#">Article</a></li>
                         <li class="breadcrumb-item active" aria-current="page"><a href="#">Détails</a></li>
                      </ol>
                   </nav>
                </div>
             </div>

          </div>
       </div>
    </div>
 </div>


<div class="row">
 <div class="col-md-8 offset-md-2">
   <div class="card">
     <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
              <h5 class="card-title">Id de l'article:</h5>
            </div>
            <div class="col-md-8">
              <p class="card-text">{{$article->id}}</p>
            </div>
          </div>
       <div class="row mb-3">
         <div class="col-md-4">
           <h5 class="card-title">Désignation:</h5>
         </div>
         <div class="col-md-8">
           <p class="card-text">{{$article->libelle}}</p>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-md-4">
           <h5 class="card-title">Quantité:</h5>
         </div>
         <div class="col-md-8">
           <p class="card-text">{{$article->quantite}}</p>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-md-4">
           <h5 class="card-title">Prix d'achat:</h5>
         </div>
         <div class="col-md-8">
           <p class="card-text">{{$article->prix_achat}}</p>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-md-4">
           <h5 class="card-title">Prix de vente:</h5>
         </div>
         <div class="col-md-8">
           <p class="card-text">{{$article->prix_vente}}</p>
         </div>
       </div>
       <div class="row mb-3">
        <div class="col-md-4">
          <h5 class="card-title">Date de création:</h5>
        </div>
        <div class="col-md-8">
            <p class="card-text">{{ $article->created_at->format('d M Y') }}</p>
        </div>
      </div>
       <div class="d-flex text-center mt-4">
         <a href="{{route('articles.list')}}" class="btn btn-outline-secondary me-2">Retour</a>
         <a href="{{route('articles.edit', $article->id)}}" class="btn btn-outline-primary me-2">Modifier</a>
         <a href="{{route('articles.delete', $article->id)}}" class="btn btn-outline-danger">Supprimer</a>
       </div>
     </div>
   </div>
 </div>
</div>



 {{-- <div class="products mb-30">
    <div class="container-fluid">
       <!-- Start: Card -->
       <div class="card product-details h-100 border-0">
          <div class="product-item d-flex p-sm-50 p-20">
             <div class="row">
                <div class="col-lg-5">
                   <!-- Start: Product Slider -->
                   <div class="product-item__image">
                      <div class="wrap-gallery-article carousel slide carousel-fade" id="carouselExampleCaptions" data-bs-ride="carousel">
                         <div>
                            <div class="carousel-inner">
                               <div class="carousel-item active">
                                  <img class="img-fluid d-flex bg-opacity-primary " src="{{asset('img/furniture.jpg')}}" alt="Card image cap" title="">
                               </div>
                               <div class="carousel-item">
                                  <img class="img-fluid d-flex bg-opacity-primary" src="{{asset('img/furniture2.jpg')}}" alt="Card image cap" title="">
                               </div>
                               <div class="carousel-item">
                                  <img class="img-fluid d-flex bg-opacity-primary" src="{{asset('img/furniture3.jpg')}}" alt="Card image cap" title="">
                               </div>
                            </div>
                         </div>

                      </div>
                   </div>
                   <!-- End: Product Slider -->
                </div>
                <div class=" col-lg-7">
                   <!-- Start: Product Details -->
                   <div class=" b-normal-b mb-25 pb-sm-35 pb-15 mt-lg-0 mt-15">
                      <div class="product-item__body">
                         <!-- Start: Product Title -->
                         <div class="product-item__title">
                            <a href="#">
                               <h1 class="card-title">
                                  Table à manger
                               </h1>
                            </a>
                         </div>
                         <!-- End: Product Title -->
                         <div class="product-item__content text-capitalize">
                            <!-- Start: Product Brand -->
                            <span class="product-details-brandName">Catégorie:<span>Electroménager</span></span>
                            <span class="product-details-brandName">Marque:<span>Sam</span></span>
                            <span class="product-desc-price">
                               75000 FCFA</span>

                            <!-- End: Product Brand -->
                            <!-- Start: Product Description -->
                            <p class=" product-deatils-pera">Une table à manger rectangulaire, moderne et élégante,
                                parfaite pour accueillir six convives,
                                fabriquée en bois massif avec un vernis naturel.</p>
                            <!-- End: Product Description -->

                            <!-- Start: Product Stock -->
                            <div class="product-details__availability">
                               <div class="title">
                                  <p>Disponibilité:</p>
                                  <span class="stock">Disponible</span>
                               </div>
                               <div class="title">
                                  <p>Expédition:</p>
                                  <span class="free"> 2500</span>
                               </div>
                            </div>
                            <!-- End: Product Stock -->
                            <!-- Start: Product Quantity -->
                            <div class="quantity product-quantity flex-wrap">
                               <div class="me-15 d-flex align-items-center flex-wrap">
                                  <p class="fs-14 fw-500 color-dark">Quantité:</p>
                                  <span class="fs-13 fw-400 color-light my-sm-0 my-10">540 pièces disponile</span>
                               </div>
                            </div>
                            <!-- End: Product Quantity -->

                         </div>
                      </div>
                   </div>
                   <!-- End: Product Details -->
                </div>
             </div>
          </div>
       </div>
       <!-- End: Card -->
    </div>

 </div> --}}

@endsection
