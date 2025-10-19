Vue.component("category-manager", {
    data() {

        return {
            formbox: false,
            activemenu: "food",
            foods: category,
            subcategories: [],
            categories: [],
            category: {},
            index: 0,
            parentcategory: {},
        }

    },
    mounted() {
        this.showmenu("food");

        this.table = $(this.$el).find("#categorytable");
        let height = $(window).height() - 450;
        console.log(height);
        this.table.find('tbody').css("max-height", height);

    },
    methods: {
        showmenu(menu) {
            this.parentcategory = {};
            this.activemenu = menu;

            console.log(this.categories);
            this.formbox = false;
        },

        add(cat) {
            this.formbox = true;
            if(cat){
                this.parentcategory = cat;
                this.category = {};
            }
        },
        create() {
            this.category.menu = this.activemenu;
            this.category.parentid = this.parentcategory.id;
            if(this.category.parentid){
                this.category.main = 0;
            }else{
                this.category.main = 1;
            }

            var data = model.entitytoformentity(this.category);

            model._apipost("category.create", JSON.stringify({category : data}), (response)=>{
                console.log(response);
                if(this.parentcategory.id){
                    this.parentcategory.categories.push(response.category);
                    this.parentcategory.children = 1;

                    this.edit(this.parentcategory)
                }
                else{
                    this.init()
                //     if(this.activemenu === "food")
                //         this.foods.push(response.category);
                //     else if (this.activemenu === "drink")
                //         this.drinks.push(response.category);
                //     else
                //         this.chichas.push(response.category);
                //
                }

            })

        },
        edit(cat, index) {
            this.formbox = true;
            this.category = cat;
            this.parentcategory = {};
            this.index = index;
        },
        subedit(cat, subcat, index) {
            this.formbox = true;
            this.category = subcat;
            this.parentcategory = cat;
        },
        update() {

            this.category.menu = this.activemenu;
            this.category.parentid = this.parentcategory.id;

            var data = model.entitytoformentity(this.category);

            console.log(data);

            model._apipost("category.update?id="+this.category.id, JSON.stringify({category : data}), (response)=>{
                console.log(response);
                if(this.parentcategory.id){
                    this.formbox = false;
                    // this.parentcategory.categories[this.index] = response.category;
                }
                else {
                    this.init()
                //     if (this.activemenu === "food")
                //         this.foods[this.index] = response.category;
                //     else if (this.activemenu === "drink")
                //         this.drinks[this.index] = response.category;
                //     else
                //         this.chichas[this.index] = response.category;
                }

            })

        },
        detail(cat, el) {

            var $el = $(el.target);

            $(this.$el).find("tr").css({
                "background": "none",
            });
            $el.parents("tr").css({
                "background": "#fcb040",
            });
            this.$emit("detail", cat, this.categories)
        },
        _delete(category, index) {
            if (!confirm("confirmer la suppression?"))
                return 0;

            model._apiget("category.delete?id="+category.id, (response)=>{
                console.log(response);
                this.categories.splice(index, 1);
            });

        },
        _deletesub(category, index) {
            if (!confirm("confirmer la suppression?"))
                return 0;

            model._apiget("category.delete?id="+category.id, (response)=>{
                console.log(response);
                this.category.categories.splice(index, 1);
            });

        },
        seechildren(category){
            this.parentcategory = category;
            this.categories = category.categories;
        },
        init(){

            this.category = {};
            this.formbox = false;
            this.parentcategory = {};

        }
    },
    /**
     * <td @click="_delete(category, $index)" class="text-center text-danger">
     <i class="fa fa-times"></i>
     </td>
     */
    template: `
        <div>

            <!-- Nav Item - Dashboard -->

            <span class="nav-link">Menu</span>
            <ul class="nav-justified pagination">
                <li class="nav-item   ">
                    <a @click="showmenu('food')" class="page-link collapsed" href="#">
                        Nour.
                    </a>
                </li>
            </ul>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <label class="text-right">
                <button @click="add()" type="button" class="btn btn-success">
                   Ajouter une nouvelle catégorie
                </button>
            </label>
            <table id="categorytable" class="dv_datatable table table-bordered table-striped table-hover dataTable no-footer">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Catégorie</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(category, $index) in categories"
                    v-bind:key="category.id">
                    <td>{{category.id}}</td>
                    <td @click="detail(category, $event)" >
                        {{category.name}} <small  v-if="category.children" >({{category.nbproduct}})</small>
                        <div v-if="category.categories.length" class="form-group">
                            <div v-for="(subcategory, $index) in category.categories"
                                 v-bind:key="subcategory.id" class="" >
                                <label class="custom-control-label" :for="'customRadio'+category.id">
                                    {{ subcategory.name }}
                                    <span v-if="subcategory.price" class="float-right fs11 fw600">
                                            | {{subcategory.price}}
                                    </span></label>
                            </div>
                        </div>
                    </td>
                    <td class="text-center text-info">
                        <button @click="edit(category, $index)" class="btn btn-primary"><i class="fa fa-edit"></i> éditer</button>
                    </td>
                    
                    <td v-if="category.children" class="text-center text-info">
                        <button @click="seechildren(category)"  class="btn btn-info"><i class="fa fa-copy"></i></button>
                    </td>
                </tr>
                </tbody>
                <tfoot></tfoot>
            </table>
            
            <div id="categoryform" v-if="formbox" class="swal2-container swal2-fade swal2-shown"
                 style=" overflow-y: auto;">
                <div role="dialog" class="swal2-modal swal2-show dv_modal" tabindex="1">
                    <div class="main-card mb-3 card  box-container">

                        <label v-if="parentcategory.id" class="">
                            <button @click="edit(parentcategory)" type="button" class="btn btn-info">
                                Retour à la catégorie parent.
                            </button>
                        </label>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label class=""> Nom</label>
                                <input type="text" v-model="category.name" class="form-control">
                            </div>
                            <div v-if="category.menu === 'food'" class="form-group">
                                <label for="category">Avec Accompagnement? </label>
                               
                                <label class="form-control">
                                    <input class=""
                                        v-model="category.withsomething"
                                        type="radio" :value="1" >Oui ( <small> les produits de la categorie auront des propositions de garnitures d'accompagnement</small>
                                    )</label>
                                
                                <label class="form-control">
                                <input class=""
                                       v-model="category.withsomething"
                                       type="radio" :value="0">Non</label>
                            </div>
                            <div class="form-group">
                                <label class=""> Prix appliqué aux produits de la catégorie</label>
                                <input type="text" v-model="category.price" class="form-control">
                            </div>
                            <div v-if="parentcategory.id || category.parentid" class="form-group">
                                <label class=""> Regle de gestion du stock:</label><br>
                                <small class="">Ceci sera appliqué sur tous les produits de cette categorie.</small>
                                <input type="text" v-model="category.quantityrule" class="form-control">
                            </div>
                            <div v-if="!parentcategory.id && !category.parentid" class="form-group">
                                <label class="">
                                    <button v-if="category.id" @click="add(category)" type="button" class="btn btn-info">
                                        Ajouter une sous catégorie
                                    </button></label>
                                <table class="table table-bordered table-striped table-hover dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(subcategory, $index) in category.categories"
                                        v-bind:key="subcategory.id">
                                        <td>{{subcategory.id}}</td>
                                        <td @click="detail(subcategory, $event)">
                                            <span class="text-warning" v-if="subcategory.quantityrule !== 1">{{subcategory.quantityrule}} | </span>
                                            {{subcategory.name}}
                                        <span class="text-info" v-if="subcategory.price">{{subcategory.price}}</span>
                                        </td>
                                        <td @click="subedit(category, subcategory, $index)" class="text-center text-info">
                                            <i class="fa fa-edit"></i>
                                        </td>
                                        <td @click="_deletesub(subcategory, $index)" class="text-center text-danger">
                                            <i class="fa fa-times"></i>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button @click="category={}; formbox = false" type="button" class="btn btn-danger">Annuler</button>
                            <button v-if="category.id" @click="update()" type="button" class="btn btn-info">
                                Modifier
                            </button>
                            <button v-if="!category.id" @click="create()" type="button" class="btn btn-info">
                                Ajouter
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    `
})