<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>IP | Holiday home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Holiday home search">

    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="./assets/app.css">

</head>

<body>
    <?php render('header') ?>
    <?php render('filters') ?>
    <?php render('properties');?>
</body>

</html>
