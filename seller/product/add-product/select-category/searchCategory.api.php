<?php
const rootDir = "../../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();
// MySQLi connection
$conn = DBsqli();
Verify::seller();

if (!isset($data['search']) && !isset($data['showCategory']) && !isset($data['findCategoryForSingle'])) {
    sendResponse(false, ["Invalid request", "message"]);
}

class ViewCategory
{
    public $conn;
    public $search;
    public function __construct($conn, $data)
    {
        $this->conn = $conn;
        $this->search = $data['search'];
    }
    public function viewCategory()
    {
        $sql = "SELECT SNo, SubCategory AS subCategoryName, SubCategoryImg AS subCategoryImage FROM ProductCategory WHERE ( MainCategory LIKE ? OR Category LIKE ? OR SubCategory LIKE ? ) AND Verification = 'Approved'";
        $stmt = $this->conn->prepare($sql);
        $searchTerm = '%' . $this->search . '%';
        $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

class showCategory
{
    public $conn;
    public $id;
    public function __construct($conn, $data)
    {
        $this->conn = $conn;
        $this->id = $data['showCategory'];
    }

    public function showCategory()
    {
        $sql = "SELECT SNo, MainCategory AS mainCategoryName, MainCategoryImg AS mainCategoryImage, Category AS categoryName, CategoryImg AS categoryImage , SubCategory AS subCategoryName, SubCategoryImg AS subCategoryImage FROM ProductCategory WHERE SNo = ? AND Verification = 'Approved'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

class findCategoryForSingle
{
    private $conn;
    public $id;
    public function __construct($conn, $data)
    {
        $this->conn = $conn;
        $this->id = $data['findCategoryForSingle'];
    }

    public function findCategoryForSingle()
    {
        $sql = "SELECT SNo, MainCategory AS mainCategoryName, Category AS categoryName, SubCategory AS subCategoryName FROM ProductCategory WHERE SNo = ? AND Verification = 'Approved'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

if (isset($data['search']) && $data['search'] != '') {
    $viewCategory = new ViewCategory($conn, $data);
    $data = $viewCategory->viewCategory();
    sendResponse(true, [], $data);
} else if (isset($data['showCategory']) && $data['showCategory'] != '') {
    $showCategory = new showCategory($conn, $data);
    $data = $showCategory->showCategory();
    sendResponse(true, [], $data);
} else if (isset($data['findCategoryForSingle']) && $data['findCategoryForSingle'] != '') {
    $findCategoryForSingle = new findCategoryForSingle($conn, $data);
    $data = $findCategoryForSingle->findCategoryForSingle();
    sendResponse(true, [], $data);
} else {
    $data = [];
    sendResponse(true, [], $data);
}
