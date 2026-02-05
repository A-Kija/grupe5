<?php
    if (isset($_GET['go']) && $_GET['go'] == 1) {
        header('Location: blue.php');
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Page</title>
    <style>
        body {
            background-color: crimson;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <a href="red.php?go=1">GO</a>
</body>
</html>