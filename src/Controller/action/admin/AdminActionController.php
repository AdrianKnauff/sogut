<?php

namespace Sogut\Controller\action\admin;

use Sogut\Controller\action\AbstractActionController;

/**
 * Description of AdminActionController
 *
 * @author Adri
 */
class AdminActionController extends AbstractActionController{

    public function __construct() {
        parent::__construct();
    }

    public function output() {
        if($this->loggedIn !== TRUE) {
            $this->content = "src/View/admin/action/not-logged-in.php";
        }
        if($this->requiresAdmin === TRUE && $this->isAdmin !== TRUE) {
            $this->content = "src/View/admin/action/not-admin.php";
        }
        parent::output();
    }

}