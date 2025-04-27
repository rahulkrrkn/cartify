<?php
const rootDir = "../../..";
require_once rootDir . "/lib/frontend.inc.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::admin(); ?>

    <title>Add New Description Unit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        :root {
            --AddDescriptionBackground: #ffffff;
            --AddDescriptionText: #000000;
            --AddDescriptionElementBorder: #a7a6a6;
            --AddDescriptionBGClr: rgb(189, 160, 232);
            --AddDescriptionInputBorder: #f53082;

        }

        .DarkMode {
            --AddDescriptionBackground: #343a40;
            --AddDescriptionText: #ffffff;
            --AddDescriptionElementBorder: #898787;
            --AddDescriptionBGClr: #e97171;
            --AddDescriptionInputBorder: #6763f4;
        }


        .AddDescriptionDataMain {
            background-color: var(--AddDescriptionBackground);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .AddDescriptionData {
            background-color: var(--AddDescriptionBGClr);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px var(--AddDescriptionElementBorder);
            width: 100%;
            max-width: 500px;
            text-align: center;
            border: rgb(116, 39, 232) solid 2px;
        }

        .AddDescriptionData h1 {
            color: var(--AddDescriptionText);
            font-size: 35px;
            margin-bottom: 30px;
        }

        .AddDescriptionData input {
            width: 90%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid var(--AddDescriptionInputBorder);
            border-radius: 5px;
        }

        /* .AddDescriptionData button {
            width: 94%;
            padding: 12px;
            font-size: 16px;
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .AddDescriptionData button:hover {
            background-color: #2283eb;
            ;
        } */

        .AddDescriptionData .error-message {
            color: red;
            margin-bottom: 5px;
            display: none;
            /* Initially hidden */
        }

        .AddDescriptionData .success-message {
            color: green;
            margin-bottom: 5px;
            display: none;
            /* Initially hidden */
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            .AddDescriptionData {

                padding: 10px;
                height: 250px;
            }

            .AddDescriptionData h1 {
                font-size: 28px;
            }

            .AddDescriptionData input {
                padding: 10px;
                margin-top: 20px;
                font-size: 14px;
            }

            .AddDescriptionData button {
                padding: 10px;
                font-size: 18px;
                width: 150px;
            }
        }
    </style>
</head>

<body>
    <?php Header::admin(); ?>
    <div class="AddDescriptionDataMain">
        <div class="AddDescriptionData">
            <h2>Add New Description Unit</h2>
            <div class="error-message" id="error-message">Please enter a description.</div>
            <div class="success-message" id="success-message">Description submitted successfully!</div>
            <input type="text" id="description" placeholder="Enter description here...">
            <br>
            <button class="btnP2" type="submit">Submit</button>
        </div>
    </div>
    <script>
        document.querySelector('.AddDescriptionData button').addEventListener('click', function() {
            const descriptionInput = document.querySelector('.AddDescriptionData input').value;
            const errorMessage = document.getElementById('error-message');
            const successMessage = document.getElementById('success-message');

            // Hide error/success messages initially
            errorMessage.style.display = 'none';
            successMessage.style.display = 'none';

            // Check if the input is empty
            if (descriptionInput.trim() === "") {
                errorMessage.textContent = "Please enter a description.";
                errorMessage.style.display = 'block';
                return; // Don't proceed if input is empty
            }

            // Disable button to prevent multiple submissions
            const submitButton = document.querySelector('.AddDescriptionData button');
            submitButton.textContent = 'Submitting...';
            submitButton.disabled = true;

            // Axios POST request to send data
            axios.post('/cartify/admin/category/add-description-unit/addInDescriptionProcess.php', {
                    description: descriptionInput
                })
                .then(function(response) {
                    // Success logic
                    // console.log(response.data);
                    if (response.data.status === "success") {
                        successMessage.textContent = response.data.message;
                        successMessage.style.display = 'block';
                    } else if (response.data.status === "error") {
                        errorMessage.textContent = response.data.message;
                        errorMessage.style.display = 'block';
                    } else {
                        errorMessage.textContent = response.data.message;
                        errorMessage.style.display = 'block';
                    }
                    // Reset form and button
                    document.querySelector('.AddDescriptionData input').value = ''; // Clear input field
                })
                .catch(function(error) {
                    // Error handling
                    // console.log(error);
                    errorMessage.textContent = "Error submitting description. Please try again.";
                    errorMessage.style.display = 'block';
                })
                .finally(function() {
                    // Reset button text and enable it again
                    submitButton.textContent = 'Submit';
                    submitButton.disabled = false;
                });
        });
    </script>
    <?php Footer::admin(); ?>
</body>

</html>