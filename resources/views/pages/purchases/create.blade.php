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
                      <a href="#"><i class="uil uil-estate"></i>Achat</a>

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
                <h6>Effectuer un achat </h6>
             </div>
             <div class="card-body py-md-30">
                <form method="POST" action="">
                    @csrf
                   <div class="row">
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Selectionnez le fournisseur...</option>
                            <option value="Bim Bara">ABC Technologie</option>
                            <option value="Bim Livraison">Yes Market</option>
                            <option value="Bim Dabali">Allo Informatique</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Condition de paiement...</option>
                            <option value="Bim Bara">Mois</option>
                            <option value="Bim Livraison">Journées</option>
                        </select>
                    </div>

                      <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_facturation" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Numéro de référence">
                     </div>
                     <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Statut d'achat...</option>
                            <option value="Bim Bara">Commander</option>
                            <option value="Bim Bara">En attente</option>
                            <option value="Bim Livraison">Reçu</option>
                        </select>
                    </div>
                     <div class="col-md-6 mb-25">
                        <input type="text" name="adresse_livraison" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Adresse">
                     </div>
                     <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Magasin / Entrepot...</option>
                            <option value="Bim Bara">DC-KNOWING (BL0001)</option>
                            <option value="Bim Bara">DC-KNOWING (BL0002)</option>
                            <option value="Bim Livraison">DC-KNOWING (BL0003)</option>
                        </select>
                    </div>
                      <div class="col-md-6 mb-25">
                        <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="module">
                            <option selected>Type de remise...</option>
                            <option value="Bim Bara">Montant fixe</option>
                            <option value="Bim Livraison">Pourcentage</option>
                        </select>
                    </div>
                      <div class="col-md-6 mb-25">
                         <input type="number" name="facture" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Valeur de la remise">
                      </div>
                      <div id="products-wrapper">
    <div class="row align-items-center mb-3 product-row">
        <!-- Select Produit -->
        <div class="col-md-3">
            <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="products[]">
                <option selected disabled>Produits...</option>
                <option value="1">Sac</option>
                <option value="2">Ordinateur</option>
                <option value="3">Télévision</option>
            </select>
        </div>

        <!-- Input Quantité -->
        <div class="col-md-3">
            <input type="number" name="quantities[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Quantité" min="1" required>
        </div>

        <!-- Input Valeur de la remise -->
        <div class="col-md-3">
            <input type="number" name="discounts[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prix unitaire" min="0" step="0.01">
        </div>

        <!-- Boutons Plus et Supprimer -->
        <div class="col-md-3 layout-button">
            <button type="button" class="btn btn-light btn-squared btn-default px-20 add-product">Plus</button>
            <button type="button" class="btn btn-danger btn-squared px-30 remove-product">Supprimer</button>
        </div>
    </div>
</div>
                      <div class="col-md-12 form-group mb-25 form-group-calender">
                        <div class="position-relative">
                           <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" id="datepicker" placeholder="Date d'achat">
                           <a href="#"><img class="svg" src="{{asset('img/svg/calendar.svg')}}" alt="calendar"></a>
                        </div>
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

 <script>
   document.addEventListener('DOMContentLoaded', () => {
       // Sélectionne le conteneur des lignes de produits
       const container = document.querySelector('.product-row').parentElement;

       // Fonction pour créer une nouvelle ligne
       const createProductRow = () => {
           const newRow = document.createElement('div');
           newRow.className = 'row align-items-center mb-3 product-row';

           newRow.innerHTML = `
               <div class="col-md-3">
                   <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="products[]">
                       <option selected disabled>Produits...</option>
                       <option value="1">Sac</option>
                       <option value="2">Ordinateur</option>
                       <option value="3">Télévision</option>
                   </select>
               </div>
               <div class="col-md-3">
                   <input type="number" name="quantities[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Quantité" min="1" required>
               </div>
               <div class="col-md-3">
                   <input type="number" name="discounts[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prix unitaire" min="0" step="0.01">
               </div>
               <div class="col-md-3 layout-button">
                   <button type="button" class="btn btn-light btn-squared btn-default px-20 add-product">Plus</button>
                   <button type="button" class="btn btn-danger btn-squared px-30 remove-product">Supprimer</button>
               </div>
           `;

           // Ajoute les gestionnaires d'événements pour les boutons de cette ligne
           addEventListenersToRow(newRow);

           return newRow;
       };

       // Fonction pour ajouter les événements "Plus" et "Supprimer" à une ligne donnée
       const addEventListenersToRow = (row) => {
           row.querySelector('.add-product').addEventListener('click', () => {
               container.appendChild(createProductRow());
           });

           row.querySelector('.remove-product').addEventListener('click', () => {
               if (container.children.length > 1) {
                   row.remove();
               }
           });
       };

       // Ajoute les gestionnaires d'événements à la ligne existante
       addEventListenersToRow(document.querySelector('.product-row'));
   });
</script>


@endsection
