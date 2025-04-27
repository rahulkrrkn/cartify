<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once rootDir . "/lib/verifyFrontend.php";
require_once rootDir . "/inc/headerFooter.inc.php";
