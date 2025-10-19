<?php
define('USERAPP', __project_id . '_customer');
define('USER', __project_id . '_customer');
define('USERID', __project_id . '_customer_id');

define('USERCOOKIE', __project_id . '_usercookie');
define('USERMAIL', __project_id . '_usermail');
define('USERPHONE', __project_id . '_userphone');
define('USERPASS', __project_id . '_userpass');

/**
 * @return \User Description
 */
function userapp()
{

    if (isset($_SESSION[USER]))
        return unserialize($_SESSION[USER]);

    return new User();
}

    require 'Entity/Instructor.php';
    require 'Form/InstructorForm.php';
    require 'Datatable/InstructorTable.php';
    require 'Controller/InstructorController.php';

require 'Entity/User.php';
require 'Form/UserForm.php';
require 'Datatable/UserTable.php';
require 'Controller/UserController.php';
require 'Controller/UserFrontController.php';

require 'ModuleUser.php';

require 'Entity/Sessioncodepromo.php';
require 'Form/SessioncodepromoForm.php';
require 'Datatable/SessioncodepromoTable.php';
require 'Controller/SessioncodepromoController.php';
//require 'Controller/SessioncodepromoFrontController.php';



require 'Entity/Sessionpaiement.php';
require 'Form/SessionpaiementForm.php';
require 'Datatable/SessionpaiementTable.php';
require 'Controller/SessionpaiementController.php';


  