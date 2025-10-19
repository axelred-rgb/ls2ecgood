var app = {

    lostpassword(el) {
        model.addLoader($(el))
        Drequest.api("user.initresetpassword")
            .toFormdata({login: $("input[name=login]").val()})
            .post((response) => {
                model.removeLoader();
                console.log(response);
                $("#log").html(``)
                if (response.success) {
                    app.user = response.user;
                    $("#morning").html(response.user.username);
                    $("#reset-password").fadeIn();
                    return;
                }
                $("#log").html(`<div class="alert alert-warning">${response.detail}</div>`)
            })
    },
    resetcredential(el) {
        model.addLoader($(el))
        Drequest.api("user.resetpassword?userid=" + app.user.id)
            .toFormdata({newpassword: $("input[name=newpassword]").val()})
            .post((response) => {
                model.removeLoader();
                console.log(response);
                if (response.success) {
                    $("#log").html(`<div class="alert alert-success">${response.detail}</div>`)
                    window.location.href = response.redirect;
                    return;
                }
                $("#log").html(`<div class="alert alert-warning">${response.detail}</div>`)
            })

    },

    donate: function (event) {

        model.addLoader($(event))
        dform._submit("#donate-form", $("#donate-form").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('#form-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            $('#form-error').html(dform.geterror(response.error));

        });

    },

    checkout: function (event) {

        model.addLoader($(event))
        dform._submit("#donate-form", $("#donate-form").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('#form-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            $('#form-error').html(dform.geterror(response.error));

        });

    },

    register: function (el) {

        model.addLoader($(el))
        var formel = $(el).parents("form");
        dform._submit(formel, formel.attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.form-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }
            else{
                var error = response.error;
                //alert(''+response.error+'');
                $('.form-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>`+error+`
                                </div>
                                `);
            }

            console.log(dform.geterror(response.error))
            $('.form-error').html(dform.geterror(response.error));

        });

    },

    createinstructor: function (event) {

        model.addLoader($(event))
        dform._submit("#instructor-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.form-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.form-error').html(dform.geterror(response.error));

        });

    },

    createprogramdirector: function (event) {

        model.addLoader($(event))
        dform._submit("#programdirector-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.form-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.form-error').html(dform.geterror(response.error));

        });

    },

    createacademy: function (event) {

        model.addLoader($(event))
        dform._submit("#academy-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.academy-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.academy-error').html(dform.geterror(response.error));

        });

    },

    createprograms: function (event) {

        model.addLoader($(event))
        dform._submit("#programs-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.academy-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.programs-error').html(dform.geterror(response.error));

        });

    },

    addcourse: function (event) {

        model.addLoader($(event))
        dform._submit("#courses_programs-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.academy-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.addcourse-error').html(dform.geterror(response.error));

        });

    },

    addproduct: function (event) {

        model.addLoader($(event))
        dform._submit("#courses_programs-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.academy-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.addcourse-error').html(dform.geterror(response.error));

        });

    },
    updateproduct: function (event) {

        model.addLoader($(event))
        dform._submit("#courses_programs-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.academy-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.addcourse-error').html(dform.geterror(response.error));

        });

    },
    deleteproduct: function (event) {

        model.addLoader($(event))
        dform._submit("#courses_programs-form", $("#form-control").attr("action"), (response) => {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.academy-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(() => window.location.href = response.redirect, 3)
                return;
            }

            console.log(dform.geterror(response.error))
            $('.addcourse-error').html(dform.geterror(response.error));

        });

    },

    connexion: function (event) {
        model.addLoader($("#login-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();
        //loginbtn.html("<i class='fa fa-spinner' ></i> loading ...");
        // if (this.remember_me)
        //     formdata.append("remember_me", "on");


        formdata.append("login", form.find("input[name=login]").val());
        formdata.append("password", form.find("input[name=password]").val());
        formdata.append("country", form.find("select[name=country]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.login")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.login2-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussie.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                    console.log(dform.geterror(response.error))
                    $('.login2-error').html(dform.geterror(response.error));

            });
    },

    downloadpart: function (event) {
        model.addLoader($("#downloadpart-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();


        formdata.append("email", form.find("input[name=email]").val());
        formdata.append("id", form.find("input[name=id]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.downloadpart")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.downloadind-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussit.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.downloadpart-error').html(dform.geterror(response.error));

            });
    },



newsletter: function (event) {
        model.addLoader($("#newsletter-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();


        formdata.append("email", form.find("input[name=email]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.newsletter")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.newsletter-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'votre demande à été envoyé .'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.newsletter-error').html(dform.geterror(response.error));

            });
    },

    downloadent: function (event) {
        model.addLoader($("#downloadent-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();


        formdata.append("name", form.find("input[name=name]").val());
        formdata.append("email", form.find("input[name=email]").val());
        formdata.append("id", form.find("input[name=id]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.downloadent")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.downloadind-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussit.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.downloadent-error').html(dform.geterror(response.error));

            });
    },

    contactform: function (event) {
        model.addLoader($("#contact-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();


        formdata.append("firstname", form.find("input[name=firstname]").val());
        formdata.append("lastname", form.find("input[name=lastname]").val());
        formdata.append("email", form.find("input[name=email]").val());
        formdata.append("phone", form.find("input[name=phone]").val());
        formdata.append("subject", form.find("input[name=subject]").val());
        formdata.append("message", form.find("textarea[name=message]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.contactus")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.contact-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussit.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.contact-error').html(dform.geterror(response.error));

            });
    },

    search: function (event) {
        model.addLoader($("#search-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();

        formdata.append("search", form.find("input[name=search]").val());

        Drequest.api("course.search")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.search-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussit.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.login2-error').html(dform.geterror(response.error));

            });
    },

    phoneconnexion: function (event) {
        model.addLoader($("#login-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();
        //loginbtn.html("<i class='fa fa-spinner' ></i> loading ...");
        // if (this.remember_me)
        //     formdata.append("remember_me", "on");


        formdata.append("login", form.find("input[name=login]").val());
        formdata.append("password", form.find("input[name=password]").val());
        formdata.append("country", form.find("select[name=country]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.phonelogin")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.login2-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussit.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.login2-error').html(dform.geterror(response.error));

            });
    },

    confirmregister: function (event) {
        model.addLoader($(event))

        var formdata = new FormData();

        formdata.append("activationcode", $("#confirm-form").find("input[name=activationcode]").val());



        Drequest.api("user.activateaccount")
            .data(formdata)
            .post(function (response) {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.form2-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(function () {
                    window.location.href = response.redirect;
                }, 1000)
                //setTimeout(() => window.location.href = response.redirect, 3)
            }

            console.log(dform.geterror(response.error))
            $('.form2-error').html(dform.geterror(response.error));

        });
    },

    forgotpassword: function (event) {
        model.addLoader($(event))

        var formdata = new FormData();

        formdata.append("email", $("#forgot-form").find("input[name=email]").val());



        Drequest.api("user.resetaccount")
            .data(formdata)
            .post(function (response) {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.forgot-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(function () {
                    window.location.href = response.redirect;
                }, 1000)
                //setTimeout(() => window.location.href = response.redirect, 3)
            }

            console.log(dform.geterror(response.error))
            $('.forgot-error').html(dform.geterror(response.error));

        });
    },

    provideemail: function (event) {
        model.addLoader($(event))

        var formdata = new FormData();

        formdata.append("email", $("#email-form").find("input[name=email]").val());
        formdata.append("id", $("#email-form").find("input[name=id]").val());
        formdata.append("idcourse", $("#email-form").find("input[name=idcourse]").val());



        Drequest.api("user.provideemail")
            .data(formdata)
            .post(function (response) {
                console.log(response);
                model.removeLoader()
                if (response.success) {

                    $('.forgot-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                    //setTimeout(() => window.location.reload(), 3)
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)
                    //setTimeout(() => window.location.href = response.redirect, 3)
                }

                console.log(dform.geterror(response.error))
                $('.forgot-error').html(dform.geterror(response.error));

            });
    },

    phoneforgotpassword: function (event) {
        model.addLoader($(event))

        var formdata = new FormData();

        formdata.append("email", $("#forgot-form").find("input[name=email]").val());



        Drequest.api("user.resetaccount")
            .data(formdata)
            .post(function (response) {
                console.log(response);
                model.removeLoader()
                if (response.success) {

                    $('.forgot-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                    //setTimeout(() => window.location.reload(), 3)
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)
                    //setTimeout(() => window.location.href = response.redirect, 3)
                }

                console.log(dform.geterror(response.error))
                $('.forgot-error').html(dform.geterror(response.error));

            });
    },

    phoneforgotpassword: function (event) {
        model.addLoader($("#login-form").find("button"))
        var form = $(event).parents("form");
        var formdata = new FormData();
        //loginbtn.html("<i class='fa fa-spinner' ></i> loading ...");
        // if (this.remember_me)
        //     formdata.append("remember_me", "on");


        formdata.append("phone", form.find("input[name=phone]").val());
        formdata.append("country", form.find("select[name=country]").val());

        //window.location.href = "{{route("dashboard")}}";
        //return;
        Drequest.api("user.phonereset")
            .data(formdata)
            .post(function (response) {
                model.removeLoader()
                console.log(response)
                if (response.success) {
                    // message

                    $('.forgot-error').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'connexion réussit.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1000)

                }

                console.log(dform.geterror(response.error))
                $('.forgot-error').html(dform.geterror(response.error));

            });
    },

    resetpassword: function (event) {
        model.addLoader($(event))

        var formdata = new FormData();

        formdata.append("activationcode", $("#resetpassword-form").find("input[name=activationcode]").val());
        formdata.append("password", $("#resetpassword-form").find("input[name=password]").val());
        formdata.append("confirmpassword", $("#resetpassword-form").find("input[name=confirmpassword]").val());
        formdata.append("user", $("#resetpassword-form").find("input[name=user]").val());



        Drequest.api("user.newresetpassword")
            .data(formdata)
            .post(function (response) {
            console.log(response);
            model.removeLoader()
            if (response.success) {

                $('.resetpassword-error').html(`<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button> ${response.detail}
                                </div>
                                `);
                //setTimeout(() => window.location.reload(), 3)
                setTimeout(function () {
                    window.location.href = response.redirect;
                }, 1000)
                //setTimeout(() => window.location.href = response.redirect, 3)
            }

            console.log(dform.geterror(response.error))
            $('.resetpassword-error').html(dform.geterror(response.error));

        });
    },

    buyToken: function(event){
        model.addLoader($(event));
        $("#paymentToken").attr("hidden","hidden");
        var packtoken = $("#purchase-token").find("select[name=packtoken]").val();
        var quantity = $("#purchase-token").find("input[name=quantity]").val();
        var datebuy =new Date();
        var user = $("#purchase-token").find("input[name=user]").val();
        $error = false;
        if(quantity <= 0){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Valeur du champ quantité invalide'}
            </div>
            `);
            $error = true;
        }

        if(packtoken== "" || quantity == ""){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Tous les champs sont obligatoires'}
            </div>
            `);
            $error = true;
        }

        var user_token = {date:datebuy, quantite:quantity, packtokken_id:packtoken, user_id:user};

        if(!$error){
            var formdata1 = new FormData();
            formdata1.append("packtoken", packtoken);
            Drequest.api("get.packTokenInformation")
                .data(formdata1)
                .post(function (response) {
                    if(response.success){
                        let qte = parseInt(quantity);
                        let price = parseInt(response.price);
                        let total = qte*price;
                        model.removeLoader();

                        $("#paymentToken").removeAttr("hidden");
                        $("#Ttcprice").html(total+ " €");
                        var tva = (total*20)/100
                        $("#TVA").html(tva+ " €");
                        total = total  + tva;
                        $("#Totalprice").html(total+ " €");
                    }
                })

        }


    },

    paymentTokenFinal: function(event){
        model.addLoader($(event));
        $("#paypalbtn").html('');
        $("#paypalbtn").attr('hidden','hidden');
        var packtoken = $("#purchase-token").find("select[name=packtoken]").val();
        var quantity = $("#purchase-token").find("input[name=quantity]").val();

        var datebuy =new Date();
        var user = $("#purchase-token").find("input[name=user]").val();
        $error = false;
        if(quantity <= 0){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Valeur du champ quantité invalide'}
            </div>
            `);
            $error = true;
        }

        if(packtoken== "" || quantity == ""){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Tous les champs sont obligatoires'}
            </div>
            `);
            $error = true;
        }

        var user_token = {date:datebuy, quantite:quantity, packtokken_id:packtoken, user_id:user};

        if(!$error){
            var formdata1 = new FormData();
            formdata1.append("packtoken", packtoken);
            Drequest.api("get.packTokenInformation")
                .data(formdata1)
                .post(function (response) {
                    if(response.success){
                        let qte = parseInt(quantity);

                        let price = parseInt(response.price);
                        let total = qte*price;
                        total = total + (total*20)/100;
                        model.removeLoader();

                        $("#paypalbtn").removeAttr('hidden');
                        purchase(parseInt(total), 'EUR', 'EUR', "Pack "+response.qte+" Token", quantity, '#paypalbtn');
                    }
                })
        }

    },

    saveTokenBuy: function(){
        //model.addLoader($(event));
        $("#paymentToken").attr("hidden","hidden");
        var packtoken = $("#purchase-token").find("select[name=packtoken]").val();
        var quantity = $("#purchase-token").find("input[name=quantity]").val();
        var datebuy =new Date();
        var user = $("#purchase-token").find("input[name=user]").val();
        $error = false;
        if(quantity <= 0){
            model.removeLoader();
            $('.messageF').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Valeur du champ quantité invalide'}
            </div>
            `);
            $error = true;
        }

        if(packtoken== "" || quantity == ""){
            model.removeLoader();
            $('.messageF').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Tous les champs sont obligatoires'}
            </div>
            `);
            $error = true;
        }

        var user_token = {date:datebuy, quantite:quantity, packtokken_id:packtoken, user_id:user};

        if(!$error){

            Drequest.api("create.user-token")
                .data({user_token:user_token})
                .raw((response) => {
                    if (response.success) {
                        var formdata = new FormData();
                        formdata.append("quantite", quantity);
                        formdata.append("user", user);
                        formdata.append("packtoken", packtoken);
                        Drequest.api("user.updatetoken")
                            .data(formdata)
                            .post(function (response) {
                                //model.removeLoader();
                                console.log(response);
                                $("#log").html(``)
                                if (response.success) {
                                    $('.messageF').html(`
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    ${'Achat éffectué avec succès.'}
                                </div>
                                `);

                                    setTimeout(function () {
                                        window.location.href = response.redirect;
                                    }, 2000)
                                    purchase(value, currency, currency_code, product_name, quantity, locateId);
                                }
                                $('.messageF').html(dform.geterror(response.error));
                            })

                    }
                    else{
                        alert("error");
                    }
                })
        }


    },
    shedulelabs: function(event){
        model.addLoader($(event));
        var startDate = $('#beginDate').val();
        var endDate = $('#endDate').val();
        var lab = $("#labsValue").val();
        var user = $("#user").val();

        var formdata = new FormData();

        formdata.append("startDate", startDate);
        formdata.append("endDate", endDate);
        formdata.append("lab", lab);
        formdata.append("user", user);
        Drequest.api("shedule.labs")
            .data(formdata)
            .post(function (response) {
                model.removeLoader();
                console.log(response);
                if (response.success) {
                    if(response.detail == "ok"){
                        $('.message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>
                        ${'Reservation éffectuée avec succès.'}
                    </div>
                    `);
                        setTimeout(function () {
                            window.location.href = response.redirect;
                        }, 2000)
                    }
                    else{
                        $('.message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>
                        ${'This date range is busy. Please change it'}
                    </div>
                    `);
                    }

                }
                else{
                    $('.message').html(`
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                    </button>+response.error+</div>`
                    );
                }
            })

    },

    assignCertificate: function(event){
        model.addLoader($(event));
        var courseid = $("#courses").val();
        var userid = $("#users").val();
        var error = false;
        if(courseid== "" || userid == ""){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Tous les champs sont obligatoires'}
            </div>
            `);
            error = true;
        }

        if(!error){
            var formdata = new FormData();

            formdata.append("courseid", courseid);
            formdata.append("userid", userid);
            Drequest.api("assign.certificate")
                .data(formdata)
                .post(function (response) {
                    model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            $('.message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Attestation attribuée avec succès.'}
                        </div>
                        `);
                            setTimeout(function () {
                                window.location.href = "";
                            }, 2000)
                        }
                        else{
                            $('.message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'error'}
                        </div>
                        `);
                        }
                    }
                    else{
                        $('.message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>+response.error+</div>`
                        );
                    }
                });
        }
    },

    revokeCertificate : function(event){
        model.addLoader($(event));
        var id = $(event).attr('data');

        var error = false;
        if(id== ""){
            model.removeLoader();
            $('#message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Tous les champs sont obligatoires'}
            </div>
            `);
            error = true;
        }

        if(!error){
            var formdata = new FormData();
            formdata.append("id", id);

            Drequest.api("revoke.certificate")
                .data(formdata)
                .post(function (response) {
                    model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            $('#message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Attestation revoquée avec succès.'}
                        </div>
                        `);
                            setTimeout(function () {
                                window.location.href = "";
                            }, 2000)
                        }
                        else{
                            $('#message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'error'}
                        </div>
                        `);
                        }
                    }
                    else{
                        $('#message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>+response.error+</div>`
                        );
                    }
                });
        }
    },
    giveToken: function(event){
        model.addLoader($(event));
        var quantity = $("#purchase-token").find("input[name=quantity]").val();
        var user = $("#purchase-token").find("select[name=user]").val();

        $error = false;
        if(quantity <= 0){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Valeur du champ quantité invalide'}
            </div>
            `);
            $error = true;
        }

        if(quantity == "" || user == "" || user == null){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Selectionner un utilisateur'}
            </div>
            `);
            $error = true;
        }


        if(!$error){
            var formdata = new FormData();

            formdata.append("quantite", quantity);
            formdata.append("user", user);

            Drequest.api("give.user-token")
                .data(formdata)
                .post((response) => {
                    if (response.success) {
                        model.removeLoader();
                        $('.message').html(`
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                ${'Token attribué avec succès.'}
                            </div>
                            `);
                        setTimeout(function () {
                            window.location.href = '';
                        }, 2000)


                    }
                    else{
                        alert("error");
                    }
                })
        }


    },

    addCode: function(event){
        model.addLoader($(event));
        var code = $("#code-promo").find("input[name=code]").val();
        var value = $("#code-promo").find("input[name=valeur]").val();
        var condition = $("#code-promo").find("input[name=condition]").val();
        $error = false;
        if(value <= 0){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Valeur du code est invalide'}
            </div>
            `);
            $error = true;
        }

        if(condition == ''){
            condition = -1;
        }

        if(value == "" || code == "" ){
            model.removeLoader();
            $('.message').html(`
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                </button>
                ${'Remplissez tous les champs'}
            </div>
            `);
            $error = true;
        }


        if(!$error){
            var formdata = new FormData();

            formdata.append("value", value);
            formdata.append("code", code);
            formdata.append("nbremonth", condition);

            Drequest.api("save.codepromo")
                .data(formdata)
                .post((response) => {
                    if (response.success) {
                        model.removeLoader();
                        $('.message').html(`
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                ${'Code enrégistré avec succès.'}
                            </div>
                            `);
                        setTimeout(function () {
                            window.location.href = '';
                        }, 2000)


                    }
                    else{
                        alert("error");
                    }
                })
        }


    },

    deletecode : function(event, id){
        model.addLoader($(event));
        var formdata = new FormData();
        formdata.append('id', id);
        error = false;
        if(id == ""){
            error = true;
        }

        if(!error){

            Drequest.api("destroy.codepromo")
                .data(formdata)
                .post(function (response) {
                    // model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            successAlert('Opération effectué avec succès');
                            setTimeout(function () {
                                window.location.href = "";
                            }, 2000)
                        }

                    }
                    else{
                        errorAlert(response.error);
                    }
                });
        }
        else{
            errorAlert('Nous avons rencontré des erreurs durant l\'operation.');
        }
    },


    updateUser: function(event){
        model.addLoader($(event));
        var data = [];
        var formdata = new FormData();
        var error = false;


        data['nom'] = $("#nom").val();
        data['prenom'] = $("#prenom").val();
        data['username'] = $("#username2").val();
        data['email'] = $("#email").val();
        //data['image'] = $("#imageInput").files[0];
        // data['country'] = $("#country").val();
        // data['tel'] = $("#tel").val();

        for (var key in data) {
            if(data[key] == ""){
                $('#'+key).addClass('error');
                $('#'+key+'>.errormessage').html("Ce champ est obligatoire");
                error = true;
                model.removeLoader();
            }
            else{
                $('#'+key).removeClass('error');
                $('#'+key+'>.errormessage').html("");
                formdata.append(key, data[key]);
            }
        }


        if(!error){

            Drequest.api("user.postupdate")
                .data(formdata)
                .post(function (response) {
                    model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                                $('.message').html(`
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                ${'Opération effectuée avec succès.'}
                            </div>
                            `);
                                setTimeout(function () {
                                    window.location.href = "myprofil";
                                }, 2000)
                        }
                        else{
                                $('.message').html(`
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                </button>
                                ${response.message}
                            </div>
                        `);
                        }
                    }
                    else{
                        $('.message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>
                        ${response.error}
                        </div>`
                        );
                    }
                });
        }
        else{
            $('.message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Nous avons rencontré des erreurs durant l\'operation.'}
                        </div>
                        `);
        }
    },


    createPost: function(event){
        model.addLoader($(event));
        var data = [];
        var formdata = new FormData();
        var error = false;

        data['titre'] = $("#titreInput").val();
        data['title'] = $("#titleInput").val();
        data['resume'] = $("#resumeInput").val();
        data['summary'] = $("#summaryInput").val();
        //data['image'] = $("#imageInput").files[0];
        data['descriptionEn'] = CKEDITOR.instances["descriptionEn"].getData();
        data['descriptionFr'] = CKEDITOR.instances["descriptionFr"].getData();

        for (var key in data) {
            if(data[key] == ""){
                $('#'+key).addClass('error');
                $('#'+key+'>.errormessage').html("Ce champ est obligatoire");
                error = true;
                model.removeLoader();
            }
            else{
                $('#'+key).removeClass('error');
                $('#'+key+'>.errormessage').html("");
                formdata.append(key, data[key]);
            }
        }

        formdata.append('image', $('input[type=file]')[0].files[0]);

        if(!error){

            Drequest.api("save.article")
                .data(formdata)
                .post(function (response) {
                    model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            $('.message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Enrégistrement effectué avec succès.'}
                        </div>
                        `);
                            setTimeout(function () {
                                window.location.href = "manageBlog";
                            }, 2000)
                        }
                        else{
                            $('.message').html(`
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${response.message}
                        </div>
                        `);
                        }
                    }
                    else{
                        $('.message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>+response.error+</div>`
                        );
                    }
                });
        }
        else{
            $('.message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Nous avons rencontré des erreurs durant l\'operation.'}
                        </div>
                        `);
        }
    },

    updatePost: function(event){
        model.addLoader($(event));
        var data = [];
        var formdata = new FormData();
        var error = false;

        data['titre'] = $("#titreInput").val();
        data['title'] = $("#titleInput").val();
        data['resume'] = $("#resumeInput").val();
        data['summary'] = $("#summaryInput").val();
        //data['image'] = $("#imageInput").files[0];
        data['descriptionEn'] = CKEDITOR.instances["descriptionEn"].getData();
        data['descriptionFr'] = CKEDITOR.instances["descriptionFr"].getData();

        for (var key in data) {
            if(data[key] == ""){
                $('#'+key).addClass('error');
                $('#'+key+'>.errormessage').html("Ce champ est obligatoire");
                error = true;
                model.removeLoader();
            }
            else{
                $('#'+key).removeClass('error');
                $('#'+key+'>.errormessage').html("");
                formdata.append(key, data[key]);
            }
        }
        if($('input[type=file]')[0].files[0] !== undefined){
            formdata.append('image', $('input[type=file]')[0].files[0]);
        }

        formdata.append('id', id_post);

        if(!error){

            Drequest.api("updatepost.article")
                .data(formdata)
                .post(function (response) {
                    model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            $('.message').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Modification effectuée avec succès.'}
                        </div>
                        `);
                            setTimeout(function () {
                                window.location.href = "";
                            }, 2000)
                        }
                        else{
                            $('.message').html(`
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${response.message}
                        </div>
                        `);
                        }
                    }
                    else{
                        $('.message').html(`
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>+response.error+</div>`
                        );
                    }
                });
        }
        else{
            $('.message').html(`
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Nous avons rencontré des erreurs durant l\'operation.'}
                        </div>
                        `);
        }
    },

        deleteReservation:function(event, id){

        var data = [];
        var formdata = new FormData();
        formdata.append('id',id);
        var error = false;
        if(id == ""){
            error = true;
        }

        if(!error){

            Drequest.api("destroy.reservation")
                .data(formdata)
                .post(function (response) {
                    // model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            successAlert('Opération effectué avec succès');
                            setTimeout(function () {
                                window.location.href = "";
                            }, 2000)
                        }

                    }
                    else{
                        errorAlert(response.error);
                    }
                });
        }
        else{
            errorAlert('Nous avons rencontré des erreurs durant l\'operation.');
        }
    },

    deletePost:function(event, id){

        var data = [];
        var formdata = new FormData();
        formdata.append('id',id);
        var error = false;
        if(id == ""){
            error = true;
        }

        if(!error){

            Drequest.api("destroy.article")
                .data(formdata)
                .post(function (response) {
                    // model.removeLoader();
                    console.log(response);
                    if (response.success) {
                        if(response.detail == "ok"){
                            successAlert('Opération effectué avec succès');
                            setTimeout(function () {
                                window.location.href = "";
                            }, 2000)
                        }

                    }
                    else{
                        errorAlert(response.error);
                    }
                });
        }
        else{
            errorAlert('Nous avons rencontré des erreurs durant l\'operation.');
        }
    },


    updatephonorcountrystep1: function(event){
        model.addLoader($(event));
        var country = $('#country').val();
        var phonenumber = $('#phonenumber').val();

        var formdata = new FormData();

        formdata.append("country", country);
        formdata.append("phonenumber", phonenumber);

        Drequest.api("updatephone.orcountrystep1")
            .data(formdata)
            .post(function (response) {
                model.removeLoader();
                console.log(response);
                if (response.success) {
                    $(event).attr('hidden','hidden');

                    $("#updatephonecountry").removeAttr('hidden');
                    $("#code-act").removeAttr('hidden');
                    $("#pass-word").removeAttr('hidden');


                }
                else{
                    $('.message2').html(' <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>'+response.detail+'</div>');
                }
            })

    },

    updatephonorcountrystep2: function(event){
        model.addLoader($(event));
        var country = $('#country').val();
        var phonenumber = $('#phonenumber').val();
        var code = $('#code').val();
        var password = $('#password').val();

        var formdata = new FormData();

        formdata.append("country", country);
        formdata.append("phonenumber", phonenumber);
        formdata.append("code", code);
        formdata.append("password", password);


        Drequest.api("updatephone.orcountrystep2")
            .data(formdata)
            .post(function (response) {
                model.removeLoader();
                console.log(response);
                if (response.success) {

                    $('.message2').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>Modification éffectuée avec succès</div>');

                    setTimeout(function () {
                        window.location.href = '';
                    }, 1000);

                }
                else{
                    $('.message2').html('<div class="alert alert-success alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">× </button>'+response.detail+'</div>');
                }
            })

    },


    deletedata(el,functionName, id){
        model.addLoader($(el));

       var  method='DELETE';

        $.ajax({

            url: __env+'api/'+functionName+'?id='+id,
            method: method,
            contentType: 'application/json',
            success: function(result) {
                console.log(result);
                result = JSON.parse(result);
                if(result.success== true){
                    successAlert('Opération effectué avec succès');
                }
                else{
                    alert(result);
                }
                setTimeout(function () {
                    window.location.href = '';
                }, 1000);
                model.removeLoader();
            },
            error: function(request,msg,error) {
                console.log(request);
                errorAlert(error);
            }
        });
    },

    async createSimpleattributeinEntity(objectName, rawObject, returnLink,el=null,defaultsuccessmessage = true, functionafter = null){

        if(el!==null){
            model.addLoader($(el));
        }

        var route = objectName;
        if(objectName.includes('_')){
            route = route.replace("_", "-");
        }
        var datas = {[objectName]: rawObject};

        Drequest.api("create."+route)
            .data(datas)
            .raw(async function(response) {
                    if(response.success == true){
                        if(el!==null){
                            model.removeLoader();
                        }
                        if(defaultsuccessmessage){
                            successAlert('Opération effectué avec succès');
                        }


                        //showSwal('success-message');
                        setTimeout(function () {
                            if(returnLink !== false){
                                window.location.href = returnLink;
                            }
                        }, 2500)
                        //model.removeLoader();

                        if(functionafter !== null){
                            resultRequest= response[objectName];

                            functionafter(response[objectName]);
                        }

                    }
                    else{
                        if(el!==null){
                            model.removeLoader();
                        }
                        if(response.error !== undefined){
                            var message = '';
                            $.each( response.error, function( key, value ) {
                                message += value;
                                errorAlert(message);
                            });
                        }
                        else{
                            errorAlert('Une erreur s\'est produite durant l\'opération');
                        }
                    }

                }
            )
    },

    async updateSimpleattributeinEntity(id,objectName, rawObject, returnLink,el=null,defaultsuccessmessage = true, functionafter = null){
        if(el!==null){
            model.addLoader($(el));
        }
        var route = objectName;
        if(objectName.includes('_')){
            route = route.replace("_", "-");
        }
        var datas = {[objectName]: rawObject};

        Drequest.api("update."+route+"?id="+id)
            .data(datas)
            .raw(async function(response) {
                    if(response.success == true){
                        if(el!==null){
                            model.removeLoader();
                        }
                        if(defaultsuccessmessage){
                            successAlert('Opération effectué avec succès.');
                        }


                        //showSwal('success-message');
                        setTimeout(function () {
                            if(returnLink !== false){
                                window.location.href = returnLink;
                            }
                        }, 2500)
                        //model.removeLoader();

                        if(functionafter !== null){
                            resultRequest= response[objectName];

                            functionafter(response[objectName]);
                        }
                    }
                    else{
                        if(el!==null){
                            model.removeLoader();
                        }
                        if(response.error !== undefined){
                            var message = '';
                            $.each( response.error, function( key, value ) {
                                message += value;
                                errorAlert(message);
                            });
                        }
                        else{
                            errorAlert('Une erreur s\'est produite durant l\'opération');
                        }
                    }

                }
            )
    },

    async createsimpleObject(el, objectName, formId, returnLink,defaultsuccessmessage=true, functionafter = null){
        model.addLoader($(el));
        var obj = {};
        var data = [];
        var file = [];
        var filelocation = [];
        var error = false;

        var route = objectName;
        if(objectName.includes('_')){
            route = route.replace("_", "-");
        }

        $("#"+formId+" .form-group").each(async function( index ) {
            parentId = $(this).attr('data-id');

            if(parentId !== undefined) {
                if ($(this).find("input").attr('type') == 'radio'){
                    //alert("MAfff");
                    if ($(this).find("input").is(":checked")) {

                        obj["" + parentId + ""] = $(this).find("input").attr("data-check");
                    }
                }
                else{
                    if ($(this).attr('ckeditor')){

                        obj["" + parentId + ""] = CKEDITOR.instances["" + parentId + ""].getData();
                    }
                    else {
                        if ($(this).attr('selectmultiple')) {

                            obj["" + parentId + ""] = new Array();
                            for (var i = 0; i < $(this).find(".form-control").val().length; i++) {
                                obj["" + parentId + ""].push($(this).find(".form-control").val()[i]);
                                console.log($(this).find(".form-control").val()[i]);
                            }
                            console.log(obj["" + parentId + ""]);
                        } else {
                            if ($(this).attr('lang')) {

                                if (obj["" + parentId + ""] === undefined) {
                                    obj["" + parentId + ""] = {};
                                }
                                obj["" + parentId + ""]["" + $(this).find(".form-control").attr('data_lang') + ""] = $(this).find(".form-control").val();
                                console.log(obj["" + parentId + ""].length);
                            } else {
                                if ($(this).attr('multiple')) {
                                    if ($(this).attr('data-count') == 0) {
                                        obj["" + parentId + ""] = new Array();
                                    }
                                    if ($(this).find("input").is(":checked")) {
                                        obj["" + parentId + ""].push($(this).find("input").val());

                                        // obj[""+parentId+""] = $(this).find("input").attr("data-check");
                                    }
                                } else {
                                    if ($(this).find("input").hasClass("checkbox")) {
                                        if ($(this).find("input").is(":checked")) {

                                            obj["" + parentId + ""] = $(this).find("input").attr("data-check");
                                        } else {
                                            obj["" + parentId + ""] = $(this).find("input").attr("data-uncheck");
                                        }
                                    } else {
                                        if ($(this).find("input").attr('type') == 'file') {
                                            $fichier = $(this).find('input[type=file]')[0].files;
                                            if ($fichier.length !== 0) {
                                                file["" + parentId + ""] = $fichier[0];
                                                filelocation["" + parentId + ""] = $(this).find('input[type=file]').attr('data_location');
                                            }
                                        } else {

                                            obj["" + parentId + ""] = $(this).children(".form-control").val();
                                            //console.log(obj["" + parentId + ""]);
                                            //alert($('[data-id ="'+parentId+'"]'+"  .form-control").val());
                                            //alert($('#div-state .form-control').attr('id'));
                                            // alert($('[data-id ='+parentId+']'+'  .form-control').val());
                                            // alert($('#div-'+parentId+' .form-control').val());
                                            // alert($('#div-'+parentId+' .form-control').attr('id'));
                                            //alert($('#div-'+parentId+" .form-control").attr('required'));
                                            if ($('#div-'+parentId+" .form-control").attr('required') == 'required') {
                                                data[parentId] = obj[parentId];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

        /*****************************UPLOAD DES FICHIER**********************************************/
            // if(file.length >0){

            console.log(obj);

        var formdata = new FormData();
        for(var key in file){

            formdata.append("upload", file[key]);
            formdata.append("filelocation", filelocation[key]);
            await Drequest.api("uploadimage.article")
                .data(formdata)
                .post(function (response) {
                        i = 0;

                        if(response.url){
                            obj[""+key+""] = response.url;
                        }
                    }
                )
        }
        // }
        /*****************************GESTION DES MESSAGES D'ERREURS POUR LES CHAMPS SIMPLE*********** */

        console.log(obj);

        for (var key in data) {
            if(data[key] == "" || data[key] == null){
                $('#div-'+key+' .form-control').addClass('error');
                await tt("Ce champ est obligatoire").then(function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    $('#div-'+key+' .errormessage').html(data.data);
                }).catch(function(err) {
                    console.log(err);
                });

                error = true;
                model.removeLoader();
            }
            else{
                $('#div-'+key+' .form-control').removeClass('error');
                $('#div-'+key+' .errormessage').html("");
            }
        }

        if(!error){

            var datas = {[objectName]: obj};
            //alert(data['name']);
            // var formdata = new formdata();
            //
            // for (var key in obj) {
            //     formdata.append(key, obj[key]);
            // }

            // for (var i = 0; i < obj.length; i++) {
            //     formdata.append('')
            //     obj["" + parentId + ""].push($(this).find(".form-control").val()[i]);
            //     console.log($(this).find(".form-control").val()[i]);
            // }
            Drequest.api("create."+route)
                .data(datas)
                .raw((response) => {
                        console.log(response);
                        alert("reerer");
                        if(response.success == true){
                            if(defaultsuccessmessage){
                                successAlert('Opération effectué avec succès');
                            }
                            if(returnLink !== false){
                                setTimeout(function () {
                                    window.location.href = returnLink;
                                }, 2000)
                            }

                            model.removeLoader();
                            if(functionafter !== null){
                                resultRequest= response[objectName];

                                functionafter(response[objectName]);
                            }

                        }
                        else{
                            model.removeLoader();
                            errorAlert('Une erreur s\'est produite durant l\'opération');
                        }

                    }
                )
        }
    },
    async updatesimpleObject(el, id, objectName, formId, returnLink, defaultsuccessmessage = true, functionafter =null){
        model.addLoader($(el));
        var obj = {};
        var data = [];
        var file = [];
        var filelocation = [];
        var error = false;
        var route = objectName;
        if(objectName.includes('_')){
            route = route.replace("_", "-");
        }



        $("#"+formId+" .form-group").each(async function( index ) {
            parentId = $( this ).attr('data-id');

            if(parentId !== undefined) {
                if ($(this).find("input").attr('type') == 'radio') {
                    //alert("MAfff");
                    if ($(this).find("input").is(":checked")) {

                        obj["" + parentId + ""] = $(this).find("input").attr("data-check");
                    }
                } else {

                    if ($(this).attr('ckeditor')) {
                        obj["" + parentId + ""] = CKEDITOR.instances["" + parentId + ""].getData();
                    } else {
                        if ($(this).attr('selectmultiple')) {
                            obj["" + parentId + ""] = new Array();
                            for (var i = 0; i < $(this).find(".form-control").val().length; i++) {
                                obj["" + parentId + ""].push($(this).find(".form-control").val()[i]);
                                console.log($(this).find(".form-control").val()[i]);
                            }
                            console.log(obj["" + parentId + ""]);
                        } else {
                            if ($(this).attr('lang')) {

                                if (obj["" + parentId + ""] === undefined) {
                                    obj["" + parentId + ""] = {};
                                }
                                obj["" + parentId + ""]["" + $(this).find(".form-control").attr('data_lang') + ""] = $(this).find(".form-control").val();
                                console.log(obj["" + parentId + ""].length);
                            } else {
                                if ($(this).attr('multiple')) {
                                    if ($(this).attr('data-count') == 0) {
                                        obj["" + parentId + ""] = new Array();
                                    }
                                    if ($(this).find("input").is(":checked")) {
                                        obj["" + parentId + ""].push($(this).find("input").val());

                                        // obj[""+parentId+""] = $(this).find("input").attr("data-check");
                                    }
                                } else {
                                    /********************************RECUPERATION DES INPUT CHECKBOX ET RADIO********************* */
                                    if ($(this).find("input").hasClass("checkbox")) {
                                        if ($(this).find("input").is(":checked")) {

                                            obj["" + parentId + ""] = $(this).find("input").attr("data-check");
                                        } else {
                                            obj["" + parentId + ""] = $(this).find("input").attr("data-uncheck");
                                        }
                                    } else {
                                        /****************************RECUPERATION DES FICHIERS POUR UPLOAD****************** */
                                        if ($(this).find("input").attr('type') == 'file') {
                                            $fichier = $(this).find('input[type=file]')[0].files;
                                            if ($fichier.length !== 0) {
                                                file["" + parentId + ""] = $fichier[0];
                                                filelocation["" + parentId + ""] = $(this).find('input[type=file]').attr('data_location');

                                            }

                                        }
                                        /***************************RECUPERATION DES CHAMPS SIMPLE************************** */
                                        else {
                                            console.log(parentId);
                                            obj["" + parentId + ""] = $(this).children(".form-control").val();
                                            console.log(obj["" + parentId + ""]);
                                            if ($("#" + parentId + " .form-control").prop('required')) {
                                                data[parentId] = obj[parentId];
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }

        });

        console.log(obj);
        /*****************************UPLOAD DES FICHIER**********************************************/
            // if(file.length >0){
        var formdata = new FormData();
        for(var key in file){

            formdata.append("upload", file[key]);
            formdata.append("filelocation", filelocation[key]);
            await Drequest.api("uploadimage.article")
                .data(formdata)
                .post(function (response) {
                        i = 0;

                        if(response.url){
                            obj[""+key+""] = response.url;
                        }
                    }
                )
        }

        /*****************************GESTION DES MESSAGES D'ERREURS POUR LES CHAMPS SIMPLE*********** */
        //alert(data.length);
        for (var key in data) {
            if(data[key] == "" || data[key] == null){
                $('#'+key).addClass('error');
                await tt("Ce champ est obligatoire").then(function(data) {
                    $('#'+key+'>.errormessage').html(data.data);
                }).catch(function(err) {
                    console.log(err);
                });

                error = true;
                model.removeLoader();
            }
            else{
                $('#'+key).removeClass('error');
                $('#'+key+'>.errormessage').html("");
            }
        }

        if(!error){
            obj['id'] = id;

            var datas = {[objectName]: obj};
            //alert(data['name']);

            Drequest.api("update."+route+"?id="+id)
                .data(datas)
                .raw(async function(response) {
                        if(response.success == true){
                            if(defaultsuccessmessage){
                                successAlert('Opération effectué avec succès');
                            }
                            if(returnLink !== false){
                                setTimeout(function () {
                                    window.location.href = returnLink;
                                }, 2000)
                            }

                            model.removeLoader();
                            if(functionafter !== null){
                                resultRequest= response[objectName];

                                functionafter(response[objectName]);
                            }
                        }
                        else{
                            model.removeLoader();
                            errorAlert('Une erreur s\'est produite durant l\'opération');
                        }
                    }
                )
        }
    },


}