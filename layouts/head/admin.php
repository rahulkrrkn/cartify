<?php
if(!isset($_SESSION["CFadminData"]["SNo"])) {
    echo '
    <script>
        alert("You are not logged in");
        window.location.href = "/cartify/account/login-using-password/";
    </script>
    ';
    die();

}
?>