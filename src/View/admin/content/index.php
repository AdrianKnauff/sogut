<?php 

if($this->isAdmin === TRUE) {
    echo '<h1>Admin</h1>';
    //    echo '<a class="btn btn-default" href="admin/add-user">Neuen User registrieren</a> ';
    //    echo '<a class="btn btn-default" href="admin/action/generate-sitemap.php" target="_blank">Sitemap erzeugen</a> ';
} else {
    echo '<h1>Userbereich</h1>';
}

echo '<p>Dies ist der User- und Adminbereich.</p>';
