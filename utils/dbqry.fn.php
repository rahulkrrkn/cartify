<?php
// echo rootDir;
// include "/inc/dbcon.inc.php";
require_once rootDir . "/inc/dbcon.inc.php";
function executeQuery($mysqli, $query, $params = [], $types = "")
{
    try {
        if ($mysqli->connect_error) {
            throw new Exception("Database connection failed: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare($query);
        if (!$stmt) {
            throw new Exception("Query preparation failed: " . $mysqli->error);
        }

        if (!empty($params) && !$stmt->bind_param($types, ...$params)) {
            throw new Exception("Parameter binding failed: " . $stmt->error);
        }

        if (!$stmt->execute()) {
            throw new Exception("Query execution failed: " . $stmt->error);
        }

        $result = $stmt->get_result();
        if ($result) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return !empty($data) ? $data : [];
        }

        if (stripos(trim($query), "INSERT") === 0) {
            return $stmt->insert_id;
        }

        return $stmt->affected_rows;
    } catch (Exception $e) {
        die(json_encode(["status" => "error", "message" => $e->getMessage(), "code" => 500]));
    } finally {
        if ($stmt) {
            $stmt->close();
        }
    }
}
