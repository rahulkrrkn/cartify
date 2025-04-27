<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::user(); ?>

    <title>Edit Profile</title>
    <style>
        .container-bg {
            display: flex;
            justify-content: center;
            align-items: center;
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
        }

        h1 {
            color: #fff;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[readonly] {
            background-color: #e0e0e0;
            cursor: not-allowed;
        }


        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            margin-bottom: 15px;
        }
    </style>
    <script>
        function emailNotAddMessage() {
            showAlert({
                status: 'error',
                message: 'You cannot edit your email or mobile number.',
                type: 'alert'
            })
        }

        function previewImage(event) {
            const image = document.getElementById('profile-preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function submitForm(event) {
            event.preventDefault();
            let formData = new FormData(document.getElementById("edit-profile-form"));


            axios.post("editProfile.api.php", formData)
                .then(response => {
                    console.log(response.data);
                    if (response.data.status == "success") {

                        showAlert(response.data);

                    } else {
                        showMessage(response.data);
                    }
                })
        }
    </script>
</head>

<body>
    <?php Header::user() ?>
    <div class="container-bg">
        <div class="container">
            <h1>Edit Profile</h1>
            <form id="edit-profile-form" onsubmit="submitForm(event)" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Profile Photo</label>
                    <img loading="lazy" id="profile-preview" class="profile-photo" src="<?= $_SESSION['CFuserData']['ProfilePhoto'] ?? 'profile-photo.jpg'; ?>" alt="Profile Photo">
                    <input type="file" name="ProfilePhoto" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="FName" value="<?= $_SESSION['CFuserData']['FName'] ?? "" ?>" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="LName" value="<?= $_SESSION['CFuserData']['LName'] ?? "" ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?= $_SESSION['CFuserData']['EmailID'] ?? "" ?>" readonly onclick="emailNotAddMessage()">
                </div>
                <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" value="<?= $_SESSION['CFuserData']['MobileNo'] ?? "" ?>" readonly onclick="emailNotAddMessage()">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="Gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male" <?= ($_SESSION['CFuserData']['Gender'] ?? "") === "Male" ? "selected" : "" ?>>Male</option>
                        <option value="Female" <?= ($_SESSION['CFuserData']['Gender'] ?? "") === "Female" ? "selected" : "" ?>>Female</option>
                        <option value="Other" <?= ($_SESSION['CFuserData']['Gender'] ?? "") === "Other" ? "selected" : "" ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>DOB</label>
                    <input type="date" name="DOB" value="<?= $_SESSION['CFuserData']['DOB'] ?? "" ?>">
                </div>
                <a href="/cartify/account/profile/" class="btn btnS1">View Profile</a>
                <button type="submit" class="btn btnP1">Save Changes</button>
            </form>
        </div>
    </div>
    <?php Footer::user() ?>
</body>

</html>