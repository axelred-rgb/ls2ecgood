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
            <a class="widget-user-header bg-secondary-light" href="<?php echo e(route('myprofil')); ?>">
                <div >
                    <div class="widget-user-image">
                        <img class="rounded-circle bg-danger" src="<?php echo e(assets); ?>images/front-end-img/avatar/1.jpg" alt="User Avatar">
                    </div>
                    <h3 class="widget-user-username"><?php echo App::$user->getUsername(); ?> </h3>
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

                    
                    <?php if(count(App::$usersubscription) > 0): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'myboard') ? 'active' : ''); ?>" href="<?php echo e(route('myboard')); ?>">
                                <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span><?php echo tt("My Courses"); ?>
                            </a>
                        </li>



                        <li class="nav-item bb-1">
                            <a target="_blank" class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'livre') || str_contains($_SERVER['REQUEST_URI'],'livres') ? 'active' : ''); ?>" href="<?php echo e(route('livres')); ?>">
                                <span class="me-10 fa fa-book-reader"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Livres recommandés"); ?>
                            </a>
                        </li>
                        

                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'payments') ? 'active' : ''); ?>" href="<?php echo e(route('payments')); ?>">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Payments"); ?>
                            </a>
                        </li>



                    <?php else: ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'freecourse') ? 'active' : ''); ?>" href="<?php echo e(route('freecourse')); ?>">
                                <span class="me-10 icon-Book-open"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Cours gratuits"); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if($showmenu): ?>

                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'myexercise') || str_contains($_SERVER['REQUEST_URI'],'courseexercise') ? 'active' : ''); ?>" href="<?php echo e(route('myexercise')); ?>">
                                    <span class="me-10 fa fa-book-reader"><span class="path1"></span><span class="path2"></span></span><?php echo tt("My exercise"); ?>
                                </a>
                            </li>

                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'alllabs' )? 'active' : ''); ?>" href="<?php echo e(route('alllabs')); ?>">
                                    <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Labs"); ?>
                                </a>
                            </li>

                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'mylabs' )? 'active' : ''); ?>" href="<?php echo e(route('mylabs')); ?>" >
                                    <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("My Labs"); ?>
                                </a>
                            </li>
                    <?php endif; ?>
                    
					
					
					<li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'myresources' )? 'active' : ''); ?>"">
                                <i class="me-10 fa fa-bar-chart  fa-sm"></i><?php echo tt("Resources"); ?><i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('resources')); ?>">
                                        <i class="me-10 fa fa-users fa-sm"></i><?php echo tt("Resources"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('myresources')); ?>">
                                        <i class="me-10 fa fa-files-o fa-sm"></i><?php echo tt("My resources"); ?>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>

                    <?php if(count(App::$usersubscription) <= 0): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'payments') ? 'active' : ''); ?>" href="<?php echo e(route('payments')); ?>">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Payments"); ?>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'affiliationprogram') || str_contains($_SERVER['REQUEST_URI'],'updateinfosaffiliation') ? 'active' : ''); ?>" href="<?php echo e(route('affiliationprogram')); ?>">
                            <span class="me-10 fa fa-euro"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Programme d'affiliation"); ?>
                        </a>
                    </li>

                    <?php if(!is_null(App::$mycodepromo)): ?>
                        <?php if(App::$mycodepromo->getId()): ?>
                            <li class="nav-item bb-1">
                                <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'mysessions') || str_contains($_SERVER['REQUEST_URI'],'mypaiementbysession') ? 'active' : ''); ?>" href="<?php echo e(route('mysessions')); ?>">
                                    <span class="me-10 fa fa-euro"><span class="path1"></span><span class="path2"></span></span><?php echo tt("Mes gains"); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>



                    <li class="nav-item bb-1">
                        <a class="py-10 nav-link" href="<?php echo e(route('myprofil')); ?>">
                            <span class="me-10 fa fa-user"></span><?php echo tt("My profile"); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="py-10 nav-link" href="<?php echo e(route('logout')); ?>">
                            <span class="me-10 icon-Unlock"></span><?php echo tt("Logout"); ?>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <?php if(App::$user->getRole() == 2 || App::$user->getRole() == 3 || App::$user->getRole() == -1 || App::$user->getRole() == -2): ?>
            <div class="box box-widget widget-user-2">
                <a class="widget-user-header bg-secondary-light">
                    <?php echo tt("Administration"); ?>
                    <?php if(App::$user->getRole() == -1): ?>
                        - <?php echo tt('Editeur'); ?>
                    <?php elseif(App::$user->getRole() == -2): ?>
                        - <?php echo tt('Gestionnaire'); ?>
                    <?php else: ?>
                        - <?php echo tt('Administrateur'); ?>
                    <?php endif; ?>
                </a>

                <div class="box-footer no-padding">
                    <ul class="nav d-block nav-stacked fs-16" id="pills-tab23" role="tablist">

                        <?php if(App::$user->getRole() != -1): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'], 'allpayment') ? 'active' : ''); ?>" href="<?php echo e(route('allpayment')); ?>">
                                <span class="me-10 icon-Money"><span class="path1"></span><span class="path2"></span></span><?php echo tt("All Payments"); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(App::$user->getRole() != -2): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'manageexercise' )? 'active' : ''); ?>" href="<?php echo e(route('manageexercise')); ?>" >
                                <i class="me-10 fa fa-book-open fa-sm"></i><?php echo tt("Manage Exercise"); ?>
                            </a>
                        </li>
                        <!--<li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'managelivrerecommande' )? 'active' : ''); ?>" href="<?php echo e(route('managelivrerecommande')); ?>" >
                                <i class="me-10 fa fa-book-open fa-sm"></i><?php echo tt("Manage Livres recommandées"); ?>
                            </a>
                        </li>-->
                        
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'manageblog' )? 'active' : ''); ?>" href="<?php echo e(route('manageblog')); ?>" >
                                <i class="me-10 fa fa-file fa-sm"></i><?php echo tt("Blog"); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(App::$user->getRole() != -1 && App::$user->getRole() != -2): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'givetoken' )? 'active' : ''); ?>" href="<?php echo e(route('givetoken')); ?>" >
                                <i class="me-10 fas fa-coins fa-sm"></i><?php echo tt("Give Tokens"); ?>
                            </a>
                        </li>
                        
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'codespromo' )? 'active' : ''); ?>" href="<?php echo e(route('codespromo')); ?>" >
                                <i class="me-10 fas fa-coins fa-sm"></i><?php echo tt("Codes promo"); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(App::$user->getRole() != -2): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'manageresources' )? 'active' : ''); ?><?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'manageresources' )? 'active' : ''); ?>">
                                <i class="me-10 fa fa-file fa-sm"></i><?php echo tt("Manage resources"); ?><i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('manageresources')); ?>" >
                                        <i class="me-10 fas fa-coins fa-sm"></i><?php echo tt("Manage resources"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('purchaseresources')); ?>">
                                        <i class="me-10 fa fa-files-o fa-sm"></i><?php echo tt("Product purchased"); ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if(App::$user->getRole() != -1 && App::$user->getRole() != -2): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'assignCertificate' )? 'active' : ''); ?><?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'mysignature' )? 'active' : ''); ?>">
                                <i class="me-10 fa fa-file fa-sm"></i><?php echo tt("Manage certificate"); ?><i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('mysignature')); ?>">
                                        <i class="me-10 fa fa-gear fa-sm"></i><?php echo tt("Settings"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('assignCertificate')); ?>">
                                        <i class="me-10 fa fa-files-o fa-sm"></i><?php echo tt("Assign Certificate"); ?>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'affiliationtovalidate' )? 'active' : ''); ?><?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'codeaffiliationLis' )? 'active' : ''); ?><?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'affiliationtransaction' )? 'active' : ''); ?>">
                                <i class="me-10 fa fa-euro"></i><?php echo tt("Programme d'affiliation"); ?><i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('listsessionaffiliation')); ?>">
                                        <i class="me-10 fa fa-users fa-sm"></i><?php echo tt("Liste des sessions"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('affiliationtovalidate')); ?>">
                                        <i class="me-10 fa fa-users fa-sm"></i><?php echo tt("Demande de validation"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('entrepriselist')); ?>">
                                        <i class="me-10 fa fa-users fa-sm"></i><?php echo tt("Liste des entreprises"); ?>
                                    </a>
                                </li>

                                <?php if(App::$user->getRole() == 3): ?>
                                    <li class="nav-item bb-1">
                                        <a class="py-10 nav-link" href="<?php echo e(route('sessionspacekola')); ?>">
                                            <i class="me-10 fa fa-users fa-sm"></i><?php echo tt("Sessions spacekola"); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('codeaffiliationList')); ?>">
                                        <i class="me-10 fa fa-code"></i><?php echo tt("Code d'affiliation"); ?>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if(App::$user->getRole() != -1): ?>
                        <li class="nav-item bb-1">
                            <a class="py-10 nav-link dropdown-btn <?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'usersList' )? 'active' : ''); ?><?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'paimentsList' )? 'active' : ''); ?><?php echo e(str_contains($_SERVER['REQUEST_URI'] , 'labreservationList' )? 'active' : ''); ?>">
                                <i class="me-10 fa fa-bar-chart  fa-sm"></i><?php echo tt("Logs"); ?><i class="fa fa-caret-down pull-right"></i>
                            </a>
                            <ul class="dropdown-container nav ">
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('usersList')); ?>">
                                        <i class="me-10 fa fa-users fa-sm"></i><?php echo tt("Users list"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('paimentsList')); ?>">
                                        <i class="me-10 fa fa-files-o fa-sm"></i><?php echo tt("Tokens Paiements list"); ?>
                                    </a>
                                </li>
                                <li class="nav-item bb-1">
                                    <a class="py-10 nav-link" href="<?php echo e(route('reservationList')); ?>">
                                        <i class="me-10 fa fa-files-o fa-sm"></i><?php echo tt("Lab reservation list"); ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        <?php endif; ?>

        <?php if($showmenu): ?>
            <div class="box">
                <div class="box-body">
                    <div class="course-price">
                        <div class="mb-5">
                            <div class="text-dark mb-2 text-center">
                                <span class="text-dark fw-600 h1"><?php echo App::$user->getToken(); ?></span>
                                <span class="text-muted h3 fw-normal ms-2">
                                    <?php echo tt("Tokens"); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <ul class="nav d-block nav-stacked fs-16" id="pills-tab24" role="tablist">
                        <li class="nav-item bb-1">
                            <a type="button"  href="<?php echo e(route('purchasetoken')); ?>" class="waves-effect waves-light btn w-p100 btn-dark">
                                <?php echo tt("Purchase Tokens"); ?>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        <?php endif; ?>
    </div>
    
</div><?php /**PATH /home/yvafrkyk/public_html/web/views/board/sidebarboard.blade.php ENDPATH**/ ?>