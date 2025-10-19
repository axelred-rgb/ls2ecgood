//cartCtrl

Vue.component("d-spinner", {
    props: ["spinner", 'label'],
    template: `
        <div class="dloader d-flex justify-content-center">
            <div class="spinner-border text-primary" style="width: 2rem; height: 2rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    `
})

var productmanagerapp = new Vue({
    el: "#product-manager",
    data: {
        formbox: false,
        stockbox: false,
        loading_product: false,
        activecategory: {},
        baseproduct: {},
        parentproduct: {},
        subcategory: {},
        categories: [],
        product: {},
        products: [],
        baseproducts: baseproducts,
        productdatas: [],
        navbar: [],
        supports: [],
        subcategories: [],
        stockexchanges: [],
        index: 0,
        subcategorymessage: "",
        searchvalue: "",
        activemenu: "food",
        alertaddedTimeout: null,
        enterQuantity: false,
        showCategory: false,
        showProduct: false,
        estimated_quantity: 0,
        quantity: 0,
        quantity_damaged: 0,
        table: 0,
        alertbox: {show: false},
        timer: null
        //sound : new Audio(__env+"admin/assets/sounds/beep.mp3")
    },
    mounted() {

        this.table = $(this.$el).find("#producttable");
        let height = $(window).height() - 400;
        console.log(height);
        this.table.css("max-height", height);
        // $(this.$el).find(".category-list").css("max-height", height);
        //
        // $(this.$el).find(".product-list").css("max-height", height);
        // console.log(height)

    },
    methods: {

        findproduct(searchvalue) {

            console.log(searchvalue);
            // if (e.keyCode === 13 ) { //|| product.id
            //     return;
            // }

            if (searchvalue.length >= 3) {
                //$("#box-loader").show();
                var self = this;
                if (this.productdatas.length) {
                    this.products = this.filterrow(searchvalue, this.productdatas);
                    return;
                }
                // else
                this.loading_product = true;
                Drequest.api("product.find", {search: devups.escapeHtml(searchvalue)}).get(
                    (response) => {
                        this.loading_product = false;
                        console.log(response);
                        //self.showlist = true;
                        self.products = response.products;
                        self.productdatas = response.products;
                    })
            } else {
                $("#productselected").html("");
                this.products = [];
                this.productdatas = [];
                //this.showlist = false;
            }

        },

        filterrow(value, dataarray) {
            var filter, filtered = [], tr, td, i, data;

            filter = value.toUpperCase();
            console.log(filter);
            for (i = 0; i < dataarray.length; i++) {
                data = dataarray[i];
                if (data.name.toUpperCase().indexOf(filter) > -1) {
                    console.log(filter, data.name);
                    filtered.push(data);
                }
            }
            return filtered;
        },

        add(cat) {
            this.product = {};
            this.product.category = this.activecategory;
            //this.product.menu = this.activecategory.menu;
            this.baseproduct = {};

            this.formbox = true;
        },
        create() {
            if (this.baseproduct.id)
                this.product.baseid = this.baseproduct.id;
            else
                this.product.baseid = "";

            var data = model.entitytoformentity(this.product);

            Drequest.init("product.create")
                .data({product: data})
                .post((response) => {
                    console.log(response);

                    $.notify("Nouvelle ligne ajoutée avec succès!", "success");
                    this.init();
                })

        },
        edit(product, index) {
            console.log(product);
            this.formbox = true;
            this.index = index;
            this.product = product;
            this.baseproduct = {};

            for (base of this.baseproducts) {
                if (product.baseid === base.id) {
                    this.baseproduct = base;
                    break;
                }
            }
            this.quantity = 0;
            this.quantity_damaged = 0;
        },
        stockexchange(product, index) {
            console.log(product);
            this.stockbox = true;
            this.index = index;
            this.product = product;
            this.stockexchanges = [];

            model._apiget("stockexchange.lazyloading?product.id:eq=" + this.product.id, {
                dfilters: "on",
                next: index,
                per_page: 25,
            }, (response) => {
                console.log(response);
                this.stockexchanges = response.listEntity;

            })
        },
        subedit(cat, subcat, index) {
            this.formbox = true;
            this.product = subcat;
            this.parentcategory = cat;
        },
        update() {

            if (this.baseproduct.id)
                this.product.baseid = this.baseproduct.id;
            else
                this.product.baseid = "";

            var data = model.entitytoformentity(this.product,
                ["id", "quantityrule", "consorule", "diluent", "base", "withsomething", "baseid", "menu", "name", "price", "unit", "category",]);

            Drequest.init("product.update?id=" + this.product.id)
                .data({product: data})
                .post((response) => {
                    // model._apipost("product.update?id=" + this.product.id, JSON.stringify({product: data}), (response) => {
                    console.log(response);
                    // this.product = response.product;
                    $.notify("Produit misa jour avec succes!", "success");

                    this.formbox = false;
                    this.init()

                })

        },
        _delete(product, index) {
            if (!confirm("confirmer la suppression?"))
                return 0;

            Drequest.init("product.delete?id=" + product.id)
                .get((response) => {
                    console.log(response);
                    this.products.splice(index, 1);
                });

        },
        setParent() {


        },
        providequantity(product) {

            var provide = parseFloat(product.provide);
            if (!provide) {
                return;
            }

            if (!confirm("Confirmer l'ajout en stock?"))
                return 0;

            Drequest.init("product.update?id=" + product.id)
                .data({product: {provideQuantity: product.provide}})
                .post( (response) => {
                    console.log(response);
                    this.init()

                    $.notify("Stock mise a jour avec succes!", "success");

                })


        },
        damagequantity() {

            if (!confirm("Cette action modifiera le stock confirmer?"))
                return 0;
            Drequest.init("product.update?id=" + product.id)
                .data({quantityDamaged: this.quantity_damaged})
                .post( (response) => {
            // model._apipost("product.update?id=" + this.product.id, JSON.stringify({product: {quantityDamaged: this.quantity_damaged}}), (response) => {
                console.log(response);

                $.notify("Stock mise a jour avec succes!", "success");

                this.init();
            })

        },
        resetquantity() {

            if (!confirm("Cette action modifiera le stock confirmer?"))
                return 0;

            Drequest.init("product.update?id=" + product.id)
                .data({quantity: this.quantity})
                .post( (response) => {
            //model._apipost("product.update?id=" + this.product.id, JSON.stringify({product: {quantity: this.quantity}}), (response) => {
                console.log(response);

                $.notify("Stock mise a jour avec succes!", "success");

                this.init();
            })


        },
        loadproduct(cat, categories) {

            console.log(categories);
            this.activecategory = cat;
            this.subcategories = cat.categories;
            this.categories = categories;

            this.loading_product = true;
            this.subcategory = {};

            model._apiget("categories.getchildren?id=" + cat.id, (response) => {
                console.log(response);
                this.loading_product = false;
                this.products = response.products;
                this.productdatas = response.products;

            })
            //response.categories.push(this.subcategory);
            //});
        },
        init() {

            this.loading_product = true;
            model._apiget("categories.getchildren?id=" + this.activecategory.id, (response) => {
                console.log(response);
                this.loading_product = false;
                this.products = response.products
                this.productdatas = response.products
            });

            this.showCategory = false;
            this.showProduct = false;
            this.formbox = false;

        }
    }
});

