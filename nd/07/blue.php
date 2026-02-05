<?php
    if (isset($_GET['go']) && $_GET['go'] == 1) {
        header('Location: red.php');
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Page</title>
    <style>
        body {
            background-color: skyblue;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <a href="blue.php?go=1">GO</a>
</body>
</html>