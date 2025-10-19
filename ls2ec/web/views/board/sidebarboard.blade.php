<div class="col-lg-3 col-md-4 col-12">
    <div class="position-sticky t-100">
        <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-secondary-light">
                <div class="widget-user-image">
                    <img class="rounded-circle bg-danger" src="{{ assets   }}images/front-end-img/avatar/1.jpg" alt="User Avatar">
                </div>
                <h3 class="widget-user-username">{!! App::$user->getUsername() !!} </h3>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav d-block nav-stacked fs-16" id="pills-tab23" role="tablist">

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'myboard') ? 'active' : '' }}" href="{{route('myboard')}}">
                            <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span>@tt("My Courses")
                        </a>
                    </li>

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'managecourses') ? 'active' : '' }}" href="{{route('managecourses')}}">
                            <span class="me-10 icon-Book"></span>@tt("Managed Courses")
                        </a>
                    </li>
                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link {{ str_contains($_SERVER['REQUEST_URI'], 'payments') ? 'active' : '' }}" href="{{route('payments')}}">
                            <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span>@tt("Payments")
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