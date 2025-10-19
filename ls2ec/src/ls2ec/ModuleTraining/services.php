<?php
            //ModuleTraining
		
        require '../../../admin/header.php';
        
// verification token
//

        use Genesis as g;
        use Request as R;
        
        header("Access-Control-Allow-Origin: *");
                

		$academiesCtrl = new AcademiesController();
		$articleCtrl = new ArticleController();
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
		$tagsCtrl = new TagsController();
		$user_coursesCtrl = new User_coursesController();
		$user_subscriptionCtrl = new User_subscriptionController();
		$user_tokenCtrl = new User_tokenController();
		
     (new Request('hello'));

     switch (R::get('path')) {
                
        case 'academies._new':
                g::json_encode($academiesCtrl->formView());
                break;
        case 'academies.create':
                g::json_encode($academiesCtrl->createAction());
                break;
        case 'academies._edit':
                g::json_encode($academiesCtrl->formView(R::get("id")));
                break;
        case 'academies.update':
                g::json_encode($academiesCtrl->updateAction(R::get("id")));
                break;
        case 'academies._show':
                $academiesCtrl->detailView(R::get("id"));
                break;
        case 'academies._delete':
                g::json_encode($academiesCtrl->deleteAction(R::get("id")));
                break;
        case 'academies._deletegroup':
                g::json_encode($academiesCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'academies.datatable':
                g::json_encode($academiesCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'article._new':
                g::json_encode($articleCtrl->formView());
                break;
        case 'article.create':
                g::json_encode($articleCtrl->createAction());
                break;
        case 'article._edit':
                g::json_encode($articleCtrl->formView(R::get("id")));
                break;
        case 'article.update':
                g::json_encode($articleCtrl->updateAction(R::get("id")));
                break;
        case 'article._show':
                $articleCtrl->detailView(R::get("id"));
                break;
        case 'article._delete':
                g::json_encode($articleCtrl->deleteAction(R::get("id")));
                break;
        case 'article._deletegroup':
                g::json_encode($articleCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'article.datatable':
                g::json_encode($articleCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'course_activity._new':
                g::json_encode($course_activityCtrl->formView());
                break;
        case 'course_activity.create':
                g::json_encode($course_activityCtrl->createAction());
                break;
        case 'course_activity._edit':
                g::json_encode($course_activityCtrl->formView(R::get("id")));
                break;
        case 'course_activity.update':
                g::json_encode($course_activityCtrl->updateAction(R::get("id")));
                break;
        case 'course_activity._show':
                $course_activityCtrl->detailView(R::get("id"));
                break;
        case 'course_activity._delete':
                g::json_encode($course_activityCtrl->deleteAction(R::get("id")));
                break;
        case 'course_activity._deletegroup':
                g::json_encode($course_activityCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'course_activity.datatable':
                g::json_encode($course_activityCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'course_section._new':
                g::json_encode($course_sectionCtrl->formView());
                break;
        case 'course_section.create':
                g::json_encode($course_sectionCtrl->createAction());
                break;
        case 'course_section._edit':
                g::json_encode($course_sectionCtrl->formView(R::get("id")));
                break;
        case 'course_section.update':
                g::json_encode($course_sectionCtrl->updateAction(R::get("id")));
                break;
        case 'course_section._show':
                $course_sectionCtrl->detailView(R::get("id"));
                break;
        case 'course_section._delete':
                g::json_encode($course_sectionCtrl->deleteAction(R::get("id")));
                break;
        case 'course_section._deletegroup':
                g::json_encode($course_sectionCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'course_section.datatable':
                g::json_encode($course_sectionCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'courses._new':
                g::json_encode($coursesCtrl->formView());
                break;
        case 'courses.create':
                g::json_encode($coursesCtrl->createAction());
                break;
        case 'courses._edit':
                g::json_encode($coursesCtrl->formView(R::get("id")));
                break;
        case 'courses.update':
                g::json_encode($coursesCtrl->updateAction(R::get("id")));
                break;
        case 'courses._show':
                $coursesCtrl->detailView(R::get("id"));
                break;
        case 'courses._delete':
                g::json_encode($coursesCtrl->deleteAction(R::get("id")));
                break;
        case 'courses._deletegroup':
                g::json_encode($coursesCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'courses.datatable':
                g::json_encode($coursesCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'courses_tag._new':
                g::json_encode($courses_tagCtrl->formView());
                break;
        case 'courses_tag.create':
                g::json_encode($courses_tagCtrl->createAction());
                break;
        case 'courses_tag._edit':
                g::json_encode($courses_tagCtrl->formView(R::get("id")));
                break;
        case 'courses_tag.update':
                g::json_encode($courses_tagCtrl->updateAction(R::get("id")));
                break;
        case 'courses_tag._show':
                $courses_tagCtrl->detailView(R::get("id"));
                break;
        case 'courses_tag._delete':
                g::json_encode($courses_tagCtrl->deleteAction(R::get("id")));
                break;
        case 'courses_tag._deletegroup':
                g::json_encode($courses_tagCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'courses_tag.datatable':
                g::json_encode($courses_tagCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'labs._new':
                g::json_encode($labsCtrl->formView());
                break;
        case 'labs.create':
                g::json_encode($labsCtrl->createAction());
                break;
        case 'labs._edit':
                g::json_encode($labsCtrl->formView(R::get("id")));
                break;
        case 'labs.update':
                g::json_encode($labsCtrl->updateAction(R::get("id")));
                break;
        case 'labs._show':
                $labsCtrl->detailView(R::get("id"));
                break;
        case 'labs._delete':
                g::json_encode($labsCtrl->deleteAction(R::get("id")));
                break;
        case 'labs._deletegroup':
                g::json_encode($labsCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'labs.datatable':
                g::json_encode($labsCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'labsreservation._new':
                g::json_encode($labsreservationCtrl->formView());
                break;
        case 'labsreservation.create':
                g::json_encode($labsreservationCtrl->createAction());
                break;
        case 'labsreservation._edit':
                g::json_encode($labsreservationCtrl->formView(R::get("id")));
                break;
        case 'labsreservation.update':
                g::json_encode($labsreservationCtrl->updateAction(R::get("id")));
                break;
        case 'labsreservation._show':
                $labsreservationCtrl->detailView(R::get("id"));
                break;
        case 'labsreservation._delete':
                g::json_encode($labsreservationCtrl->deleteAction(R::get("id")));
                break;
        case 'labsreservation._deletegroup':
                g::json_encode($labsreservationCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'labsreservation.datatable':
                g::json_encode($labsreservationCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'labs_keys._new':
                g::json_encode($labs_keysCtrl->formView());
                break;
        case 'labs_keys.create':
                g::json_encode($labs_keysCtrl->createAction());
                break;
        case 'labs_keys._edit':
                g::json_encode($labs_keysCtrl->formView(R::get("id")));
                break;
        case 'labs_keys.update':
                g::json_encode($labs_keysCtrl->updateAction(R::get("id")));
                break;
        case 'labs_keys._show':
                $labs_keysCtrl->detailView(R::get("id"));
                break;
        case 'labs_keys._delete':
                g::json_encode($labs_keysCtrl->deleteAction(R::get("id")));
                break;
        case 'labs_keys._deletegroup':
                g::json_encode($labs_keysCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'labs_keys.datatable':
                g::json_encode($labs_keysCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'packtokken._new':
                g::json_encode($packtokkenCtrl->formView());
                break;
        case 'packtokken.create':
                g::json_encode($packtokkenCtrl->createAction());
                break;
        case 'packtokken._edit':
                g::json_encode($packtokkenCtrl->formView(R::get("id")));
                break;
        case 'packtokken.update':
                g::json_encode($packtokkenCtrl->updateAction(R::get("id")));
                break;
        case 'packtokken._show':
                $packtokkenCtrl->detailView(R::get("id"));
                break;
        case 'packtokken._delete':
                g::json_encode($packtokkenCtrl->deleteAction(R::get("id")));
                break;
        case 'packtokken._deletegroup':
                g::json_encode($packtokkenCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'packtokken.datatable':
                g::json_encode($packtokkenCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'provider._new':
                g::json_encode($providerCtrl->formView());
                break;
        case 'provider.create':
                g::json_encode($providerCtrl->createAction());
                break;
        case 'provider._edit':
                g::json_encode($providerCtrl->formView(R::get("id")));
                break;
        case 'provider.update':
                g::json_encode($providerCtrl->updateAction(R::get("id")));
                break;
        case 'provider._show':
                $providerCtrl->detailView(R::get("id"));
                break;
        case 'provider._delete':
                g::json_encode($providerCtrl->deleteAction(R::get("id")));
                break;
        case 'provider._deletegroup':
                g::json_encode($providerCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'provider.datatable':
                g::json_encode($providerCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'reviews._new':
                g::json_encode($reviewsCtrl->formView());
                break;
        case 'reviews.create':
                g::json_encode($reviewsCtrl->createAction());
                break;
        case 'reviews._edit':
                g::json_encode($reviewsCtrl->formView(R::get("id")));
                break;
        case 'reviews.update':
                g::json_encode($reviewsCtrl->updateAction(R::get("id")));
                break;
        case 'reviews._show':
                $reviewsCtrl->detailView(R::get("id"));
                break;
        case 'reviews._delete':
                g::json_encode($reviewsCtrl->deleteAction(R::get("id")));
                break;
        case 'reviews._deletegroup':
                g::json_encode($reviewsCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'reviews.datatable':
                g::json_encode($reviewsCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'subscription._new':
                g::json_encode($subscriptionCtrl->formView());
                break;
        case 'subscription.create':
                g::json_encode($subscriptionCtrl->createAction());
                break;
        case 'subscription._edit':
                g::json_encode($subscriptionCtrl->formView(R::get("id")));
                break;
        case 'subscription.update':
                g::json_encode($subscriptionCtrl->updateAction(R::get("id")));
                break;
        case 'subscription._show':
                $subscriptionCtrl->detailView(R::get("id"));
                break;
        case 'subscription._delete':
                g::json_encode($subscriptionCtrl->deleteAction(R::get("id")));
                break;
        case 'subscription._deletegroup':
                g::json_encode($subscriptionCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'subscription.datatable':
                g::json_encode($subscriptionCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'tags._new':
                g::json_encode($tagsCtrl->formView());
                break;
        case 'tags.create':
                g::json_encode($tagsCtrl->createAction());
                break;
        case 'tags._edit':
                g::json_encode($tagsCtrl->formView(R::get("id")));
                break;
        case 'tags.update':
                g::json_encode($tagsCtrl->updateAction(R::get("id")));
                break;
        case 'tags._show':
                $tagsCtrl->detailView(R::get("id"));
                break;
        case 'tags._delete':
                g::json_encode($tagsCtrl->deleteAction(R::get("id")));
                break;
        case 'tags._deletegroup':
                g::json_encode($tagsCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'tags.datatable':
                g::json_encode($tagsCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'user_courses._new':
                g::json_encode($user_coursesCtrl->formView());
                break;
        case 'user_courses.create':
                g::json_encode($user_coursesCtrl->createAction());
                break;
        case 'user_courses._edit':
                g::json_encode($user_coursesCtrl->formView(R::get("id")));
                break;
        case 'user_courses.update':
                g::json_encode($user_coursesCtrl->updateAction(R::get("id")));
                break;
        case 'user_courses._show':
                $user_coursesCtrl->detailView(R::get("id"));
                break;
        case 'user_courses._delete':
                g::json_encode($user_coursesCtrl->deleteAction(R::get("id")));
                break;
        case 'user_courses._deletegroup':
                g::json_encode($user_coursesCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'user_courses.datatable':
                g::json_encode($user_coursesCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'user_subscription._new':
                g::json_encode($user_subscriptionCtrl->formView());
                break;
        case 'user_subscription.create':
                g::json_encode($user_subscriptionCtrl->createAction());
                break;
        case 'user_subscription._edit':
                g::json_encode($user_subscriptionCtrl->formView(R::get("id")));
                break;
        case 'user_subscription.update':
                g::json_encode($user_subscriptionCtrl->updateAction(R::get("id")));
                break;
        case 'user_subscription._show':
                $user_subscriptionCtrl->detailView(R::get("id"));
                break;
        case 'user_subscription._delete':
                g::json_encode($user_subscriptionCtrl->deleteAction(R::get("id")));
                break;
        case 'user_subscription._deletegroup':
                g::json_encode($user_subscriptionCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'user_subscription.datatable':
                g::json_encode($user_subscriptionCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'user_token._new':
                g::json_encode($user_tokenCtrl->formView());
                break;
        case 'user_token.create':
                g::json_encode($user_tokenCtrl->createAction());
                break;
        case 'user_token._edit':
                g::json_encode($user_tokenCtrl->formView(R::get("id")));
                break;
        case 'user_token.update':
                g::json_encode($user_tokenCtrl->updateAction(R::get("id")));
                break;
        case 'user_token._show':
                $user_tokenCtrl->detailView(R::get("id"));
                break;
        case 'user_token._delete':
                g::json_encode($user_tokenCtrl->deleteAction(R::get("id")));
                break;
        case 'user_token._deletegroup':
                g::json_encode($user_tokenCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'user_token.datatable':
                g::json_encode($user_tokenCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

	
        default:
            g::json_encode(['success' => false, 'error' => ['message' => "404 : action note found", 'route' => R::get('path')]]);
            break;
     }

