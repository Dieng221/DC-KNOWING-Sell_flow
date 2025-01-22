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
                            <li class="breadcrumb-item"><a href="#">Achat</a></li>
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
                    <h6>Effectuer un achat</h6>
                </div>
                <div class="card-body py-md-30">
                    <form method="POST" action="{{ route('purchases.store') }}">
                        @csrf
                        <div class="row">
                            <!-- Client -->
                            <div class="col-md-6 mb-25">
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="partner_id">
                                    <option selected disabled>Selectionnez le fournisseur...</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Numéro de Facture -->
                            <div class="col-md-6 mb-25">
                                <input type="text" name="num_ref" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Facture de référence">
                            </div>

                            <!-- Adresse Facturation -->
                            <div class="col-md-6 mb-25">
                                <input type="text" name="adresse" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Adresse de livraison">
                            </div>

                            <!-- Magasin / Entrepot -->
                            <div class="col-md-6 mb-25">
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="magasin_entrepot">
                                    <option selected disabled>Magasin / Entrepot</option>
                                    <option value="DCK - 001">DCK - 001</option>
                                    <option value="DCK - 002">DCK - 002</option>
                                    <option value="DCK - 003">DCK - 003</option>
                                </select>
                            </div>

                            <!-- Type de Remise -->
                            <div class="col-md-6 mb-25">
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="type_remise">
                                    <option selected disabled>Type de remise...</option>
                                    <option value="Montant fixe">Montant fixe</option>
                                    <option value="Pourcentage">Pourcentage</option>
                                </select>
                            </div>

                            <!-- Valeur de la Remise -->
                            <div class="col-md-6 mb-25">
                                <input type="number" name="valeur_remise" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Valeur de la remise">
                            </div>

                            <!-- Date de Vente -->
                            <div class="col-md-6 form-group mb-25 form-group-calender">
                                <div class="position-relative">
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="date_achat" id="datepicker" placeholder="Date de vente">
                                    <a href="#"><img class="svg" src="{{ asset('img/svg/calendar.svg') }}" alt="calendar"></a>
                                </div>
                            </div>

                            <!-- Montant à Payer -->
                            <div class="col-md-6 mb-25">
                                <input type="number" name="montant_payer" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Montant payer">
                            </div>
                        </div>

                        <!-- Section Produits -->
                        <div id="products-wrapper">
                            <div class="row align-items-center mb-3 product-row">
                                <div class="col-md-3">
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="products[]">
                                        <option selected disabled>Produits...</option>
                                        @foreach ($articles as $article)
                                            <option value="{{ $article->id }}">{{ $article->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="quantities[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Quantité" min="1" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="unit_prices[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prix unitaire" min="0" step="0.01">
                                </div>
                                <div class="col-md-3 layout-button">
                                    <button type="button" class="btn btn-light btn-squared btn-default px-20 add-product">Plus</button>
                                    <button type="button" class="btn btn-danger btn-squared px-30 remove-product">Supprimer</button>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="col-md-6">
                            <div class="layout-button mt-0">
                                <button type="reset" class="btn btn-default btn-squared btn-light px-20">Annuler</button>
                                <button type="submit" class="btn btn-primary btn-default btn-squared px-30">Créer</button>
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
        const container = document.querySelector('#products-wrapper');

        // Options des produits générées par Blade
        const productOptions = `
            @foreach ($articles as $article)
                <option value="{{ $article->id }}">{{ $article->libelle }}</option>
            @endforeach
        `;

        // Créer une nouvelle ligne de produit
        const createProductRow = () => {
            const row = document.createElement('div');
            row.className = 'row align-items-center mb-3 product-row';
            row.innerHTML = `
                <div class="col-md-3">
                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="products[]">
                        <option selected disabled>Produits...</option>
                        ${productOptions}
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="quantities[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Quantité" min="1" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="unit_prices[]" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prix unitaire" min="0" step="0.01">
                </div>
                <div class="col-md-3 layout-button">
                    <button type="button" class="btn btn-light btn-squared btn-default px-20 add-product">Plus</button>
                    <button type="button" class="btn btn-danger btn-squared px-30 remove-product">Supprimer</button>
                </div>
            `;
            addRowEventListeners(row);
            return row;
        };

        // Ajouter les événements aux boutons
        const addRowEventListeners = (row) => {
            row.querySelector('.add-product').addEventListener('click', () => {
                container.appendChild(createProductRow());
            });
            row.querySelector('.remove-product').addEventListener('click', () => {
                if (container.children.length > 1) {
                    row.remove();
                }
            });
        };

        // Ajouter les événements initiaux
        addRowEventListeners(document.querySelector('.product-row'));
    });
</script>

@endsection
