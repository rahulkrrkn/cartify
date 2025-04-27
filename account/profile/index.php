<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
Verify::user();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php Head::public() ?>
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container-bg {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background-color: #7618f1; */
            padding: 20px;
        }

        .container {
            background: rgb(189, 160, 232);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            text-align: center;
            position: relative;
        }

        h1 {
            color: #fff;
            margin-bottom: 15px;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            margin-bottom: 15px;
        }

        .info {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
        }

        .info div {
            margin-bottom: 10px;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #7618f1;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #5b13c0;
        }

        .edit-btn {
            position: absolute;
            top: 15px;
            right: 15px;

        }



        @media (max-width: 500px) {
            .container {
                max-width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <?php Header::user() ?>
    <div class="container-bg">
        <div class="container">
            <a href="../edit-profile/" class="edit-btn btn btnP1">Edit</a>
            <h1>My Profile</h1>
            <img loading="lazy" class="profile-photo" src="<?= !empty($_SESSION['CFuserData']['ProfilePhoto']) ? $_SESSION['CFuserData']['ProfilePhoto'] : 'profile-photo.jpg'; ?>" alt="Profile Photo">
            <div class="info">
                <h3>
                    <?= isset($_SESSION['CFuserData']['FName']) ? $_SESSION['CFuserData']['FName'] : ""; ?>
                    <?= isset($_SESSION['CFuserData']['LName']) ? $_SESSION['CFuserData']['LName'] : ""; ?>
                </h3>
                <div>
                    <span>Email:</span>
                    <span><?= isset($_SESSION['CFuserData']['EmailID']) ? $_SESSION['CFuserData']['EmailID'] : ""; ?></span>
                </div>
                <div>
                    <span>Mobile No:</span>
                    <span>
                        <?php if (isset($_SESSION["CFuserData"]["MobileNo"])) {
                            echo $_SESSION["CFuserData"]["MobileNo"];
                        } else {
                            if (isset($_SESSION["CFuserData"]["SNo"])) {
                                echo '<a class="btn" href="../add-mobile-no"> Add</a>';
                            }
                        } ?>
                    </span>
                </div>
                <?php if (!isset($_SESSION["CFuserData"]["Password"])) {
                    echo '<div>
                    <span>Password:</span>
                    <span>
                        <a class="btn" href="../set-new-password"> Add</a>
                    </span>
                </div>';
                }
                ?>
                <div>
                    <span>Gender:</span>
                    <span><?= isset($_SESSION['CFuserData']['Gender']) ? $_SESSION['CFuserData']['Gender'] : ""; ?></span>
                </div>
                <div>
                    <span>DOB:</span>
                    <span><?= isset($_SESSION['CFuserData']['DOB']) ? $_SESSION['CFuserData']['DOB'] : ""; ?></span>
                </div>
                <div>
                    <span>Created At:</span>
                    <span>
                        <?php
                        if (isset($_SESSION['CFuserData']['Date'])) {
                            $utcDate = new DateTime($_SESSION['CFuserData']['Date'], new DateTimeZone('UTC'));
                            $utcDate->setTimezone(new DateTimeZone('Asia/Kolkata')); // Convert to IST
                            echo $utcDate->format('d M Y, h:i A'); // Example: 13 Mar 2025, 02:30 PM
                        } else {
                            echo "N/A"; // Default message if date is not set
                        }
                        ?>
                    </span>
                </div>

            </div>
        </div>
    </div>
    <?php Footer::user() ?>
</body>

</html>