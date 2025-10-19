@extends('layout.layout')
@section('title', 'Page Title')

<?php function style(){ ?>

<?php foreach (\dclass\devups\Controller\Controller::$cssfiles as $cssfile){ ?>
<link href="<?= $cssfile ?>" rel="stylesheet">
<?php } ?>
<?php } ?>

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestionnaire de produit avancé </h1>
        <a href="{{Product::classpath()}}product/index">Retour au mode classique </a>

    </div>
    <hr class="">
    <div id="product-manager" class="row">

        <div class="col col-lg-4  col-md-12">
            <category-manager @detail="loadproduct"></category-manager>
        </div>

        <div class="col col-lg-8  col-md-12 ">

            <h3>@{{ activecategory.menu }}/ @{{ activecategory.name }}</h3>

            <div class="col-lg-12">
                <div class="input-group">
                    <input readonly v-model="searchvalue" @input="findproduct(searchvalue)" type="text" class="form-control"
                           placeholder="Entrez le nom du produit ...">
                    <div class="input-group-append">
                        <button @click="findproduct(searchvalue)" type="button" class="btn btn-info "><i
                                    class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <hr>

            <label class="text-right">
                <button @click="add()" type="button" class="btn btn-success">
                    Ajouter un nouveau produit
                </button>

                <label v-if="parentproduct.id" class="">
                    <button @click="showmenu(parentproduct.menu)" type="button" class="btn btn-info">
                        Retour à la produit parent.
                    </button>
                </label>
            </label>

            <d-spinner v-if="loading_product"></d-spinner>
            <div id="producttable"  >
                <table class=" table table-bordered table-striped table-hover dataTable no-footer">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Désignation</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product, $index) in products"
                        v-bind:key="product.id">
                        <td>@{{product.id}}</td>
                        <td>
                            @{{product.name}}
                        </td>
                        <td>@{{product.price}}
                            <span v-if="product.unit > 1"> / @{{product.unit}} g</span>
                        </td>
                        <td class="text-center">
                            <div style="width: 280px;" class="">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">@{{product.quantity}}</span>
                                    </div>
                                    <input v-model="product.provide" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">@{{product.quantity + parseFloat(product.provide) }}</span>
                                        <button @click="providequantity(product)" class="btn btn-outline-secondary" type="button">Ajouter</button>
                                    </div>
                                </div>
                            </div>
                        </span>
                        </td>
                        <td class="text-center text-info">
                            <button @click="stockexchange(product, 1)" class="btn btn-secondary"><i class="fa fa-exchange"></i> Mouv. du stock</button>
                        </td>
                        <td class="text-center text-info">
                            <button @click="edit(product, $index)" class="btn btn-primary"><i class="fa fa-edit"></i> éditer</button>
                        </td>
                        <!--td @click="_delete(product, $index)" class="text-center text-danger">
                            <i class="fa fa-times"></i>
                        </td-->
                    </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>

        </div>

        <div id="productform" v-if="formbox" class="swal2-container swal2-fade swal2-shown"
             style=" overflow-y: auto;">
            <div role="dialog" class="swal2-modal swal2-show dv_modal" tabindex="1" style="width: 800px">
                <div class="main-card mb-3 card  box-container">

                    <div class="card-header">.

                        <button @click="formbox = false" type="button" class="swal2-close"
                                aria-label="Close this dialog" style="display: block;">×
                        </button>
                    </div>

                    <div class="card-body">
                        <label v-if="parentproduct.id" class="">
                            <button @click="edit(parentproduct)" type="button" class="btn btn-info">
                                Retour à la catégorie parent.
                            </button>
                        </label>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class=""> Selectionnez une Catégorie: </label>
                                    <select v-model="product.category.id" class="form-control">

                                        <option v-for="(category, $index) in categories"
                                                v-bind:key="category.id"
                                                :value="category.id">
                                            @{{category.name}}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=""> Désignation</label>
                                    <input type="text" v-model="product.name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class=""> Prix : </label>
                                    <input type="text" v-model="product.price" class="form-control">
                                </div>
                                <div v-if="!product.base" class="form-group">
                                    <label class=""> Grammage: </label>
                                    <input type="text" v-model="product.unit" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-8">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                            Rêgle & options
                                        </a>
                                    </li>
                                    <li  v-if="!baseproduct.id && !product.countingredient" class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                            Avarie
                                        </a>
                                    </li>
                                    <li  v-if="!baseproduct.id && !product.countingredient" class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                            Correction Stock
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <div v-if="baseproduct.id" class="row form-group">
                                            <div class="col-8">
                                                <label class=""> Estimation de la quantité possible
                                                    <br>
                                                    <small class="">avec le stock actuelle du produit de base : </small></label>

                                            </div>
                                            <div class="col-4 text-center">
                                                @{{ baseproduct.quantity }} => @{{ baseproduct.quantity / product.quantityrule }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label class=""> Ici nous avons les avaries cumulé depuis le dernier inventaire. </label>
                                            </div>
                                            <div class="form-group col-5">
                                                <label class=""> Ajoutez en avarie (déjà @{{ product.quantity_damaged }} produit avariés) : </label>
                                            </div>
                                            <div class="form-group col-5">
                                                <input type="text" v-model="quantity_damaged" class="form-control">
                                            </div>
                                            <div class="form-group col-2">
                                                <button @click="damagequantity()" class="btn"><i class="fa fa-edit"> </i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                        <h3 class=""> La Correction rapide du stock permet de corriger en cas d'erreur.
                                            elle n'est pas considéré comme un approvisionnement. stock actuelle <b> @{{ product.quantity }}</b> </h3>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label class=""> Correction rapide du stock : </label>
                                                <input type="text" v-model="quantity" class="form-control">
                                                <button @click="resetquantity()" class="btn"><i class="fa fa-edit"> </i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button @click="init()" type="button" class="btn btn-danger">Annuler</button>
                        <button v-if="product.id" @click="update()" type="button" class="btn btn-info">
                            Modifier
                        </button>
                        <button v-if="!product.id" @click="create()" type="button" class="btn btn-info">
                            Ajouter
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div id="prodcutstockexchange" v-if="stockbox" class="swal2-container swal2-fade swal2-shown"
             style=" overflow-y: auto;">
            <div role="dialog" class="swal2-modal swal2-show dv_modal" tabindex="1" style="width: 800px" >
                <div class="main-card mb-3 card  box-container">

                    <div class="card-header">.

                        <h4 class="">
                            Mouvement du stock <a href="stockexchange/index"><i class="fa fa-share"></i></a>
                        </h4>

                        <button @click="stockbox = false" type="button" class="swal2-close"
                                aria-label="Close this dialog" style="display: block;">×
                        </button>
                    </div>

                    <div class="card-body">

                            <table class="table table-bordered table-striped table-hover dataTable no-footer">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Utilisateur</th>
                                    <th>Type</th>
                                    <th>Quantité</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(stockexchange, $index) in stockexchanges"
                                    v-bind:key="stockexchange.id">
                                    <td>@{{stockexchange.id}}</td>
                                    <td >
                                        @{{ stockexchange.admin.name }}
                                    </td>
                                    <td >
                                        @{{ stockexchange.type }}
                                    </td>
                                    <td >
                                        @{{ stockexchange.quantity }}
                                    </td>
                                    <td >
                                        @{{ stockexchange.creationdate }}
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot></tfoot>
                            </table>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>

            </div>
        </div>

    </div>
    <script>
        var categories = @json($categories);
    </script>
@endsection

<?php function script(){ ?>

<script src="<?= CLASSJS ?>devups.js"></script>
<script src="<?= CLASSJS ?>model.js"></script>
<script src="<?= CLASSJS ?>ddatatable.js"></script>

<?php foreach (\dclass\devups\Controller\Controller::$jsfiles as $jsfile){ ?>
<script src="<?= $jsfile ?>"></script>
<?php } ?>

<?php } ?>

	