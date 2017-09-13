<?php

use application\Controller;
use application\classes\LoginType;

if($this->loggedIn === TRUE) {
?>
<ul class="nav" style="font-size:12px;">
<li<?php echo $this->navElem==='home'?' class="activenav" id="activenav"':''; ?>><a href="<?php echo Controller::$host; ?>/admin"><span class="showopacity glyphicon glyphicon-home"></span><br>Home</a></li>
<li><a href="admin/profil"><span class="showopacity glyphicon glyphicon-user"></span><br>Mein Profil</a></li>
<?php if($this->isAdmin === TRUE) { ?>
<li<?php echo $this->navElem==='users'?' class="activenav" id="activenav"':''; ?>><a href="admin/users"><span class="showopacity glyphicon glyphicon-user"></span><span class="showopacity glyphicon glyphicon-user"></span><br>Benutzer</a></li>
<li><a href="admin/action/generate-sitemap.php" target="_blank"><span class="showopacity glyphicon glyphicon-th-list"></span><br>Sitemap erzeugen</a></li>
<li<?php echo $this->navElem==='datenbank'?' class="activenav" id="activenav"':''; ?>><a href="admin/datenbank"><span class="showopacity glyphicon glyphicon-hdd"></span><br>Datenbank</a></li>
<?php }
if($this->user['login_type'] === (string)LoginType::MAIL) {
?>
<li><a href="passwort-vergessen?mail=<?php echo rawurlencode($this->user['mail']);?>"><span class="showopacity glyphicon glyphicon-user"></span><br>Passwort ändern</a></li>
<?php } ?>
</ul>
<?php 
}