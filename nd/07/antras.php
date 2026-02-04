<?php
$bgColor = 'black';

if (isset($_GET['color'])) {
    $bgColor = $_GET['color'];
    if (preg_match('/^[0-9A-Fa-f]{6}$/', $bgColor)) {
        $bgColor = '#' . $bgColor;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:<?= $bgColor ?>;">

<a href="antras.php">JUODULYS</a>

    
</body>
</html>