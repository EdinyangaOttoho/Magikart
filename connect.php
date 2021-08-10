<?php
    require __DIR__ . '/dotenv-loader.php';
    $db = mysqli_connect($_ENV['MYSQLI_HOST'], $_ENV['MYSQLI_USER'], $_ENV['MYSQLI_PASSWORD'], $_ENV['MYSQLI_DATABASE']);
?>