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
                      <li class="breadcrumb-item active" aria-current="page">Bilan</li>
                   </ol>
                </nav>
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
                      <h4 class="text-capitalize fw-500 breadcrumb-title">Bilan</h4>
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
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Exporter...
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="max-height: 200px; overflow-y: auto;">
                            <li><a class="dropdown-item" href="">Pdf</a></li>
                            <li><a class="dropdown-item" href="">Csv</a></li>
                           <li><a class="dropdown-item" href="">Print</a></li>
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
                            <th><span class="userDatatable-title">Désignation</span></th>
                            <th><span class="userDatatable-title">Unité</span></th>
                            <th><span class="userDatatable-title">Catégorie</span></th>
                            <th><span class="userDatatable-title">Quantité</span></th>
                            <th><span class="userDatatable-title">Type de taxe de vente</span></th>
                            <th><span class="userDatatable-title">Taxe de vente</span></th>
                            <th><span class="userDatatable-title">Prix d'achat</span></th>
                            <th><span class="userDatatable-title">Prix de vente</span></th>
                            <th><span class="userDatatable-title">Poids</span></th>
                            <th><span class="userDatatable-title">Statut</span></th>
                            <th class="actions"><span class="userDatatable-title">Actions</span></th>
                         </tr>
                      </thead>
                      <tbody>

                                    <tr>
                                       <td>
                                          <div class="userDatatable-content">01</div>
                                       </td>
                                       <td>
                                          <div class="d-flex">
                                             <div class="userDatatable-inline-title">
                                                <a href="" class="text-dark fw-500">
                                                   <h6>Kellie Marquot </h6>
                                                </a>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="userDatatable-content">
                                             john-keller@gmail.com
                                          </div>
                                       </td>
                                       <td>
                                          <div class="userDatatable-content">
                                             Business Development
                                          </div>
                                       </td>
                                       <td>
                                          <div class="userDatatable-content">
                                             Web Developer
                                          </div>
                                       </td>
                                       <td>
                                          <div class="userDatatable-content">
                                             January 20, 2020
                                          </div>
                                       </td>
                                       <td>
                                        <div class="userDatatable-content">
                                           Valeur de test
                                        </div>
                                     </td>
                                     <td>
                                        <div class="userDatatable-content">
                                           Valeur de test
                                        </div>
                                     </td>
                                     <td>
                                        <div class="userDatatable-content">
                                           Valeur de test
                                        </div>
                                     </td>
                                       <td>
                                          <div class="userDatatable-content d-inline-block">
                                             <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                          </div>
                                       </td>
                                       <td>
                                          <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                             <li>
                                                <a href="{{route('articles.show', 1)}}" class="view">
                                                   <i class="uil uil-eye"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="{{route('articles.edit', 1)}}" class="edit">
                                                   <i class="uil uil-edit"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="{{route('articles.delete', 1)}}" class="remove">
                                                   <i class="uil uil-trash-alt"></i>
                                                </a>
                                             </li>
                                          </ul>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>

                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>
                                     <tr>
                                        <td>
                                           <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                           <div class="d-flex">
                                              <div class="userDatatable-inline-title">
                                                 <a href="" class="text-dark fw-500">
                                                    <h6>Kellie Marquot </h6>
                                                 </a>
                                              </div>
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              john-keller@gmail.com
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Business Development
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              Web Developer
                                           </div>
                                        </td>
                                        <td>
                                           <div class="userDatatable-content">
                                              January 20, 2020
                                           </div>
                                        </td>
                                        <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                      <td>
                                         <div class="userDatatable-content">
                                            Valeur de test
                                         </div>
                                      </td>
                                        <td>
                                           <div class="userDatatable-content d-inline-block">
                                              <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                           </div>
                                        </td>
                                        <td>
                                           <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                              <li>
                                                 <a href="{{route('articles.show', 1)}}" class="view">
                                                    <i class="uil uil-eye"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.edit', 1)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                 </a>
                                              </li>
                                              <li>
                                                 <a href="{{route('articles.delete', 1)}}" class="remove">
                                                    <i class="uil uil-trash-alt"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                        </td>
                                     </tr>

                                 </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
