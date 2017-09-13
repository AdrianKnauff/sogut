<?php

namespace Sogut\Controller\page\pub;
use \Sogut\Core\Config;


/**
 * Description of IndexController
 *
 * @author Adri
 */
class IndexController extends PublicPageController {

    public function __construct() {
        parent::__construct();
        $this->content = 'index.php';
        $this->navElem = 'index';
    }

    public function output() {
        $this->title = Config::getInstance()->title;
        $this->description = 'Startseite von ' . Config::getInstance()->title;
        parent::output();
    }

}