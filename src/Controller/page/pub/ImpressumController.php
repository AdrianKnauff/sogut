<?php

namespace application\controller\page\pub;

use application\controller\page\pub\PublicPageController;
use application\Controller;

/**
 * Description of ImpressumController
 *
 * @author Adri
 */
class ImpressumController extends PublicPageController {
    
    public function __construct() {
        parent::__construct();
        $this->content = 'impressum.php';
        $this->navElem = 'impressum';
    }

    public function output() {
        $this->title = "Impressum von " . Controller::$title;
        $this->description = 'Das Impressum der Seite ' . Controller::$title;
        parent::output();
    }

}