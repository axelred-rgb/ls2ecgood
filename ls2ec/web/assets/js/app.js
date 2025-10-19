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
                                model.removeLoader();
                                console.log(response);
                                $("#log").html(``)
                                if (response.success) {
                                    $('.message').html(`
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    ${'Achat éffectué avec succès.'}
                                </div>
                                `);

                                    setTimeout(function () {
                                        window.location.href = response.redirect;
                                    }, 2000)
                                }
                                $('.message').html(dform.geterror(response.error));
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
                        ${'Reservation éffectué avec succès.'}
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

    }
}