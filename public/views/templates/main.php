<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        if (isset($Title)) {
            if ($Title == 'error') echo "Introuvable";
            else echo $Title;
        }
        ?>
    </title>
    <?php
    if (isset($CSS)) {
        foreach($CSS as $name) {
            echo '<link rel="stylesheet" href="/public/assets/css/' . $name . '.css">';
        }
    }
    ?>
</head>
<header>
    <?php require_once 'public/views/templates/header.php'?>
</header>
<body>
<?php if (isset($Content)) echo $Content; ?>
</body>
</html>