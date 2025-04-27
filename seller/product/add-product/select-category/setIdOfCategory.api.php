<?php
const rootDir = "../../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();
if (!isset($data['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    exit;
}
$id = $data['id'];
$_SESSION['CFsellerData']['addProduct']['categoryId'] = $id;
echo json_encode(['status' => 'success', 'message' => 'Category set successfully.']);
