<?php

use application\Controller;
use application\User;
use application\model\DAO;

?><nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?php echo Controller::$host; ?>" title="Zur Startseite">
                <img height="40" src="img/logo.png" style="margin:4px;" alt="Logo"/>
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <?php 

            if($this->loggedInFacebook === TRUE) {
                echo FacebookHelper::profileLink();
            }

            ?>
            <ul class="nav navbar-nav pull-right" style="font-size:12px;">
                <?php

                if($this->loggedIn === TRUE) {
                    echo'<li><a href="mein-profil"><span class="showopacity glyphicon glyphicon-user"></span> Mein Profil</a></li>';
                    echo'<li><a href="logout"><span class="showopacity glyphicon glyphicon-log-out"></span> Log Out</a></li>';
                    if($this->isAdmin === TRUE) {
                        if(User::isAdminLoggedInInAsUser()) {
                            $virtualUser = DAO::getEntry("user", ['id' => User::userId()]);
                            echo'<li><a href="admin/users?unset_logged_in_as_user"><span class="showopacity glyphicon glyphicon-king"></span> Unlogin User '.htmlspecialchars($virtualUser['username']).' (' .User::userId().')</a></li>';
                        } else {
                            echo'<li><a href="admin"><span class="showopacity glyphicon glyphicon-king"></span> Admin</a></li>';
                        }
                    } else {
                        // TODO: hier href="user" bauen! oder gibts das schon??
                        echo'<li><a href="admin"><span class="showopacity glyphicon glyphicon-log-out"></span> Benutzer</a></li>';
                    }
                } else {

                    echo'<li><a href="login"><span class="showopacity glyphicon glyphicon-log-in"></span> Log In</a></li>';
                }

                ?>
                
                

                    


                
                
            </ul>
        </div>
    </div>
</nav>