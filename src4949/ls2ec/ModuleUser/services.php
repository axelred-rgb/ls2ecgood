<?php
            //ModuleUser
		
        require '../../../admin/header.php';
        
// verification token
//

        use Genesis as g;
        use Request as R;
        
        header("Access-Control-Allow-Origin: *");
                

		$userCtrl = new UserController();
		$blacklistCtrl = new BlacklistController();
		
     (new Request('hello'));

     switch (R::get('path')) {
                
        case 'user._new':
                g::json_encode($userCtrl->formView());
                break;
        case 'user.create':
                g::json_encode($userCtrl->createAction());
                break;
        case 'user._edit':
                g::json_encode($userCtrl->formView(R::get("id")));
                break;
        case 'user.update':
                g::json_encode($userCtrl->updateAction(R::get("id")));
                break;
        case 'user._show':
                $userCtrl->detailView(R::get("id"));
                break;
        case 'user._delete':
                g::json_encode($userCtrl->deleteAction(R::get("id")));
                break;
        case 'user._deletegroup':
                g::json_encode($userCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'user.datatable':
                g::json_encode($userCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

        case 'blacklist._new':
                g::json_encode($blacklistCtrl->formView());
                break;
        case 'blacklist.create':
                g::json_encode($blacklistCtrl->createAction());
                break;
        case 'blacklist._edit':
                g::json_encode($blacklistCtrl->formView(R::get("id")));
                break;
        case 'blacklist.update':
                g::json_encode($blacklistCtrl->updateAction(R::get("id")));
                break;
        case 'blacklist._show':
                $blacklistCtrl->detailView(R::get("id"));
                break;
        case 'blacklist._delete':
                g::json_encode($blacklistCtrl->deleteAction(R::get("id")));
                break;
        case 'blacklist._deletegroup':
                g::json_encode($blacklistCtrl->deletegroupAction(R::get("ids")));
                break;
        case 'blacklist.datatable':
                g::json_encode($blacklistCtrl->datatable(R::get('next'), R::get('per_page')));
                break;

	
        default:
            g::json_encode(['success' => false, 'error' => ['message' => "404 : action note found", 'route' => R::get('path')]]);
            break;
     }

