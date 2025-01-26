<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?=CSS_INCLUDE?>">
    <script src="https://cdn.jsdelivr.net/npm/imask"></script>
</head>
<body>
<header class="header">
    <h1><?=$title?></h1>
    <?php if ($_SERVER['REQUEST_URI'] != '/') : ?>
        <a href="/">
            Главная
        </a>
    <?php endif; ?>
</header>