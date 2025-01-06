@extends('components.layout')

@section('content')
   
   <div class="container-fluid mt-4">
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card">

  <div class="card-header d-flex align-items-center justify-content-center">
      <!-- <h1 class="nav-icon uil uil-analytics"></h1> -->
      <i class="fas fa-user-shield fa-2x"></i>

  </div>
      <div class="card-body">

          <h5 class="card-title">Nombre d'Administrateurs</h5>
          <p class="card-text display-4">14</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card">

      <div class="card-header d-flex align-items-center justify-content-center">
      <!-- <h1 class="nav-icon uil uil-analytics"></h1> -->
      <!-- <i class="fas fa-user fa-2x"></i> -->
      <i class="fas fa-user-shield fa-2x" style="color: green;"></i>


  </div>
        <div class="card-body">
          <h5 class="card-title">Administrateurs Actifs</h5>
          <p class="card-text display-4">51</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card">

      <div class="card-header d-flex align-items-center justify-content-center">
      <!-- <h1 class="nav-icon uil uil-user"></h1> -->
      <i class="fas fa-user fa-2x"></i>


  </div>
        <div class="card-body">
          <h5 class="card-title">Utilisateurs Inscrits</h5>
          <p class="card-text display-4">10 802</p>
        </div>
      </div>
    </div>
  </div>


<div class="row">
       <div class="col-lg-12 mb-30">
    <div class="card mt-2">

             <div class="card-body">

             <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                   <div class="table-responsive">
             <div class="adv-table-table__header mb-4">
                         <h4>Récapitulatif des services</h4>
                      </div>
    <div style="opacity: 0; position: absolute;">
                         <div id="filter-form-container"></div>
                        </div>

    <table id="mytable" class="table mt-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-size="10">
                         <thead>
                            <tr class="userDatatable-header">
                               <!-- <th>
                                  <span class="userDatatable-title">id</span>
                               </th> -->
                               <th>
                                  <span class="userDatatable-title">Service</span>
                               </th>

                               <th>
                                  <span class="userDatatable-title">Date de création</span>
                               </th>
                               <th>
                                  <span class="userDatatable-title">Montant générer</span>
                               </th>
                               <th data-type="html" data-name='status'>
                                  <span class="userDatatable-title">statut</span>
                               </th>
                               <th>
                                  <span class="userDatatable-title float-end">Action</span>
                               </th>
                            </tr>
                         </thead>
                         <tbody>

                                    <tr>
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
                                          <div class="userDatatable-content d-inline-block">
                                             <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                          </div>
                                       </td>
                                       <td>
                                          <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                             <li>
                                                <a href="#" class="view">
                                                   <i class="uil uil-eye"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="edit">
                                                   <i class="uil uil-edit"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="remove">
                                                   <i class="uil uil-trash-alt"></i>
                                                </a>
                                             </li>
                                          </ul>
                                       </td>
                                    </tr>
                                    <tr>
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
                                          <div class="userDatatable-content d-inline-block">
                                             <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                          </div>
                                       </td>
                                       <td>
                                          <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                             <li>
                                                <a href="#" class="view">
                                                   <i class="uil uil-eye"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="edit">
                                                   <i class="uil uil-edit"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="remove">
                                                   <i class="uil uil-trash-alt"></i>
                                                </a>
                                             </li>
                                          </ul>
                                       </td>
                                    </tr>
                                    <tr>
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
                                          <div class="userDatatable-content d-inline-block">
                                             <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                          </div>
                                       </td>
                                       <td>
                                          <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                             <li>
                                                <a href="#" class="view">
                                                   <i class="uil uil-eye"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="edit">
                                                   <i class="uil uil-edit"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="remove">
                                                   <i class="uil uil-trash-alt"></i>
                                                </a>
                                             </li>
                                          </ul>
                                       </td>
                                    </tr>
                                    <tr>
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
                                          <div class="userDatatable-content d-inline-block">
                                             <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                          </div>
                                       </td>
                                       <td>
                                          <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                             <li>
                                                <a href="#" class="view">
                                                   <i class="uil uil-eye"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="edit">
                                                   <i class="uil uil-edit"></i>
                                                </a>
                                             </li>
                                             <li>
                                                <a href="#" class="remove">
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
</div>

@endsection
