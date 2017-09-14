<?php

namespace Sogut\Controller\page\admin;

use Sogut\Controller\page\admin\AdminPageController;

/**
 * Description of IndexController
 *
 * @author Adri
 */
class IndexController extends AdminPageController {

    public function __construct() {
        parent::__construct();
        $this->content = 'index.php';
    }
    
    public function output() {
        $this->title = "Admin-Bereich";
        $this->description = "Admin-Bereich";
        parent::output();
    }

}