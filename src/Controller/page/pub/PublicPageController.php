<?php

namespace Sogut\Controller\page\pub;

use Sogut\Controller\page\AbstractPageController;

/**
 * Description of ContentController
 *
 * @author Adri
 */
class PublicPageController extends AbstractPageController {

    public function __construct() {
        parent::__construct();
        $this->stub = 'src/View/stub.php';
    }

}