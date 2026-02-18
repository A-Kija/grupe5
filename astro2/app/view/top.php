<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stellar Notes - <?= $title ?? '' ?></title>
  <link rel="stylesheet" href="<?= self::URL ?>styles.css" />
</head>
<body>
  <div class="background"></div>
  <header class="site-header">
    <div class="logo">Stellar Notes</div>
    <nav class="nav">
      <a class="nav-link" href="<?= self::URL ?>">Home</a>
      <a class="nav-link" href="<?= self::URL ?>note">Sample Note</a>
      <a class="nav-link" href="<?= self::URL ?>create">Create</a>
    </nav>
  </header>