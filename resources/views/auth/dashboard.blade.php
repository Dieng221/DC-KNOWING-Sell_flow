@extends('components.layout')

@section('content')

<div class="container-fluid mt-4">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-shield fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Chiffre d'affaire</h5>
                    <p class="card-text display-4">15000000 FCFA</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-shield fa-2x" style="color: green;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total vente</h5>
                    <p class="card-text display-4">12500000 FCFA</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total achat</h5>
                    <p class="card-text display-4">2500000 FCFA</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-shield fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nombre de fournisseurs</h5>
                    <p class="card-text display-4">14</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-shield fa-2x" style="color: green;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nombre de clients</h5>
                    <p class="card-text display-4">51</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-center">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nombre d'administrateurs</h5>
                    <p class="card-text display-4">21</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
       <div class="col-12 mb-30">
          <div class="support-ticket-system support-ticket-system--search">

             <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between ">
                <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                   <div class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                      <h4 class="text-capitalize fw-500 breadcrumb-title">Récapitulatif des dernières ventes</h4>
                   </div>
                </div>

                <!-- Remplacement du bouton d'exportation avec un menu déroulant -->
                <div class="adv-table-table__button">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Sélectionnez...
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 200px; overflow-y: auto;">
                            <li><a class="dropdown-item" href="">Demande emplois</a></li>
                            <li><a class="dropdown-item" href="">Demandes emplois restauration</a></li>
                            <li><a class="dropdown-item" href="">Demande emplois transport</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Fin du menu déroulant -->
             </div>

             <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                <div style="opacity: 0; position: absolute;">
                    <div id="filter-form-container"></div>
                </div>
                <div class="table-responsive">
                   <table class="table mb-0 mt-4 adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                    <thead>
                        <tr class="userDatatable-header">
                           <th><span class="userDatatable-title">Nom du client</span></th>
                           <th><span class="userDatatable-title">Article & Quantité</span></th>
                           <th><span class="userDatatable-title">Montant payer</span></th>
                           <th><span class="userDatatable-title">Adresse de livraison</span></th>
                           <th><span class="userDatatable-title">Date de facturation</span></th>
                           <th><span class="userDatatable-title">Statut</span></th>
                           <th class="actions"><span class="userDatatable-title">Actions</span></th>
                        </tr>
                     </thead>
                      <tbody>
                        @foreach ($sales as $sale)
                                <tr>
                                    <td>
                                       <div class="userDatatable-content">
                                          {{$sale->partner->nom}}
                                       </div>
                                    </td>
                                    <td>
                                        <div class="userDatatable-content">
                                            @foreach ($sale->articles as $article)
                                                {{ $article->libelle }} : {{ $article->pivot->quantite }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                     <div class="userDatatable-content">
                                        {{$sale->montant_payer}} FCFA
                                     </div>
                                  </td>
                                  <td>
                                     <div class="userDatatable-content">
                                        {{$sale->adresse_livraison}}
                                     </div>
                                  </td>
                                  <td>
                                     <div class="userDatatable-content">
                                        {{ $sale->created_at->translatedFormat('d F Y') }}
                                     </div>
                                  </td>
                                    <td>
                                       <div class="userDatatable-content d-inline-block">
                                          <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">En cours</span>
                                       </div>
                                    </td>
                                    <td>
                                       <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                          <li>
                                             <a href="{{route('sales.show', $sale->id)}}" class="view">
                                                <i class="uil uil-eye"></i>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="{{route('sales.edit', $sale->id)}}" class="edit">
                                                <i class="uil uil-edit"></i>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="{{route('sales.delete', $sale->id)}}" class="remove">
                                                <i class="uil uil-trash-alt"></i>
                                             </a>
                                          </li>
                                       </ul>
                                    </td>
                                 </tr>
                                @endforeach
                    </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>

        <div class="row">
       <div class="col-12 mb-30">
          <div class="support-ticket-system support-ticket-system--search">

             <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between ">
                <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                   <div class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                      <h4 class="text-capitalize fw-500 breadcrumb-title">Récapitulatif des derniers achats</h4>
                   </div>
                </div>

                <!-- Remplacement du bouton d'exportation avec un menu déroulant -->
                <div class="adv-table-table__button">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Sélectionnez...
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 200px; overflow-y: auto;">
                            <li><a class="dropdown-item" href="">Demande emplois</a></li>
                            <li><a class="dropdown-item" href="">Demandes emplois restauration</a></li>
                            <li><a class="dropdown-item" href="">Demande emplois transport</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Fin du menu déroulant -->
             </div>

             <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                <div style="opacity: 0; position: absolute;">
                    <div id="filter-form-container"></div>
                </div>
                <div class="table-responsive">
                   <table class="table mb-0 mt-4 adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                      <thead>
                        <tr class="userDatatable-header">
                            <th><span class="userDatatable-title">Nom du fournisseur</span></th>
                            <th><span class="userDatatable-title">Article & Quantité</span></th>
                            <th><span class="userDatatable-title">Montant payer</span></th>
                            <th><span class="userDatatable-title">Adresse de livraison</span></th>
                            <th><span class="userDatatable-title">Date de facturation</span></th>
                            <th><span class="userDatatable-title">Statut</span></th>
                            <th class="actions"><span class="userDatatable-title">Actions</span></th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($purchases as $purchase)
                                <tr>
                                    <td>
                                       <div class="userDatatable-content">
                                          {{$purchase->partner->nom}}
                                       </div>
                                    </td>
                                    <td>
                                        <div class="userDatatable-content">
                                            @foreach ($purchase->articles as $article)
                                                {{ $article->libelle }} : {{ $article->pivot->quantite }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                     <div class="userDatatable-content">
                                        {{$purchase->montant_payer}} FCFA
                                     </div>
                                  </td>
                                  <td>
                                     <div class="userDatatable-content">
                                        {{$purchase->adresse}}
                                     </div>
                                  </td>
                                  <td>
                                     <div class="userDatatable-content">
                                        {{ $purchase->created_at->translatedFormat('d F Y') }}
                                     </div>
                                  </td>
                                    <td>
                                       <div class="userDatatable-content d-inline-block">
                                          <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">En cours</span>
                                       </div>
                                    </td>
                                    <td>
                                       <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                          <li>
                                             <a href="{{route('sales.show', $purchase->id)}}" class="view">
                                                <i class="uil uil-eye"></i>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="{{route('sales.edit', $purchase->id)}}" class="edit">
                                                <i class="uil uil-edit"></i>
                                             </a>
                                          </li>
                                          <li>
                                             <a href="{{route('sales.delete', $purchase->id)}}" class="remove">
                                                <i class="uil uil-trash-alt"></i>
                                             </a>
                                          </li>
                                       </ul>
                                    </td>
                                 </tr>
                                @endforeach
                        </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>
</div>

@endsection
