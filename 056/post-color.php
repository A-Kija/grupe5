<?php
/*
BE JS (tradicinis) siunčiam pilną HTML puslapį
SU JS siunčiam tik mažą puslapio dalį

Tradicinis:
Jeigu metodas GET ---> serveris grąžina HTML
Jeigu metodas POST ---> serveris grąžina redirect (duodam linką, kuriame yra HTML)

Su JS šitas NEGALIOJA (galima bet nebūtina po POST grąžinti redirect)

echo ---> išvedimas į response body


*/
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {

    $color = htmlspecialchars($_POST['color']);

    // setcookie('selected_color', $color, time() + (86400 * 30), '/'); // Cookie valid for 30 days

    $_SESSION['my_color'] = $color;

    header('Location: post-color.php'); // redirektas.
    exit; // tam kad redirektintų, turim užbaigti kodo vykdymą
}
?>
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
        // if (isset($_COOKIE['selected_color'])) {
        //     $color = htmlspecialchars($_COOKIE['selected_color']);

        //     setcookie('selected_color', '', time() - 3600, '/'); // Delete cookie
            
        //     echo '<div style="margin-top: 20px;">';
        //     echo "<p>Selected color: <strong>$color</strong></p>";
        //     echo "<div style=\"width: 100px; height: 100px; background-color: $color; border: 1px solid #000;\"></div>";
        //     echo '</div>';


        // }

        if (isset($_SESSION['my_color'])) {
            $color = htmlspecialchars($_SESSION['my_color']);

            unset($_SESSION['my_color']);
            
            echo '<div style="margin-top: 20px;">';
            echo "<p>Selected color: <strong>$color</strong></p>";
            echo "<div style=\"width: 100px; height: 100px; background-color: $color; border: 1px solid #000;\"></div>";
            echo '</div>';


        }
    ?>


</body>
</html>