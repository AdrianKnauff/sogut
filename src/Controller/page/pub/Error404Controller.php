<?php

namespace application\controller\page\pub;

use application\controller\page\pub\PublicPageController;

/**
 * Description of 404Controller
 *
 * @author Adri
 */
class Error404Controller extends PublicPageController {

    public function __construct() {
        parent::__construct();
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        $this->title = '404 - File not Found';
        $this->description = 'Die Seite wurde nicht gefunden.';
        $this->content = '404.php';
    }

}