<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Mechanikas</title>
    <style>
        body {
            background: gray;
            color: lime;
        }
    </style>
</head>
<body>

    <!-- Jeigu metodas get -->
    <?php if($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
    
    <!-- Masyvas $_POST -->
    <form method="post" action="body.php">
        <input type="text" name="a">
        <input type="text" name="b">
        <button id="make-sum1">sumuok</button>
    </form>

    <!-- jeigu metodas post -->
    <?php else: ?>

    <h2>

    <?php
        if ($_SERVER['CONTENT_TYPE'] == 'application/x-www-form-urlencoded') {
            // skirta analizuoti application/x-www-form-urlencoded
            echo $_POST['a'] + $_POST['b'];
        }
        if ($_SERVER['CONTENT_TYPE'] == 'application/json') {
            // skirta analizuoti application/json
            $json = file_get_contents('php://input'); // failo skaitymas iš input strymo
            $data = json_decode($json, true); // true - paverčia i masyvą
            echo $data['a'] + $data['b'] + 10;
        }

    ?>
    </h2>
    <a href="body.php">Atgal</a>

    <?php endif ?>

    <script>
        document.querySelector('#make-sum').addEventListener('click', function(e) {
            e.preventDefault(); // sustabdo siuntimą
            
            // padarom objektą su a ir b
            const data = {
                a: document.querySelector('input[name="a"]').value,
                b: document.querySelector('input[name="b"]').value
            };
            
            fetch('body.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.text())
            .then(data => {
                document.body.innerHTML = data;
            });
        });

    </script>
    
</body>
</html>