<?php
const rootDir = "../../..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::user(); ?>

    <title>Edit address</title>
    <style>
        :root {
            --AddAddressBackgroundColor: white;
            /* Light mode background color */
            --AddAddressTextColor: black;
            /* Light mode text color */
            --AddAddressInputBorderColor: #ddd;
            /* Light mode input border color */
            --AddAddressButtonBackgroundColor: #007bff;
            /* Light mode button background */
            --AddAddressButtonHoverColor: #0056b3;
            /* Light mode button hover color */
            --AddAddressStatusMessageColor: black;
            /* Light mode status message color */
            --AddAddressMargin: 15px;
            /* Margin for input fields */
            --AddAddressPadding: 10px;
            /* Padding for input fields */
        }

        .addAddressDarkMode {
            --AddAddressBackgroundColor: gray;
            /* Dark mode background color */
            --AddAddressTextColor: white;
            /* Dark mode text color */
            --AddAddressInputBorderColor: #555;
            /* Dark mode input border color */
            --AddAddressButtonBackgroundColor: #0056b3;
            /* Dark mode button background */
            --AddAddressButtonHoverColor: #004494;
            /* Dark mode button hover color */
            --AddAddressStatusMessageColor: white;
            /* Dark mode status message color */
        }

        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: var(--AddAddressBackgroundColor);
            color: var(--AddAddressTextColor);
        } */

        .addAddressContainer {
            background-color: var(--AddAddressBackgroundColor);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: auto;
            overflow: hidden;
            /* Clear floats */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Smooth transition for dark mode */
        }

        .addAddressHeading {
            color: var(--AddAddressTextColor);
            text-align: center;
            margin-bottom: 20px;
            font-size: 3.2rem;
            /* Larger heading size */
        }

        .addAddressLabel {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--AddAddressTextColor);
        }

        .addAddressRequiredStar {
            color: red;
            margin-left: 3px;
        }

        .addAddressInput {
            width: calc(100% - 22px);
            /* Full width minus padding and border */
            padding: var(--AddAddressPadding);
            margin-bottom: var(--AddAddressMargin);
            border: 1px solid var(--AddAddressInputBorderColor);
            border-radius: 5px;
            /* font-size: 1rem; */
            background-color: var(--AddAddressBackgroundColor);
            color: var(--AddAddressTextColor);
            transition: border-color 0.3s ease;
            /* Smooth transition for input border */
        }

        .addAddressInput:focus {
            border-color: #007bff;
            /* Change border color on focus */
            outline: none;
            /* Remove default outline */
        }

        .addAddressButton {
            width: 100%;
            padding: 12px;
            background-color: var(--AddAddressButtonBackgroundColor);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            /* font-size: 1rem; */
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .addAddressButton:hover {
            background-color: var(--AddAddressButtonHoverColor);
        }

        .addAddressStatusMessage {
            margin-top: 15px;
            text-align: center;
            color: var(--AddAddressStatusMessageColor);
        }

        @media (max-width: 600px) {
            .addAddressContainer {
                padding: 20px;
                /* Reduced padding on smaller screens */
            }

            .addAddressHeading {
                font-size: 1.5rem;
                /* Smaller heading on mobile */
            }
        }
    </style>
</head>

<body>
    <?php Header::user(); ?>

    <div class="addAddressContainer">
        <h2 class="addAddressHeading">Add Delivery Location</h2>

        <label class="addAddressLabel">Email ID<span class="addAddressRequiredStar">*</span></label>
        <input type="email" id="AddAddressEmail" class="addAddressInput" placeholder="Enter your email" required>

        <label class="addAddressLabel">Pin Code<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressPinCode" class="addAddressInput" placeholder="Enter your pin code" required
            oninput="fetchLocationData()">

        <label class="addAddressLabel">Full Name<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressFullName" class="addAddressInput" placeholder="Enter your full name" required>

        <label class="addAddressLabel">Mobile No<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressMobileNo" class="addAddressInput" placeholder="Enter your mobile number" required>

        <label class="addAddressLabel">State<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressState" class="addAddressInput" placeholder="State" required readonly>

        <label class="addAddressLabel">District<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressDistrict" class="addAddressInput" placeholder="District" required readonly>

        <label class="addAddressLabel">City<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressCity" class="addAddressInput" placeholder="City" required readonly>

        <label class="addAddressLabel">House No, Building Name<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressHouseNoBuilding" class="addAddressInput" placeholder="House No, Building Name"
            required>

        <label class="addAddressLabel">Road Area/Colony<span class="addAddressRequiredStar">*</span></label>
        <input type="text" id="AddAddressRoadArea" class="addAddressInput" placeholder="Road area/colony" required>

        <label class="addAddressLabel">Landmark</label>
        <input type="text" id="AddAddressLandmark" class="addAddressInput" placeholder="Enter landmark">
        <input type="text" id="defultAdd" hidden>

        <button class="addAddressButton" id="AddAddressSubmit" onclick="updateAddress()">Update Address</button>
        <div class="addAddressStatusMessage" id="AddAddressStatusMessage"></div>
        <p id="message"></p>
    </div>
    <script src="script.js"></script>
    <script src="../add-new/script.js"></script>


    <?php Footer::user(); ?>
</body>

</html>