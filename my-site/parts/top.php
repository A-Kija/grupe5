<?php
const URL = 'http://localhost/grupe5/my-site/';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Fashion Blog</title>
    <link rel="stylesheet" href="<?= URL ?>style.css">
    <script src="<?= URL ?>app.js" defer></script>
</head>
<body>
    <?php if ($header): ?>
    <header>
        <h1><?= $title ?></h1>
        <p>Your daily dose of fashion inspiration</p>
    </header>
    <?php else: ?>
    <header class="simple-header">
        <h1><?= $title ?></h1>
    </header>
    <?php endif ?>
    
    <nav>
        <a href="<?= URL ?>">Home</a>
        <a href="<?= URL ?>trends">Trends</a>
        <a href="#style">Style Guide</a>
        <a href="#about">About</a>
        <a href="<?= URL ?>contact">Contact</a>
    </nav>