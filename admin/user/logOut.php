<?php
// for user logout
    include "../../admin/config.php";
    session_unset();
    session_destroy();
    return true;
?>