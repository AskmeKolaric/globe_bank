<?php
require_once('../../private/initialize.php');

    log_out_admin();
    // or you could use
    // $_SESSION['username'] = NULL;

    redirect_to(url_for('/staff/login.php'));

?>
