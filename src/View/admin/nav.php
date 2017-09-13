<?php

use application\Controller;
use application\model\DAO;

?>
<nav class="navbar navbar-default" style="border: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="" href="<?php echo Controller::$host; ?>/admin">
                <img height="40" src="img/logo.png" style="margin:4px;"/>
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right" style="font-size:12px;">
                <?php
                if($this->loggedIn === TRUE) {
                    echo'<li><a href="logout"><span class="showopacity glyphicon glyphicon-log-out"></span> Log Out</a></li>';
                } else {
                    echo'<li><a href="login"><span class="showopacity glyphicon glyphicon-log-in"></span> Log In</a></li>';
                }
                echo'<li><a href="'.Controller::$host.'/"><span class="showopacity glyphicon glyphicon-king"></span> Home</a></li>';
                ?>
            </ul>
            <ul class="nav navbar-nav">
                <?php if($this->isAdmin === TRUE) {?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tabellen <span class="caret"></span></a>
                    <ul style="background-color:#000;" class="dropdown-menu"> 
                    <?php
                        foreach (DAO::getAllTableNames() as $blaa) {
                            echo '<li ><a style="color: #FFF;" href="admin/table/'.$blaa[0].'">'.  ucfirst( $blaa[0] ).'</a></li>';
                        }
                    ?>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>