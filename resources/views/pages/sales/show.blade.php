@extends('components.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="shop-breadcrumb">

             <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Facture</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                   <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Accueil</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Vente</li>
                         <li class="breadcrumb-item active" aria-current="page">Facture</li>
                      </ol>
                   </nav>
                </div>
             </div>

          </div>
       </div>
    </div>
 </div>
 <div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="payment-invoice global-shadow radius-xl w-100 mb-30">
             <div class="payment-invoice__body">
                <div class="payment-invoice-address d-flex justify-content-sm-between">
                   <div class="payment-invoice-logo">
                      <a href="index.html">
                         <img class="dark" src="{{asset('img/logo_h.png')}}" alt="logo">
                         <img class="light" src="{{asset('img/logo_h.png')}}" alt="logo">
                      </a>
                   </div>
                   <div class="payment-invoice-address__area">
                      <address>DC-KNOWING<br> +225 07 67 13 1993<br> support@dc-knowing.com <br>
                         Abidjan, Cocody 7ie Tranche</address>
                   </div>
                </div><!-- End: .payment-invoice-address -->
                <div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                   <div class="d-flex justify-content-center mb-lg-0 mb-25">
                      <div class="payment-invoice-qr__number">
                         <div class="display-3">
                            Facture
                         </div>
                         <p>N° : <span>F642678</span></p>
                         <p>Date : <span>17 Jan, 2025</span></p>
                      </div>
                   </div><!-- End: .d-flex -->
                   <div class="d-flex justify-content-center">
                      <div class="payment-invoice-qr__address">
                         <p>Client:</p>
                         <span>Alpha Service</span><br>
                         <span>Abidjan, Cocody Rivièra 2</span><br>
                         <span>alpha_service@accueil.com</span>
                      </div>
                   </div><!-- End: .d-flex -->
                </div><!-- End: .payment-invoice-qr -->
                <div class="payment-invoice-table">
                   <div class="table-responsive">
                      <table id="cart" class="table table-borderless">
                         <thead>
                            <tr class="product-cart__header">
                               <th scope="col">#</th>
                               <th scope="col">Produit</th>
                               <th scope="col" class="text-end">Prix unitaire</th>
                               <th scope="col" class="text-end">Quantité</th>
                               <th scope="col" class="text-end">Montant total</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <th>1</th>
                               <td class="Product-cart-title">
                                  <div class="media  align-items-center">
                                     <div class="media-body">
                                        <h5 class="mt-0">Table à manger</h5>
                                     </div>
                                  </div>
                               </td>
                               <td class="unit text-end">75000 FCFA</td>
                               <td class="invoice-quantity text-end">1</td>
                               <td class="text-end order">75000 FCFA</td>
                            </tr>
                            <tr>
                               <th>2</th>
                               <td class="Product-cart-title">
                                  <div class="media  align-items-center">
                                     <div class="media-body">
                                        <h5 class="mt-0">Placard</h5>
                                     </div>
                                  </div>
                               </td>
                               <td class="unit text-end">75300 FCFA</td>
                               <td class="invoice-quantity text-end">1</td>
                               <td class="text-end order">75300 FCFA</td>
                            </tr>
                         </tbody>
                         <tfoot>
                            <tr>
                               <td colspan="3"></td>
                               <td class="order-summery float-right border-0   ">
                                  <div class="total">
                                     <div class="subtotalTotal mb-0 text-end">
                                        Total partiel :
                                     </div>
                                     <div class="taxes mb-0 text-end">
                                        réduction :
                                     </div>
                                     <div class="shipping mb-0 text-end">
                                        Frais d'expédition :
                                     </div>
                                  </div>
                                  <div class="total-money mt-2 text-end">
                                     <h6>Total :</h6>
                                  </div>
                               </td>

                               <td>
                                  <div class="total-order float-right text-end fs-14 fw-500">
                                     <p>150300 FCFA</p>
                                     <p>-5000 FCFA</p>
                                     <p>3000 FCFA</p>
                                     <h5 class="text-primary">148300 FCFA</h5>
                                  </div>
                               </td>
                            </tr>
                         </tfoot>
                      </table>
                   </div>
                   <div class="payment-invoice__btn mt-xxl-50 pt-xxl-30">
                      <button type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">
                         <img src="{{asset('img/svg/printer.svg')}}" alt="printer" class="svg">Imprimer</button>
                      <button type="button" class="btn-primary btn rounded-pill px-25 text-white download">
                         <img src="{{asset('img/svg/upload.svg')}}" alt="upload" class="svg">Télécharger</button>
                   </div>
                </div><!-- End: .payment-invoice-table -->
             </div><!-- End: .payment-invoice__body -->
          </div><!-- End: .payment-invoice -->
       </div><!-- End: .col -->
    </div>
 </div>

@endsection
