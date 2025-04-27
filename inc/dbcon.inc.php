<?php
// error_reporting(0);
$config = require_once rootDir . "/config/configDb.inc.php";



function makeSqliConnection($dbConfig)
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        return new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['db_name']);
    } catch (mysqli_sql_exception $e) {
        error_log("Database connection failed: " . $e->getMessage());
        die(json_encode(["status" => "error", "message" => "Database connection failed", "code" => 500]));
    }
}



function DBsqli()
{
    global $config;
    // return makeSqliConnection($config['local']);
    return makeSqliConnection($config['online']);
}
