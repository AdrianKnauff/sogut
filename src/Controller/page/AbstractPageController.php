<?php

namespace Sogut\Controller\page;

use Sogut\Controller\AbstractController;
use Sogut\Core\Config;

/**
 * Description of ContentController
 *
 * @author Adri
 */
abstract class AbstractPageController extends AbstractController {

    public $stub = 'default-stub-error';
    // metatags
    public $title = 'Title of your page';
    public $description = '';

    public $scripts = [];
    public $scriptsPlain = [];

    public $css = [];
    public $cssPlain = [];

    public $canonicalUrl = "";
    
    public function __construct() {
        parent::__construct();
        $this->title = Config::getInstance()->title;
    }

    public function output() {
        include $this->stub;
    }

    public function addScriptPlain(string $script) {
        $this->scriptsPlain[] = $script;
    }

    public function addScriptUrl(string $scriptUrl) {
        $this->scripts[] = $scriptUrl;
    }

    public function addCSSPlain(string $css) {
        $this->cssPlain[] = $css;
    }

    public function addCSSUrl(string $cssUrl) {
        $this->css[] = $cssUrl;
    }

}