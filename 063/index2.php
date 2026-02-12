<?php
$host = '127.0.0.1';
$db   = 'forest';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fečinam kaip masyvą
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Database</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            padding: 20px;
            gap: 30px;
        }
        
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 900px;
            width: 100%;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background: #667eea;
            color: white;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 3px solid #667eea;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        tbody tr:hover {
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        form {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            justify-content: center;
        }
        input, select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #556cd6;
        }
        button.red {
            background-color: #e74c3c;
        }
        button.red:hover {
            background-color: #c0392b;
        }
        button.green {
            background-color: #2ecc71;
        }
        button.green:hover {
            background-color: #27ae60;
        }
        ul { 
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>

    <?php

        $sql = "
        SELECT c.id, client_name, p.id AS pid, phone_number
        FROM clients AS c
        LEFT JOIN phones AS p
        ON c.id = p.client_id
        ";

        $stmt = $pdo->query($sql);
        $all = $stmt->fetchAll();

        $clients = [];
        foreach ($all as $row) {
            $clientId = $row['id'];
            if (!isset($clients[$clientId])) {
                $clients[$clientId] = [
                    'id' => $row['id'],
                    'client_name' => $row['client_name'],
                    'phones' => []
                ];
            }
            if ($row['pid'] !== null) {
                $clients[$clientId]['phones'][] = [
                    'pid' => $row['pid'],
                    'phone_number' => $row['phone_number']
                ];
            }
        }
        $all = array_values($clients);

    ?>

    <div class="container">
        <h1>👥 Clients Database LEFT</h1>
        <table>
            <thead>
                <tr>
                    <th>Client ID</th>
                    <th>Client Name</th>
                    <th>Phones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all as $row) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['client_name'] ?></td>
                    <td> 
                        <?php if (count($row['phones']) > 0) : ?>
                            <ul> 
                                <?php foreach ($row['phones'] as $phone) : ?>
                                    <li><?= $phone['phone_number'] ?></li> 
                                <?php endforeach ?> 
                            </ul> 
                        <?php else : ?>
                            No phones 
                        <?php endif ?> 
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>





    
</body>
</html>