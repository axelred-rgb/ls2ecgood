Vue.component("categoryForm", {
    data() {
        return {
            chain: [],
            treeitem: {},
            contenturl: "",
            categoryparent: {},
            categorytree: [],
            category_images: [],
        }
    },
    props: ["category"],
    mounted() {

        console.log(this.category);
        var url = $("#content").data('url')
        console.log(url);
        if (this.category.content_id)
            this.contenturl = url + 'edit?id=' + this.category.content_id + '&category=' + this.category.id;
        else
            this.contenturl = url + 'new?category=' + this.category.id;

        this.category_images = this.category.images;
    },
    methods: {

        uploadimage($event) {
            if(!this.category.id)
                return 0;

            console.log($event.target.files)
            var fd = new FormData();
            fd.append("image", $event.target.files[0]);
            Drequest.init($(this.$el).data("base_url") + "category.uploadimage&id=" + this.category.id)
                .data(fd)
                .post((response) => {
                    console.log(response);
                    this.category_images = response.cis;
                })
        },
        update(quit) {
            console.log(this.category);
            //return ;
            Drequest.api('category.update?id=' + this.category.id)
                .data({
                    //"category": model.entitytoformentity(this.category)
                    "category": this.category
                })
                .raw(
                    response => {
                        console.log(response);
                        if (quit)
                            this.category = {};
                        $.notify("mise à jour avec succès!", "success");
                    });
        },
        createcontent() {
        }

    },
    template: `
        
    `
});

Vue.component("addchild", {
    data() {
        return {
            category: {},
            nameparent: "main branche",
        }
    },
    props: ["parent", "categories"],
    mounted() {
        console.log(this.parent);
        if (this.parent)
            this.nameparent = this.parent.name
    },
    methods: {
        create() {
            console.log(this.category)
            this.category.main = 1;

            if (this.categories)
                this.category.position = this.categories.length;
            else if (this.$parent.children && this.$parent.children[this.$parent.children.length - 1])
                this.category.position = this.$parent.children[this.$parent.children.length - 1].position;
            else
                this.category.position = 1;

            // var datajson = JSON.stringify(this.category);

            if (this.parent) {
                this.category.main = 0;
                this.category.parent_id = this.parent.id;
            }

            Drequest.api("category.create")
                .data({
                    category: this.category
                })
                .raw((response) => {

                    console.log(response);
                    // todo: add to the parent
                    this.category.name = "";
                    if (this.categories)
                        this.categories.push(response.category)
                    else if (this.$parent.children)
                        this.$parent.children.push(response.category)

                });

        },
    },
    template: `
        <li class="list-group-item">
            <div class="input-group center">
            <input type="text" class="filter datepicker date-input form-control hasDatepicker" 
              v-model="category.name" :placeholder="'Ajouter un enfant a ' +nameparent"  >
            <span  @click="create()" class="btn btn-default input-group-addon">
            <i class="fa fa-plus"></i>
            </span>
            </div>
        </li>
    `
})

Vue.component("childrenTree", {
    data() {
        return {
            children: [],
            chain: [],
        }
    },
    props: ["category", "index", "nbitem"],
    mounted() {
    },
    methods: {
        findchildren(el) {
            Drequest.api("lazyloading.category?dfilters=on&next=1&per_page=25&parent_id:eq=" + this.category.id)
                .get((response) => {
                    console.log(response);
                    this.children = response.listEntity;
                    this.ll = response;
                });
        },
        edit(el) {
            // this.el =el;
            this.$root.$emit("edit", this.category)

        },
        saveorder() {
            // this.el =el;
            if (this.children) {
                var toupdate = [];
                this.children.forEach((item) => {
                    toupdate.push([item.id, item.position])
                })
                Drequest.api("category.order")
                    .data({
                        categories: toupdate
                    })
                    .raw((response) => {
                        console.log(response);
                    });
            }
            // this.$root.$emit("saveorder", this.$parent.children)

        },
        changestatus(el, status) {
            el.status = status;
            console.log(el);
            Drequest.api("category.changestatus&id=" + el.id + "&status=" + status)
                .get(function (response) {
                    console.log(response);
                })
        },
        addcontent() {

            Drequest.api("category.addcontent?id=" + this.category.id)
                .get(function (response) {
                    console.log(response);
                    window.location.href = response.redirect;
                });

        },
        _delete(el, index) {
            // this.el =el;
            Drequest.api("category.delete?id=" + this.category.id)
                .get((response) => {
                    console.log(response);
                    if (this.$parent)
                        this.$parent.categories.splice(index, 1)
                    else {
                        this.$root.$emit("delete", index)
                    }
                })

        },
        move(position) {
            this.category.position += position;
        }

    },
    template: `
        <li class="list-group-item">
            <div class="dd-handle dd-primary">
                <button style="width: 120px; overflow: hidden"  class="btn btn-light">
                <span v-html="category.name"></span> {{category.position}} {{nbitem}}
                ({{category.children}})</button>
                <button v-if="category.position" @click="move(1)" class="btn btn-info btn-sm"><i class="fa fa-angle-down"></i></button> 
                <button v-if="category.position <= nbitem - 1" @click="move(-1)" class="btn btn-info btn-sm"><i class="fa fa-angle-up"></i></button> 

                <span class="pull-right fs11 fw600">
                    <a v-if="parseInt(category.status)" @click="changestatus(category, 0)"
                       class="btn list-item  text-success">
                        <i class="fa fa-circle fs10"></i> on
                    </a>
                    <a v-if="!parseInt(category.status)" @click="changestatus(category, 1)"
                       class="btn list-item  text-danger">
                        <i class="fa fa-circle fs10"></i> off
                    </a>
                    <button v-if="category.children" @click="saveorder()" title="Save Order" type="button"
                            class="btn btn-info">
                        <i class="fa fa-exchange-alt"></i> </button>
                        
                    <button v-if="category.children" @click="findchildren(category)" type="button"
                            class="btn btn-info">
                        <i class="fa fa-copy"></i></button>
                    <button @click="edit(category)" type="button" class="btn btn-info">
                        <i class="fa fa-edit"></i></button>
                    <button @click="_delete(category, index)" type="button" class="btn btn-danger">
                        <i class="fa fa-close"></i></button>

                </span>
            </div>
            <ul class="sortableLists list-group">  
                <li is="addchild"
                    v-bind:key="category.id+'addchild'" 
                    :parent="category" class="list-group-item"></li>
                
                <li v-if="children.length" is="childrenTree" v-for="(child, $index) in children"
                    v-bind:key="child.id" 
                    :category="child" 
                    :nbitem="children.length" 
                    :index="$index" 
                    class="list-group-item"></li>
                              
            </ul>
        </li>
    `
});

