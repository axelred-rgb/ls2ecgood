@extends('admin.layout')

@section('cssimport')
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
    <section id="content"
             data-base_url="{{Category::classpath()}}services.php?path="
             xmlns:v-bind="http://www.w3.org/1999/xhtml"
             xmlns:v-on="http://www.w3.org/1999/xhtml"
             class="content">
        <!-- Column Center -->

        <div class="chute chute-center">
            <!-- AllCP Info -->
            <div class="allcp-panels fade-onload">
                <div class="panel" id="spy3">

                    <ul class="nav n">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Available tree: (0) | </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-12">
                        <div class="chute chute-center">
                            <!-- AllCP Info -->
                            <div class="allcp-panels fade-onload">
                                <div class="panel" id="spy3">
                                    <div class="panel-heading">
                                        <div class="topbar-left">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-link">
                                                    <a @click="init(category, $index)">Main</a>
                                                </li>
                                                <li v-for="(cat, $index) in categorytree" class="breadcrumb-link">
                                                    <i class="fa fa-angle-right"></i>
                                                    <a @click="backtoparent(cat, $index)">@{{cat.name}}</a>

                                                    <span class="material-icons" data-toggle="modal" data-target="#exampleModal">create</span>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel">
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

                                <button @click="saveorder()" type="button" class="btn btn-info">
                                    <i class="fa fa-exchange-alt"></i> Save Order
                                </button>

                                <ul id="sortable" class="sortableLists list-group">

                                    <li is="addchild" v-bind:key="'addchild'"
                                        :categories="categories" class="list-group-item"></li>

                                    <li is="childrenTree" v-for="(category, $index) in orderedItems"
                                        v-bind:key="category.id"
                                        :category="category"
                                        :nbitem="orderedItems.length"
                                        :index="$index"
                                        class="list-group-item"></li>

                                </ul>
                                <div v-if="ll.pagination > 1" class="dataTables_paginate paging_simple_numbers text-right">
                                    <ul class="pagination">

                                        <li v-for="n in ll.pagination" :class="'page-item '+ highlight(n) ">
                                            <a class="page-link"
                                               v-on:click="nextitems(n)"
                                               href="#"
                                               data-next="1">@{{ n }}</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style=" position: sticky;  top: 150px;" class="col-md-6">
                        <categoryForm :category="category" inline >
                            <div class="panel">
                                <div class="card-header ">Edit item</div>
                                <div class="card-body">
                                    <form id="frmEdit" class="form-horizontal">

                                        <div class="panel">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general-tab" role="tab"
                                                       aria-controls="home" aria-selected="true">General</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="cont-tab" data-toggle="tab" href="#content-tab" role="tab"
                                                       aria-controls="content" aria-selected="false">Quick content</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#image-tab" role="tab"
                                                       aria-controls="profile" aria-selected="false">Image</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane active" id="general-tab" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="form-group">
                                                        <label for="text">Nom</label>
                                                        <input autocomplete="off" v-model="category.name" type="text"
                                                               class="form-control " name="text" id="text"
                                                               placeholder="Text">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">en</label>
                                                        <input autocomplete="off" v-model="category.name_en" type="text"
                                                               class="form-control "
                                                               placeholder="Text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Url</label>

                                                        <input autocomplete="off" v-model="category.slug" type="text"
                                                               class="form-control " name="text" id="text"
                                                               placeholder="Text">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Ico svg</label>
                                                        <textarea style="min-height: 100px" class="form-control" v-model="category.icon" ></textarea>
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
                                                    <div v-if="category.main == 0" class="form-group">
                                                        <label for="href">Parent / @{{categoryparent ? categoryparent.name : ""}}</label>
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
                                                            <optgroup label="Définir comme enfant de :">
                                                                <option v-for="(parentcat, $index) in chain"
                                                                        v-bind:value="parentcat.id">
                                                                    @{{parentcat.name}}
                                                                </option>
                                                            </optgroup>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="content-tab" role="tabpanel" aria-labelledby="content-tab">
                                                    <div class="form-group">
                                                        <label for="text">Content</label>
                                                        <textarea style="min-height: 300px" class="form-control" v-model="category.content" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="image-tab" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row" >
                                                        <div v-for="(image, $index) in category.images" class="col-lg-2" >
                                                            <button @click="deleteimage(image, $index)" >x</button>
                                                            <img width="100%" :src="image.show" />
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <input type="file" @change="uploadimage($event)">
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
                                    <button v-if="category.id" @click="update(true)" type="button" id="btnUpdate"
                                            class="btn btn-primary">
                                        <i class="fas fa-sync-alt"></i> Update & quit
                                    </button>
                                    <button v-if="!category.id" @click="create()" type="button" id="btnAdd" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button @click="category = {}" type="button" class="btn btn-danger">
                                        <i class="fas fa-times"></i> Annuler
                                    </button>
                                </div>
                            </div>
                        </categoryForm>
                    </div>

                </div>

            </div>
        </div>
        <!-- /Column Center -->
    </section>
    <!-- /Content -->

@endsection
