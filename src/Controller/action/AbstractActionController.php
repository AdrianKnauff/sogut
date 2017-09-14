<?php

namespace Sogut\Controller\action;

use Sogut\Controller\AbstractController;

/**
 * Description of AbstractActionController
 *
 * @author Adri
 */
class AbstractActionController extends AbstractController {

    public function __construct() {
        parent::__construct();
    }

    public function output() {
        include $this->content;
    }

}