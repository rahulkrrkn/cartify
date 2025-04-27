<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Redirect</title>
    <script>
        window.onload = function() {
            if (window.innerWidth <= 768) { // Mobile screen (adjust as needed)
                window.location.href = "/cartify/user/mobile";
            } else {
                window.location.href = "/cartify/user/desktop";
            }
        };
    </script>
</head>

<body>
    <h2>Loading...</h2>
</body>

</html>