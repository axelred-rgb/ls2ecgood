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

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'myboard') ? 'active' : '' }}" href="{{route('myboard')}}">
                            <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span>@tt("My Courses")
                        </a>
                    </li>

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'myexercise') || str_contains($_SERVER['REQUEST_URI'],'courseexercise') ? 'active' : '' }}" href="{{route('myexercise')}}">
                            <span class="me-10 fa fa-book-reader"><span class="path1"></span><span class="path2"></span></span>@tt("My exercise")
                        </a>
                    </li>

{{--                    <li class="nav-item bb-1">--}}
{{--                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'managecourses') ? 'active' : '' }}" href="{{route('managecourses')}}">--}}
{{--                            <span class="me-10 icon-Book"></span>@tt("Managed Courses")--}}
{{--                        </a>--}}
{{--                    </li>--}}

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
                    @if(App::$user->getRole() == 2)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'allpayment') ? 'active' : '' }}" href="{{route('allpayment')}}">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("All Payments")
                            </a>
                        </li>
                    @endif

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
                    @if(App::$user->getRole() == 2)
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'manageexercise' )? 'active' : '' }}" href="{{route('manageexercise')}}" >
                                <i class="me-10 fa fa-book-open fa-sm"></i>@tt("Manage Exercise")
                            </a>
                        </li>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'] , 'manageblog' )? 'active' : '' }}" href="{{route('manageblog')}}" >
                                <i class="me-10 fa fa-file fa-sm"></i>@tt("Blog")
                            </a>
                        </li>
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
    </div>
    
</div>