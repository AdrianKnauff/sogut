<?php

use Sogut\Core\Config;

?><!DOCTYPE html>
<html lang="<?php echo Config::getInstance()->lang; ?>">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<base href="<?php echo Config::getInstance()->baseUrl."/"; ?>"/>
<title><?php echo htmlspecialchars( $this->title ); ?></title>
<meta name="description" content="<?php echo htmlspecialchars( $this->description ); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars( $this->title ); ?>">
<script
src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>
<?php
    foreach ($this->css as $cssUrl) {
        echo '<link href="'.$cssUrl.'" rel="stylesheet">';
    } 
    foreach ($this->cssPlain as $cssPlain) {
        echo $cssPlain;
    }
?>
</head>
<body>
<div id="wrapper" class="wrapper">
<div class="container-fluid">
<?php include 'src/View/content/'.$this->content; ?>
</div>
</div>
<?php
    foreach ($this->scripts as $scriptUrl) {
        echo '<script src="'.$scriptUrl.'"></script>';
    }
    foreach ($this->scriptsPlain as $scriptPlain) {
        echo $scriptPlain;
    }
?>
</body>
</html>