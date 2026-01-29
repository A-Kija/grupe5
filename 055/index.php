<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Mechanikas</title>
    <style>
        body {
            background: black;
            color: lime;
        }
    </style>
</head>
<body>
    <h1>
        <?php 
            $digit = rand(10000, 99999);
            echo $digit;
        ?>
    </h1>
    <h2>
        <?php
            $bebras = $_GET['bebras'] ?? 'nieko';
            echo $bebras;
        ?>
    </h2>
    <h2>
        <?php
            echo $_GET['a'] + $_GET['b'];
        ?>
</body>
</html>