var categoryview = new Vue({
    el: '#content',
    data: {
        categorytree: [],
        categories: [],
        category: {},
        categoriestring: "",
        search: "",
        resultdatas: [],
        category_images: [],
        ll: {},
        componentkey: 1,
    },
    mounted() {

        Drequest.api("lazyloading.category")
            .param({
                dfilters: "on",
                next: 1,
                per_page: 10,
                "main:eq": 1,
            })
            .get((response) => {
                console.log(response);
                this.ll = response;
                this.categories = response.listEntity;
            });

        this.$root.$on('edit', (item) => {
            console.log(item);
            this.category = item;
        })

        this.$root.$on('delete', (index) => {
            console.log(index);
            this.$parent.categories.splice(index, 1)
        })

    },
    computed: {
        orderedItems: function () {
            return this.categories.sort(function (a, b) {
                return a.position - b.position
            });
            // return _.orderBy(this.categories, 'position')
        }
    },
    methods: {

        highlight(next) {
            return (this.currentpage === next) ? 'active' : '';
        },
        nextchildren(next) {

            this.currentpage = next;

            Drequest
                .api("category.nextchildren?id=" + catid + "&next=" + next)
                //.param({id: catid, next: next})
                .get((response) => {
                    console.log(response);
                    this.ll = response.data.ll;
                    this.categories = this.ll.listEntity;
                });

            //xhrObj.abort();
        },
        nextitems(next) {

            this.currentpage = next;

            Drequest.api("lazyloading.category")
                .param({
                    dfilters: "on",
                    next: next,
                    per_page: 10,
                    "main:eq": 1,
                })
                .get((response) => {
                    console.log(response);
                    this.ll = response;

                    this.categories = this.ll.listEntity;
                });

            //xhrObj.abort();
        },
        backtoparent(category, index) {

            this.category.parent_id = category.id;
            this.findchildren(category);

        },
        cancelsearch() {
            this.search = "";
            this.resultdatas = [];
            this.init();
        },
        findcategory(e) {

            if (e.keyCode === 13) { //|| product.id
                return;
            }

            if (this.search.length >= 3) {
                //$("#box-loader").show();
                var self = this;
                if (this.resultdatas.length) {
                    this.categories = this.filterrow(this.search, this.resultdatas);
                    return;
                }
                // else

                Drequest
                    .api("category.find")
                    .param({search: devups.escapeHtml(this.search)})
                    .get((response) => {
                        console.log(response);
                        this.categorytree = [];
                        this.resultdatas = response.data;
                        this.categories = response.data
                    });

            } else {
                $("#productselected").html("");
                this.categories = [];
                this.resultdatas = [];
            }
        },

        confirmdelete(option) {

            var category_id = this.category_id[0];
            var index = this.category_id[1];

            Drequest
                .api("category.delete")
                .param({id: category_id, "option": option})
                .get((response) => {
                    console.log(response);
                    this.categories.splice(index, 1);
                    model._dismissmodal();
                });

        },
        save() {
            var els = $(".sortableLists").find(".li");

            const cc = builcollection(els);
            this.categories = JSON.parse(cc);
            console.log(this.categories);
            this.categoriestring = cc;
            Drequest
                .api("category.create")
                .data({data: cc}).post((response) => {
                console.log(response);
            });

        },
        filterrow(value, dataarray) {
            var filter, filtered = [], tr, td, i, data;

            console.log(dataarray);
            filter = value.toUpperCase();

            for (i = 0; i < dataarray.length; i++) {
                data = dataarray[i];
                if (data.name.toUpperCase().indexOf(filter) > -1) {
                    filtered.push(data);
                }
            }
            return filtered;
        },

        saveorder() {
            // this.el =el;
            if (this.categories) {
                var toupdate = [];
                this.categories.forEach((item) => {
                    toupdate.push([item.id, item.position])
                })
                console.log(toupdate);
                Drequest
                    .api("category.order")
                    .data({
                        categories: toupdate
                    }).raw((response) => {
                    console.log(response);
                })
            }
            // this.$root.$emit("saveorder", this.$parent.children)

        },
    },
});

