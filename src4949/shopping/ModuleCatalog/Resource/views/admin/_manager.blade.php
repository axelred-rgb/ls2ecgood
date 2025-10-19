@extends('layout')

@section('cssimport')

    <link rel="stylesheet" href="{{commun("css/jquery-ui.css")}}">
    <style>
        .card-body ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .card-body .list-group {
            min-height: 20px;
        }

        .card-body .list-group:last-child {
            border: 1px solid #eee;
        }

        .card-body .li .li {
            margin-left: +33px;
        }
    </style>

@show

@section('content')

    <!-- Content -->
    <section id="content" xmlns:v-bind="http://www.w3.org/1999/xhtml"
             xmlns:v-on="http://www.w3.org/1999/xhtml"
             class="content">
        <!-- Column Center -->
        <div class="chute chute-center">
            <!-- AllCP Info -->
            <div class="allcp-panels fade-onload">
                <div class="panel" id="spy3">
                    <div class="panel-heading">
                        <div class="topbar-left">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-link">
                                    <strong class="">Menu ({{Category::count()}}) | </strong>
                                </li>
                                <li class="breadcrumb-link">
                                    <a @click="init(category, $index)">Main</a>
                                </li>
                                <li v-for="(cat, $index) in categorytree" class="breadcrumb-link">
                                    <i class="fa fa-angle-right"></i>
                                    <a @click="backtoparent(cat, $index)">@{{cat.name}}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-7">
                <div class="card mb-3">
                    <div class="card-header">

                        <input v-model="search" @keyup="findcategory($event)"
                               placeholder="Rechercher une categorie ..."
                               class="form-control gui-input"/>
                        <button style="position: absolute; right: 20px; top: 7px" type="button"
                                @click="cancelsearch()" class="btn">
                            <i class="fa fa-close "></i>
                        </button>

                        <hr>
                    </div>
                    <div class="card-body">
                        {{--                                        v-sortable--}}
                        <ul id="sortable" class="sortableLists list-group">
                            <li v-for="(category, $index) in categories"
                                v-bind:key="category.id">
                                <div class="dd-handle dd-primary">
                                    <button class="btn btn-link">@{{category.name}} (@{{category.children}})</button>

                                    <span class="pull-right fs11 fw600">
                                        <a v-if="parseInt(category.status)" @click="changestatus(category, 0)"
                                           class="btn list-item  text-success">
                                            <i class="fa fa-circle fs10"></i> Activer
                                        </a>
                                        <a v-if="!parseInt(category.status)" @click="changestatus(category, 1)"
                                           class="btn list-item  text-danger">
                                            <i class="fa fa-circle fs10"></i> Desactiver
                                        </a>
                                        <button v-if="category.children" @click="findchildren(category)" type="button"
                                                class="btn btn-info">
                                            <i class="fa fa-copy"></i></button>
                                        <button @click="edit(category)" type="button" class="btn btn-info">
                                            <i class="fa fa-edit"></i></button>
                                        <button @click="_delete(category, $index)" type="button" class="btn btn-danger">
                                            <i class="fa fa-close"></i></button>

                                    </span>
                                </div>
                            </li>
                        </ul>
                        <div v-if="ll.pagination > 1" class="dataTables_paginate paging_simple_numbers text-right">
                            <ul class="pagination">

                                <li v-for="n in ll.pagination" :class="'page-item '+ highlight(n) ">
                                    <a class="page-link"
                                       v-on:click="nextchildren(n)"
                                       href="#"
                                       data-next="1">@{{ n }}</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-5">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">Edit item</div>
                    <div class="card-body">
                        <form id="frmEdit" class="form-horizontal">
                            <div class="form-group">
                                <label for="text">Nom</label>

                                <input autocomplete="off" v-model="category.name" type="text"
                                       class="form-control " name="text" id="text"
                                       placeholder="Text">

                            </div>
                            <div class="form-group">
                                <label for="text">Menu principal</label>
                                <div class="form-check form-check-inline">
                                    <input v-model="category.main" value="1" class="form-check-input" type="radio"
                                           name="exampleRadios" id="exampleRadios1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input v-model="category.main" value="0" class="form-check-input" type="radio"
                                           name="exampleRadios" id="exampleRadios2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Non
                                    </label>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="href">Parent / @{{categoryparent.name}}</label>
                                <select v-model="category.parent_id" class="form-control item-menu">
                                    <option :value="0">
                                        --- Sélectionner le parent ---
                                    </option>
                                    <optgroup label="Hierarchie supérieur">
                                        <option v-for="(hopcat, $index) in categorytree"
                                                v-bind:value="hopcat.id">
                                            @{{hopcat.name}}
                                        </option>
                                    </optgroup>
                                    <optgroup label="Parent">
                                        <option v-for="(parentcat, $index) in categories"
                                                v-bind:value="parentcat.id">
                                            @{{parentcat.name}}
                                        </option>
                                    </optgroup>
                                </select>
                            </div>
                            <div v-if="category.id" class="form-group">
                                <hr>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link" id="attribute-tab" data-toggle="tab" href="#attribute"
                                           role="tab" aria-controls="attribute" aria-selected="true">Attribute</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="attribute" role="tabpanel"
                                         aria-labelledby="attribute-tab">
                                        <categoty_attribute v-bind:category="category"
                                                            v-bind:attributes="attributes"></categoty_attribute>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button v-if="category.id" @click="update()" type="button" id="btnUpdate"
                                class="btn btn-primary">
                            <i class="fas fa-sync-alt"></i> Update
                        </button>
                        <button v-if="!category.id" @click="create()" type="button" id="btnAdd" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add
                        </button>
                        <button @click="category = {}" type="button" class="btn btn-danger">
                            <i class="fas fa-times"></i> Annuler
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div id="deletebox" class="swal2-container swal2-fade swal2-shown" style="display:none; overflow-y: auto;">
            <div role="dialog" aria-labelledby="swal2-title" aria-describedby="swal2-content"
                 class="swal2-modal swal2-show dv_modal" tabindex="1" style="display: inline-flex;">
                <div style=" width: 100%" class="box-container">
                    <div id="" class="modal-content">
                        <div class="modal-header">
                            <button onclick="model._dismissmodal()" type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">

                            <p>Voulez-vous Supprimer? Ceci supprimera aussi toutes les catégories enfants!</p>
                            <button @click="confirmdelete('all')" type="button" class="btn btn-danger">
                                Supprimer Avec les catégories enfants
                            </button>
                            <button @click="confirmdelete('no')" type="button" class="btn btn-info">
                                Les categories enfant monterons d'une hiérarchie
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Column Center -->
    </section>
    <!-- /Content -->

@endsection
