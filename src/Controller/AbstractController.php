<?php

namespace Sogut\Controller;

use application\User;

/**
 * Zuständig zur Feststellung des Users/Admins
 * 
 * @author Adri
 */
abstract class AbstractController {

    public $content = '';
    public $loggedIn = FALSE;
    public $isAdmin = FALSE;
    public $requiresAdmin = FALSE;
    public $user = FALSE;
    
    public function __construct() {
//        $this->loggedIn = User::login_check();
//        if( $this->loggedIn === TRUE ) {
//            $this->isAdmin = User::isAdmin();
//            $this->user = User::getCurrentUser();
//            if($this->user === FALSE) {
//                User::logOut();
//                $this->loggedIn = FALSE;
//                $this->isAdmin = FALSE;
//            }
//        }
    }

    abstract public function output();
}