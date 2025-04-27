<?php
const rootDir = "../../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();
checkRequest($data,['action']);
// MySQLi connection
$conn = DBsqli();
 class showMainCategory
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function showMainCategory()
    {
        $sql = "SELECT MainCategory as name FROM ProductCategory GROUP BY MainCategory";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 0) {
            sendResponse(false,["No main category found.","message"]);
            return;
        }
        sendResponse(true,["Main category fetched successfully","message"],$result->fetch_all(MYSQLI_ASSOC));
        return;
    }
}

class showCategory
{
    private $conn;
    private $mainCategory;
    public function __construct($conn, $data)
    {
        $this->conn = $conn;
        $this->mainCategory = $data['mainCategory'];
    }

    public function showCategory()
    {
        $sql = "SELECT MainCategoryImg as image, Category as name FROM ProductCategory WHERE MainCategory = ? GROUP BY Category";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->mainCategory);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            sendResponse(false,["No category found.","message"]);
            return ;
        }
        sendResponse(true,["Category fetched successfully","message"],$result->fetch_all(MYSQLI_ASSOC));
        return;
    }
}

class showSubCategory
{
    private $conn;
    private $category;
    public function __construct($conn, $data)
    {
        $this->conn = $conn;
        $this->category = $data['category'];
    }

    public function showCategory()
    {
        $sql = "SELECT CategoryImg as image, SubCategory as name FROM ProductCategory WHERE Category = ? GROUP BY SubCategory";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->category);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            sendResponse(false,["No category found.","message"]);
            return ;
        }
        sendResponse(true,["Category fetched successfully","message"],$result->fetch_all(MYSQLI_ASSOC));
        return ;
    }
}

class showSubCategoryImg
{
    private $conn;
    private $subCategory;
    public function __construct($conn, $data)
    {
        $this->conn = $conn;
        $this->subCategory = $data['subCategory'];
    }

    public function showCategory()
    {
        $sql = "SELECT SubCategoryImg as image FROM ProductCategory WHERE SubCategory = ? GROUP BY SubCategory";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->subCategory);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            sendResponse(false,["No category found.","message"]);
            return ;
        }
        sendResponse(true,["Category fetched successfully","message"],$result->fetch_all(MYSQLI_ASSOC));
        return ;
    
    }
}

class showSpecification
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function showSpecification()
    {
        $sql = "SELECT SNo as id, specification, unitFullName as unit FROM productSpecificationTypes";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 0) {
            sendResponse(false,["No specification found.","message"]);
            return ;
        }
        sendResponse(true,["Specification fetched successfully","message"],$result->fetch_all(MYSQLI_ASSOC));
        return ;
    
        }
}

class ViewfilledSpecification
{
    private $conn;
    private $mainCategory;
    private $category;
    private $subCategory;

    public function __construct($conn, $data)
    {

        if (!isset($data['mainCategory']) || !isset($data['category']) || !isset($data['subCategory'])) {
            sendResponse(false,['Invalid request','message']);
        }
        $this->conn = $conn;
        $this->mainCategory = $data['mainCategory'];
        $this->category = $data['category'];
        $this->subCategory = $data['subCategory'];
    }

    public function ViewfilledSpecification()
    {
        $sql = "SELECT * FROM ProductCategory WHERE MainCategory = ? AND Category = ? AND SubCategory = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $this->mainCategory, $this->category, $this->subCategory);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            sendResponse(false,["No specification found.","message"]);
            return ;
        }
        sendResponse(true,["Specification fetched successfully","message"],$result->fetch_all(MYSQLI_ASSOC));
        return ;
    }
}

if ($data['action'] == 'showMainCategory') {

    json_encode((new showMainCategory($conn))->showMainCategory());
} else if ($data['action'] == 'showCategory') {

    json_encode((new showCategory($conn, $data))->showCategory());
} elseif ($data['action'] == 'showSubCategory') {

    json_encode((new showSubCategory($conn, $data))->showCategory());
} elseif ($data['action'] == 'showSubCategoryImg') {

    json_encode((new showSubCategoryImg($conn, $data))->showCategory());
} elseif ($data['action'] == 'showspecification') {

    json_encode((new showSpecification($conn))->showSpecification());
} elseif ($data['action'] == 'ViewfilledSpecification') {

    json_encode((new ViewfilledSpecification($conn, $data))->ViewfilledSpecification());
}
