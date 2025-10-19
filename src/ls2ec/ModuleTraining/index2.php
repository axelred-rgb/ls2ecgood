<?php
            //ModuleTraining
        
        require '../../../admin/header.php';
        
// move comment scope to enable authentication
if (!isset($_SESSION[ADMIN]) and $_GET['path'] != 'connexion') {
    header("location: " . __env . 'admin/login.php');
}

global $viewdir, $moduledata;
$viewdir[] = __DIR__ . '/Resource/views';

$moduledata = Dvups_module::init('ModuleTraining');
                

		$academiesCtrl = new AcademiesController();
		$articleCtrl = new ArticleController();
		$codepromoCtrl = new CodepromoController();
		$course_activityCtrl = new Course_activityController();
		$course_sectionCtrl = new Course_sectionController();
		$coursesCtrl = new CoursesController();
		$courses_tagCtrl = new Courses_tagController();
		$labsCtrl = new LabsController();
		$labsreservationCtrl = new LabsreservationController();
		$labs_keysCtrl = new Labs_keysController();
		$packtokkenCtrl = new PacktokkenController();
		$providerCtrl = new ProviderController();
		$reviewsCtrl = new ReviewsController();
		$subscriptionCtrl = new SubscriptionController();
		$subscription_coursesCtrl = new Subscription_coursesController();
		$tagsCtrl = new TagsController();
		$user_coursesCtrl = new User_coursesController();
		$user_subscriptionCtrl = new User_subscriptionController();
		$user_tokenCtrl = new User_tokenController();
		

(new Request('layout'));

switch (Request::get('path')) {

    case 'layout':
        Genesis::renderView("admin.overview");
        break;
        
    case 'academies/index':
        $academiesCtrl->listView();
        break;

    case 'article/index':
        $articleCtrl->listView();
        break;

    case 'codepromo/index':
        $codepromoCtrl->listView();
        break;

    case 'course-activity/index':
        $course_activityCtrl->listView();
        break;

    case 'course-section/index':
        $course_sectionCtrl->listView();
        break;

    case 'courses/index':
        $coursesCtrl->listView();
        break;

    case 'courses-tag/index':
        $courses_tagCtrl->listView();
        break;

    case 'labs/index':
        $labsCtrl->listView();
        break;

    case 'labsreservation/index':
        $labsreservationCtrl->listView();
        break;

    case 'labs-keys/index':
        $labs_keysCtrl->listView();
        break;

    case 'packtokken/index':
        $packtokkenCtrl->listView();
        break;

    case 'provider/index':
        $providerCtrl->listView();
        break;

    case 'reviews/index':
        $reviewsCtrl->listView();
        break;

    case 'subscription/index':
        $subscriptionCtrl->listView();
        break;

    case 'subscription-courses/index':
        $subscription_coursesCtrl->listView();
        break;

    case 'tags/index':
        $tagsCtrl->listView();
        break;

    case 'user-courses/index':
        $user_coursesCtrl->listView();
        break;

    case 'user-subscription/index':
        $user_subscriptionCtrl->listView();
        break;

    case 'user-token/index':
        $user_tokenCtrl->listView();
        break;

		
    default:
        Genesis::renderView('404', ['page' => Request::get('path')]);
        break;
}
    
    