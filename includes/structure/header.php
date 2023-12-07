<?php require_once "includes/config.php"; ?>
<?php require_once "includes/functions.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $descriptionSite ?>">

    <title><?= $titreSite ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
<?php require_once "includes/pages/nav.php"; ?>