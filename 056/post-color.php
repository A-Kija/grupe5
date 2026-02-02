<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Form</title>
</head>
<body>
    <h1>Color Form</h1>
    
    <form method="POST" action="">
        <label for="color">Choose a color:</label>
        <input type="color" id="color" name="color" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {

        header('Location: post-color.php'); // redirektas.
        exit; // tam kad redirektintų, turim užbaigti kodo vykdymą

        $color = htmlspecialchars($_POST['color']);
        echo '<div style="margin-top: 20px;">';
        echo "<p>Selected color: <strong>$color</strong></p>";
        echo "<div style=\"width: 100px; height: 100px; background-color: $color; border: 1px solid #000;\"></div>";
        echo '</div>';
    }
    ?>
</body>
</html>