<?php


use dclass\devups\Datatable\Datatable as Datatable;

class UserTable extends Datatable
{


    public function __construct($user = null, $datatablemodel = [])
    {
        parent::__construct($user, $datatablemodel);
    }

    public static function init(\User $user = null)
    {

        $dt = new UserTable($user);
        $dt->entity = $user;

        return $dt;
    }

    public function buildindextable()
    {

        $this->datatablemodel = [
            ['header' => t('user.id', '#'), 'value' => 'id'],
            ['header' => t('user.firstname', 'Firstname'), 'value' => 'firstname'],
            ['header' => t('user.email', 'Email'), 'value' => 'email'],
            ['header' => t('user.telephone', 'Telephone'), 'value' => 'telephone'],
            ['header' => t('user.last_login', 'Last_login'), 'value' => 'lastLogin'],
            ['header' => t('user.username', 'Username'), 'value' => 'username']
        ];

        $this->order_by = " this.id desc ";
        $this->per_page = 30;
        return $this;
    }

    public function builddetailtable()
    {
        $this->datatablemodel = [
            ['label' => t('user.id'), 'value' => 'id'],
            ['label' => t('user.firstname'), 'value' => 'firstname'],
            ['label' => t('user.lastname'), 'value' => 'lastname'],
            ['label' => t('user.email'), 'value' => 'email'],
            ['label' => t('user.sex'), 'value' => 'sex'],
            ['label' => t('user.telephone'), 'value' => 'telephone'],
            ['label' => t('user.password'), 'value' => 'password'],
            ['label' => t('user.resettingpassword'), 'value' => 'resettingpassword'],
            ['label' => t('user.is_activated'), 'value' => 'is_activated'],
            ['label' => t('user.activationcode'), 'value' => 'activationcode'],
            ['label' => t('user.birthdate'), 'value' => 'birthdate'],
            ['label' => t('user.lang'), 'value' => 'lang'],
            ['label' => t('user.username'), 'value' => 'username']
        ];
        // TODO: overwrite datatable attribute for this view
        return $this;
    }

    public function router()
    {
        $tablemodel = Request::get("tablemodel", null);
        if ($tablemodel && method_exists($this, "build" . $tablemodel . "table") && $result = call_user_func(array($this, "build" . $tablemodel . "table"))) {
            return $result;
        } else
            switch ($tablemodel) {
                // case "": return this->
                default:
                    return $this->buildindextable();
            }

    }

}
