<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::user(); ?>

    <title>Address List</title>
    <style>
        .container {
            max-width: 1200px;
            margin: auto;
            text-align: center;
        }

        .address-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
            padding: 10px;
        }

        .address-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .address-box p {
            margin: 8px 0;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }


        .btn-success {
            background-color: green;
            color: white;
        }

        .btn-secondary {
            background-color: gray;
            color: white;
        }

        .btn-primary {
            background-color: blue;
            color: white;
        }

        .btn-danger {
            background-color: red;
            color: white;
        }

        @media (max-width: 768px) {
            .address-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php Header::user(); ?>
    <div class="container">
        <h2>Saved Addresses</h2>
        <div id="addressList" class="address-grid">
            <!-- Address cards will be inserted here dynamically -->
        </div>
        <div class="AddAddress"> <a href="/cartify/user/address/add-new/" id="addNewAddress" class="btn btnP2">Add New Address</a> </div>
    </div>
    <?php Footer::user(); ?>
    <script>
        function fetchAddresses() {
            loadingPage("start", "Fetching Addresses");
            axios.post('./address.api.php', {})
                .then(response => {
                    console.log(response.data);
                    let data = response.data;
                    let content = '';

                    // Sort addresses: Default first, then latest
                    data.sort((a, b) => {
                        if (a.SetDefault === 'Yes') return -1;
                        if (b.SetDefault === 'Yes') return 1;
                        return b.SNo - a.SNo;
                    });

                    data.forEach(item => {
                        content += `
                        <div class="address-box" id="row-${item.SNo}">
                        <p><strong>${item.FullName}</strong></p>
                        <p>${item.MobileNo} | ${item.EmailID}</p>
                        <p>${item.HouseBuildingName}, ${item.RoadAreaColony}, ${item.City}, ${item.District}, ${item.State}, ${item.PinCode}</p>
                        <p><strong>Landmark:</strong> ${item.Landmark}</p>
                                <div class="button-group">
                                    <button class="btn ${item.SetDefault === 'Yes' ? 'btn-success' : 'btn-secondary'}" onclick="setDefault(${item.SNo})">
                                        ${item.SetDefault === 'Yes' ? '<i class="fa fa-check-circle"></i> Default' : 'Set Default'}
                                    </button>
                                    <button class="btn-danger btn" onclick="deleteAddress(${item.SNo})">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn-primary btn" onclick="editAddress(${item.SNo})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        `;
                    });

                    document.getElementById('addressList').innerHTML = content;
                    loadingPage("end");
                })
                .catch(error => {
                    loadingPage("end");
                    console.error("Error fetching data:", error);
                });
        }

        function setDefault(SNo) {
            loadingPage("start", "Setting Default Address");
            axios.post('./setDefault.api.php', {
                    SNo
                })
                .then(response => {
                    console.log(response);
                    if (response.data.success) {
                        loadingPage("start", "Fetching Addresses");
                        fetchAddresses();
                    } else {
                        alert(response.data.message);
                    }
                })
                .catch(error => {
                    loadingPage("end");

                    console.error("Error setting default address:", error);
                });
        }

        function deleteAddress(SNo) {
            if (confirm("Are you sure you want to delete this address?")) {
                loadingPage("start", "Deleting Address");
                axios.post('./deleteAddress.api.php', {
                        SNo
                    })
                    .then(response => {
                        console.log(response.data);
                        loadingPage("end");
                        if (response.data.success) {
                            document.getElementById(`row-${SNo}`).remove();
                        } else {
                            alert(response.data.message);
                        }
                    })
                    .catch(error => {
                        loadingPage("end");
                        console.error("Error deleting address:", error);
                    });
            }
        }

        function editAddress(SNo) {
            window.location.href = './edit-address/?addressId=' + SNo;
        }
        document.addEventListener('axiosReady', () => {
            fetchAddresses();
        });
    </script>
</body>

</html>