<?php
const rootDir = "../../..";
require_once rootDir . "/lib/frontend.inc.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::admin(); ?>

    <title>Add Varient</title>
    <style>
        :root {
            --AddNewAttributesUnitBG: rgb(189, 160, 232);

        }

        .DarkMode {
            --AddNewAttributesUnitBG: rgb(193, 113, 113);
        }

        .AddNewAttributeFormContainer {
            max-width: calc(100% - 40px);
            margin: 0 auto;
            padding: 20px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
        }

        .AddNewAttributeFormContainer form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .AddNewAttributeFormContainer h2 {
            text-align: center;
        }

        .AddNewAttributeFormContainer label {
            display: block;
            margin-bottom: 5px;
        }

        /* Add red star for required fields */
        label.required::after {
            content: " *";
            color: red;
        }

        .AddNewAttributeFormContainer input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid grey;
            border-radius: 4px;
        }


        .AddNewAttributeUnitInputs {
            display: flex;
            display: none;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            background-color: var(--AddNewAttributesUnitBG);
            border-radius: 10px;
            margin: 10px;
            /* border: rgb(116, 39, 232) solid 2px; */
        }

        h3 {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php Header::admin(); ?>
    <div class="AddNewAttributeFormContainer">
        <h2>Varient Types Form</h2>
        <form action="" method="post">
            <!-- Measurement Type Input -->
            <div id="measurementTypeInput">
                <label for="measurementType" class="required">Varient Type</label>
                <input
                    type="text"
                    id="measurementType"
                    name="measurementType"
                    placeholder="Enter Varient Type"
                    required />
            </div>
            <p id="error"></p>
            <!-- Unit Inputs Side by Side -->
            <div class="AddNewAttributeUnitInputs">
                <h3>Measurement Units</h3>
                <div>
                    <label for="unit1">Unit 1</label>
                    <input type="text" id="unit1" name="unit1" placeholder="Unit 1" />
                </div>

                <div>
                    <label for="unit2">Unit 2</label>
                    <input type="text" id="unit2" name="unit2" placeholder="Unit 2" />
                </div>

                <div>
                    <label for="unit3">Unit 3</label>
                    <input type="text" id="unit3" name="unit3" placeholder="Unit 3" />
                </div>

                <div>
                    <label for="unit4">Unit 4</label>
                    <input type="text" id="unit4" name="unit4" placeholder="Unit 4" />
                </div>

                <div>
                    <label for="unit5">Unit 5</label>
                    <input type="text" id="unit5" name="unit5" placeholder="Unit 5" />
                </div>

                <div>
                    <label for="unit6">Unit 6</label>
                    <input type="text" id="unit6" name="unit6" placeholder="Unit 6" />
                </div>

                <div>
                    <label for="unit7">Unit 7</label>
                    <input type="text" id="unit7" name="unit7" placeholder="Unit 7" />
                </div>

                <div>
                    <label for="unit8">Unit 8</label>
                    <input type="text" id="unit8" name="unit8" placeholder="Unit 8" />
                </div>

                <div>
                    <label for="unit9">Unit 9</label>
                    <input type="text" id="unit9" name="unit9" placeholder="Unit 9" />
                </div>

                <div>
                    <label for="unit10">Unit 10</label>
                    <input type="text" id="unit10" name="unit10" placeholder="Unit 10" />
                </div>

                <div>
                    <label for="unit11">Unit 11</label>
                    <input type="text" id="unit11" name="unit11" placeholder="Unit 11" />
                </div>

                <div>
                    <label for="unit12">Unit 12</label>
                    <input type="text" id="unit12" name="unit12" placeholder="Unit 12" />
                </div>

                <div>
                    <label for="unit13">Unit 13</label>
                    <input type="text" id="unit13" name="unit13" placeholder="Unit 13" />
                </div>

                <div>
                    <label for="unit14">Unit 14</label>
                    <input type="text" id="unit14" name="unit14" placeholder="Unit 14" />
                </div>

                <div>
                    <label for="unit15">Unit 15</label>
                    <input type="text" id="unit15" name="unit15" placeholder="Unit 15" />
                </div>
            </div>

            <button class="btnP2" id="submit2">Submit</button>

        </form>
    </div>

    <script>
        document.querySelector("#measurementType").addEventListener("change", function(e) {
            loadingPage();
            axios.post('/cartify/admin/category/add-new-varients-types/checkAttributeAlreadyOrNot.php', {
                MeasurementTypeInput: e.target.value
            }).then(function(response) {
                console.log(response)
                // let AddNewAttributeResponse = response.data
                // console.log(AddNewAttributeResponse)
                // console.log(typeof AddNewAttributeResponse)
                // console.log(AddNewAttributeResponse === "AlreadyExist")
                if (response.data.status == "success") {
                    // alert("Measurement Type Already Exist")
                    // document.querySelector(".AddNewAttributeUnitInputs").style.display = "flex"
                    document.querySelector("#submit2").style.display = "block"
                    document.querySelector("#error").innerHTML = response.data.message
                    document.querySelector("#error").style.color = "green"
                } else {

                    // document.querySelector(".AddNewAttributeUnitInputs").style.display = "none"
                    document.querySelector("#submit2").style.display = "none"
                    document.querySelector("#error").innerHTML = response.data.message
                    document.querySelector("#error").style.color = "red"

                }
            }).catch(function(error) {
                console.log(error)
            }).finally(function() {
                loadingPage();
            });
        })

        document.querySelector("#submit2").addEventListener("click", function(e) {
            e.preventDefault();
            loadingPage();
            axios.post('/cartify/admin/category/add-new-varients-types/checkAttributeAlreadyOrNot.php', {
                MeasurementType: document.querySelector("#measurementType").value,
                Unit1: document.querySelector("#unit1").value,
                Unit2: document.querySelector("#unit2").value,
                Unit3: document.querySelector("#unit3").value,
                Unit4: document.querySelector("#unit4").value,
                Unit5: document.querySelector("#unit5").value,
                Unit6: document.querySelector("#unit6").value,
                Unit7: document.querySelector("#unit7").value,
                Unit8: document.querySelector("#unit8").value,
                Unit9: document.querySelector("#unit9").value,
                Unit10: document.querySelector("#unit10").value,
                Unit11: document.querySelector("#unit11").value,
                Unit12: document.querySelector("#unit12").value,
                Unit13: document.querySelector("#unit13").value,
                Unit14: document.querySelector("#unit14").value,
                Unit15: document.querySelector("#unit15").value,

            }).then(function(response) {
                console.log(response.data)
                if (response.data.status === "success") {
                    // alert("Measurement Type Added Successfully");
                    document.querySelector(".AddNewAttributeUnitInputs").style.display = "none"
                    document.querySelector("#submit2").style.display = "none"
                    document.querySelector("#error").innerHTML = response.data.message + "<br>" + "Enter measurement again for new measurement";
                    document.querySelector("#error").style.color = "green"
                    document.querySelector("#measurementType").value = ""
                    document.querySelector("#unit1").value = ""
                    document.querySelector("#unit2").value = ""
                    document.querySelector("#unit3").value = ""
                    document.querySelector("#unit4").value = ""
                    document.querySelector("#unit5").value = ""
                    document.querySelector("#unit6").value = ""
                    document.querySelector("#unit7").value = ""
                    document.querySelector("#unit8").value = ""
                    document.querySelector("#unit9").value = ""
                    document.querySelector("#unit10").value = ""
                    document.querySelector("#unit11").value = ""
                    document.querySelector("#unit12").value = ""
                    document.querySelector("#unit13").value = ""
                    document.querySelector("#unit14").value = ""
                    document.querySelector("#unit15").value = ""

                } else { // alert("Measurement Type Already Exist")
                    document.querySelector(".AddNewAttributeUnitInputs").style.display = "none"
                    document.querySelector("#submit2").style.display = "none"
                    const errorElement = document.querySelector("#error");
                    errorElement.innerHTML = response.data.message;
                    document.querySelector("#error").style.color = "red"
                }


            }).catch(function(error) {
                console.log(error)
            }).finally(function() {
                loadingPage();
            });
        })
        // const MeasurementUnitInputs = document.querySelector(".AddNewAttributeUnitInputs");
        // MeasurementUnitInputs.addEventListener("click", function(e) {
        //     const MeasurementTypeInput = document.querySelector("#measurementType").value

        // })
    </script>
    <?php Footer::admin(); ?>
</body>

</html>