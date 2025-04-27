<?php
// const rootDir = "..";
require_once rootDir . "/utils/encDnc.fn.php";
// Importent
function convert6Digit($max6digit)
{
    return str_pad($max6digit, 6, "0", STR_PAD_LEFT);
}
function getEmailPrefix($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "";
    }
    $prefix = strstr($email, '@', true);
    return substr($prefix, 0, 6);
}

function sanitizeEmail($email)
{
    $email = strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return null;
    }
    $parts = explode("+", $email, 2);
    return isset($parts[1]) ? $parts[1] : $email;
}
function validateTime($tokenGeneratedTime, $validMinutes)
{
    $expireTime = $tokenGeneratedTime + ($validMinutes * 60);
    return time() < $expireTime;
}
function response($status, $message, $data = [])
{
    echo json_encode(['success' => $status, 'message' => $message, 'data' => $data]);
    exit();
}
function sendResponse($status, $simpleArrMTU = null, $data = [])
{
    $response['status'] = $status == true ? "success" : "error";
    if ($simpleArrMTU != null) {
        if (isset($simpleArrMTU[0])) {
            $response["message"] = $simpleArrMTU[0];
        }
        if (isset($simpleArrMTU[1])) {
            $response["type"] = $simpleArrMTU[1];
        }
        if (isset($simpleArrMTU[2])) {
            $response["url"] = $simpleArrMTU[2];
        }
    }
    if ($data != null) {
        $response["data"] = $data;
    }
    echo json_encode($response);
    exit();
}

function postJson()
{
    $data = file_get_contents('php://input');
    return json_decode($data, true);
}
function checkRequest($data, $simpleArray)
{
    if(!isset($data) && !is_array($data)) {
        sendResponse(false,["Invalid request","alert"]);
    }
    foreach ($simpleArray as $key => $value) {
        if (empty($data[$value])) {
            sendResponse(false,["Invalid request","alert"]);
        }
    }
    return true;
}
function getServerUrl()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $url = "$protocol://$host/cartify";
    return $url;
}
function getServerAddress()
{
    return dirname(__DIR__); // Go up one level
}

// echo getServerAddress();


// sendResponse(true,["message","success","rkn"],["message"=> "hlo"]);
// sendResponse(true,"",["message"=> "hlo"]);



function checkAccess($value, $message, $url = null)
{
    if ($value == false) {
        $response['status'] = "error";
        $response['message'] = $message;
        $response['type'] = 'alert';
        if (isset($url)) {
            $response['url'] = $url;
        }
        echo json_encode($response);
        exit();
    }
}
//  || empty($data[$varibleis])
function writeLog($message, $logFile = 'app')
{

    // Ensure the directory exists
    $logDir = rootDir . "/lib/logs/";
    $logFilePath = $logDir . $logFile.".log";

    if (!is_dir($logDir)) {
        mkdir($logDir, 0777, true);
    }

    // Get file name and line number
    $debugTrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0];
    $fileName = basename($debugTrace['file']);
    $lineNumber = $debugTrace['line'];

    // Format the log message with timestamp
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] [$fileName:$lineNumber] $message" . PHP_EOL;

    // Write to the log file
    file_put_contents($logFilePath, $logMessage, FILE_APPEND | LOCK_EX);
}


// Not importent


function prd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}
function pr($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function getline($status = null)
{
    echo "<pre> File: " . __DIR__ . "     Line: " . __LINE__ . " </pre> ";
    if ($status == 'die') {
        die();
    }
}

function echoHtml($data)
{
    echo "<pre>";
    echo $data;
    echo "</pre>";
}
