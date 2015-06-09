<?php

    // database login information
    define('DB_NAME', 'blue_team_bmw');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    
    // link to database
    $link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

    if (!$link) {
        die('Could not connect: ' . mysqli_error($link));
    }

    $db_selected = mysqli_select_db($link, DB_NAME);

    if (!$db_selected) {
        die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($link));
    }
?>


