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

    public $stub = '';
    // metatags
    public $title = 'TODO:Title';
    public $description = '';
    // nav
    public $navElem = '';
    public $showNav = TRUE;
    // script
    public $scripts = [];
    public $scriptsPlain = [];
    // css
    public $css = [];
    public $cssPlain = [];

    public $canonicalUrl = "";
    
    public function __construct() {
        parent::__construct();
        $this->title = Config::getInstance()->title;
        $this->addScriptPlain('<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>');
        $this->addCSSPlain('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">');
        $this->addCSSUrl("css/style.css");
    }

    public function output() {
        include $this->stub;
    }

    public function addScriptPlain($script) {
        $this->scriptsPlain[] = $script;
    }

    public function addScriptUrl($scriptUrl) {
        $this->scripts[] = $scriptUrl;
    }

    public function addCSSPlain($css) {
        $this->cssPlain[] = $css;
    }

    public function addCSSUrl($cssUrl) {
        $this->css[] = $cssUrl;
    }

}