<style>
    .dropdown-container > li > a:focus, .dropdown-container > li > a.active{
        color: #ffffff !important;
    }
    .dropdown-container > li > a:focus, .dropdown-container > li > a:hover{
        color: #000000 !important;
    }
</style>
<div class="col-lg-3 col-md-4 col-12">
    <div class="position-sticky t-100">
        <div class="box box-widget widget-user-2">
            <a class="widget-user-header bg-secondary-light" href="{{route('myprofil')}}">
                <div >
                    <div class="widget-user-image">
                        <img class="rounded-circle bg-danger" src="{{ assets   }}images/front-end-img/avatar/1.jpg" alt="User Avatar">
                    </div>
                    <h3 class="widget-user-username">{!! App::$user->getUsername() !!} </h3>
                </div>
            </a>

            <div class="box-footer no-padding">
                <ul class="nav d-block nav-stacked fs-16" id="pills-tab23" role="tablist">
                    <?php
                        $showmenu = false;
                        if(count(App::$usersubscription) > 0){
                            $showmenu = true;
                        }
                        elseif(App::$user->getToken() > 0){
                            $showmenu = true;
                        }
                        else{
                            $showmenu = false;
                        }
                    ?>

                    @if(count(App::$usersubscription) > 0)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'myboard') ? 'active' : '' }}" href="{{route('myboard')}}">
                                <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span>@tt("My Courses")
                            </a>
                        </li>



                        <li class="nav-item bb-1">
                            <a target="_blank" class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'livre') || str_contains($_SERVER['REQUEST_URI'],'livres') ? 'active' : '' }}" href="{{route('livres')}}">
                                <span class="me-10 fa fa-book-reader"><span class="path1"></span><span class="path2"></span></span>@tt("Livres recommandés")
                            </a>
                        </li>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'myCertificates') ? 'active' : '' }}" href="{{route('myCertificates')}}">
                                <i class="me-10 fa fa-files-o fa-sm"></i>@tt("My Certificates")
                            </a>
                        </li>

                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'payments') ? 'active' : '' }}" href="{{route('payments')}}">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("Payments")
                            </a>
                        </li>



                    @else
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'freecourse') ? 'active' : '' }}" href="{{route('freecourse')}}">
                                <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span>@tt("Cours gratuits")
                            </a>
                        </li>
                    @endif

                    @if($showmenu)

                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'myexercise') || str_contains($_SERVER['REQUEST_URI'],'courseexercise') ? 'active' : '' }}" href="{{route('myexercise')}}">
                                    <span class="me-10 fa fa-book-reader"><span class="path1"></span><span class="path2"></span></span>@tt("My exercise")
                                </a>
                            </li>

                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'alllabs' )? 'active' : '' }}" href="{{route('alllabs')}}">
                                    <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("Labs")
                                </a>
                            </li>

                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'mylabs' )? 'active' : '' }}" href="{{route('mylabs')}}" >
                                    <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("My Labs")
                                </a>
                            </li>
                    @endif
                    
					
					
					<li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn {{ str_contains($_SERVER['REQUEST_URI'] , 'myresources' )? 'active' : '' }}"">
                                <i class="me-10 fa fa-bar-chart  fa-sm"></i>@tt("Resources")<i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('resources')}}">
                                        <i class="me-10 fa fa-users fa-sm"></i>@tt("Resources")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('myresources')}}">
                                        <i class="me-10 fa fa-files-o fa-sm"></i>@tt("My resources")
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                    @if(count(App::$usersubscription) <= 0)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'payments') ? 'active' : '' }}" href="{{route('payments')}}">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("Payments")
                            </a>
                        </li>
                    @endif

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'affiliationprogram') || str_contains($_SERVER['REQUEST_URI'],'updateinfosaffiliation') ? 'active' : '' }}" href="{{route('affiliationprogram')}}">
                            <span class="me-10 fa fa-euro"><span class="path1"></span><span class="path2"></span></span>@tt("Programme d'affiliation")
                        </a>
                    </li>

                    @if(!is_null(App::$mycodepromo))
                        @if(App::$mycodepromo->getId())
                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'mysessions') || str_contains($_SERVER['REQUEST_URI'],'mypaiementbysession') ? 'active' : '' }}" href="{{route('mysessions')}}">
                                    <span class="me-10 fa fa-euro"><span class="path1"></span><span class="path2"></span></span>@tt("Mes gains")
                                </a>
                            </li>
                        @endif
                    @endif



                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link" href="{{route('myprofil')}}">
                            <span class="me-10 fa fa-user"></span>@tt("My profile")
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="py-10 nav-link" href="{{route('logout')}}">
                            <span class="me-10 icon-Unlock"></span>@tt("Logout")
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        @if(App::$user->getRole() == 2 || App::$user->getRole() == 3 || App::$user->getRole() == -1 || App::$user->getRole() == -2)
            <div class="box box-widget widget-user-2">
                <a class="widget-user-header bg-secondary-light">
                    @tt("Administration")
                    @if(App::$user->getRole() == -1)
                        - @tt('Editeur')
                    @elseif(App::$user->getRole() == -2)
                        - @tt('Gestionnaire')
                    @else
                        - @tt('Administrateur')
                    @endif
                </a>

                <div class="box-footer no-padding">
                    <ul class="nav d-block nav-stacked fs-16" id="pills-tab23" role="tablist">

                        @if(App::$user->getRole() != -1)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'allpayment') ? 'active' : '' }}" href="{{route('allpayment')}}">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("All Payments")
                            </a>
                        </li>
                        @endif
                        @if(App::$user->getRole() != -2)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'manageexercise' )? 'active' : '' }}" href="{{route('manageexercise')}}" >
                                <i class="me-10 fa fa-book-open fa-sm"></i>@tt("Manage Exercise")
                            </a>
                        </li>
                        <!--<li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'managelivrerecommande' )? 'active' : '' }}" href="{{route('managelivrerecommande')}}" >
                                <i class="me-10 fa fa-book-open fa-sm"></i>@tt("Manage Livres recommandées")
                            </a>
                        </li>-->
                        
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'manageblog' )? 'active' : '' }}" href="{{route('manageblog')}}" >
                                <i class="me-10 fa fa-file fa-sm"></i>@tt("Blog")
                            </a>
                        </li>
                        @endif
                        @if(App::$user->getRole() != -1 && App::$user->getRole() != -2)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'givetoken' )? 'active' : '' }}" href="{{route('givetoken')}}" >
                                <i class="me-10 fas fa-coins fa-sm"></i>@tt("Give Tokens")
                            </a>
                        </li>
                        
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'codespromo' )? 'active' : '' }}" href="{{route('codespromo')}}" >
                                <i class="me-10 fas fa-coins fa-sm"></i>@tt("Codes promo")
                            </a>
                        </li>
                        @endif
                        @if(App::$user->getRole() != -2)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn {{ str_contains($_SERVER['REQUEST_URI'] , 'manageresources' )? 'active' : '' }}{{ str_contains($_SERVER['REQUEST_URI'] , 'manageresources' )? 'active' : '' }}">
                                <i class="me-10 fa fa-file fa-sm"></i>@tt("Manage resources")<i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('manageresources')}}" >
                                        <i class="me-10 fas fa-coins fa-sm"></i>@tt("Manage resources")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('purchaseresources')}}">
                                        <i class="me-10 fa fa-files-o fa-sm"></i>@tt("Product purchased")
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(App::$user->getRole() != -1 && App::$user->getRole() != -2)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn {{ str_contains($_SERVER['REQUEST_URI'] , 'assignCertificate' )? 'active' : '' }}{{ str_contains($_SERVER['REQUEST_URI'] , 'mysignature' )? 'active' : '' }}">
                                <i class="me-10 fa fa-file fa-sm"></i>@tt("Manage certificate")<i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('mysignature')}}">
                                        <i class="me-10 fa fa-gear fa-sm"></i>@tt("Settings")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('assignCertificate')}}">
                                        <i class="me-10 fa fa-files-o fa-sm"></i>@tt("Assign Certificate")
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn {{ str_contains($_SERVER['REQUEST_URI'] , 'affiliationtovalidate' )? 'active' : '' }}{{ str_contains($_SERVER['REQUEST_URI'] , 'codeaffiliationLis' )? 'active' : '' }}{{ str_contains($_SERVER['REQUEST_URI'] , 'affiliationtransaction' )? 'active' : '' }}">
                                <i class="me-10 fa fa-euro"></i>@tt("Programme d'affiliation")<i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('listsessionaffiliation')}}">
                                        <i class="me-10 fa fa-users fa-sm"></i>@tt("Liste des sessions")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('affiliationtovalidate')}}">
                                        <i class="me-10 fa fa-users fa-sm"></i>@tt("Demande de validation")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('entrepriselist')}}">
                                        <i class="me-10 fa fa-users fa-sm"></i>@tt("Liste des entreprises")
                                    </a>
                                </li>

                                @if(App::$user->getRole() == 3)
                                    <li class="nav-item bb-1">
                                        <a class="py-10 nav-link" href="{{route('sessionspacekola')}}">
                                            <i class="me-10 fa fa-users fa-sm"></i>@tt("Sessions spacekola")
                                        </a>
                                    </li>
                                @endif

                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('codeaffiliationList')}}">
                                        <i class="me-10 fa fa-code"></i>@tt("Code d'affiliation")
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif

                        @if(App::$user->getRole() != -1)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn {{ str_contains($_SERVER['REQUEST_URI'] , 'usersList' )? 'active' : '' }}{{ str_contains($_SERVER['REQUEST_URI'] , 'paimentsList' )? 'active' : '' }}{{ str_contains($_SERVER['REQUEST_URI'] , 'labreservationList' )? 'active' : '' }}">
                                <i class="me-10 fa fa-bar-chart  fa-sm"></i>@tt("Logs")<i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('usersList')}}">
                                        <i class="me-10 fa fa-users fa-sm"></i>@tt("Users list")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('paimentsList')}}">
                                        <i class="me-10 fa fa-files-o fa-sm"></i>@tt("Tokens Paiements list")
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="{{route('reservationList')}}">
                                        <i class="me-10 fa fa-files-o fa-sm"></i>@tt("Lab reservation list")
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>

            </div>
        @endif

        @if($showmenu)
            <div class="box">
                <div class="box-body">
                    <div class="course-price">
                        <div class="mb-5">
                            <div class="text-dark mb-2 text-center">
                                <span class="text-dark fw-600 h1">{!! App::$user->getToken() !!}</span>
                                <span class="text-muted h3 fw-normal ms-2">
                                    @tt("Tokens")
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <ul class="nav d-block nav-stacked fs-16" id="pills-tab24" role="tablist">
                        <li class="nav-item bb-1">
                            <a type="button"  href="{{route('purchasetoken')}}" class="waves-effect waves-light btn w-p100 btn-dark">
                                @tt("Purchase Tokens")
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        @endif
    </div>
    
</div>