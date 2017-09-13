<?php

namespace Sogut\Controller\page\pub;

use Sogut\Controller\page\pub\PublicPageController;
use application\Controller;
use Sogut\Core\Config;

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
        $this->title = "Impressum von " .Config::getInstance()->title;
        $this->description = 'Das Impressum der Seite ' . Config::getInstance()->title;
        parent::output();
    }

}