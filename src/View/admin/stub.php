<?php

use application\Controller;

if( filter_has_var( INPUT_GET, 'unset_logged_in_as_user' )) {
    unset($_SESSION['admin_logged_in_as_user']);
}

?><!DOCTYPE html>
<html lang="<?php echo Controller::$lang; ?>">
<head>
    <meta charset="utf-8"/>
    <base href="<?php echo Controller::$host."/"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
    <title><?php echo htmlspecialchars( $this->title ); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars( $this->description ); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars( $this->title ); ?>" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
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
    <div id="wrapper">
        <div id="inhalt" class="container-fluid">
            <?php include 'src/View/admin/content/'.$this->content; ?>
        </div>
    </div>
    <?php include 'src/View/footer.php'; ?>
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