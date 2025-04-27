<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once rootDir . "/config/websiteData.inc.php";
require_once rootDir . "/lib/verifyBackend.php";
require_once rootDir . "/utils/defult.fn.php";
require_once rootDir . "/utils/dbqry.fn.php";
