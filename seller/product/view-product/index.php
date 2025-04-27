<?php
const rootDir = "../../../";

require_once rootDir . "/lib/frontend.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    Head::seller();
    ?>
    <title>View Product</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php Header::seller(); ?>
    <h2>View Product</h2>
    <div id="productShow">

    </div>


    <script src="script.js"></script>

    <?php Footer::seller(); ?>
</body>

</html>