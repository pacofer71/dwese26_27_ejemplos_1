<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN TAILWIND CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Articulos</title>
</head>
<body class="bg-gray-200">

</body>
</html>