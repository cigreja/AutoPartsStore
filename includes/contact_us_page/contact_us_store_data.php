<?php

define('DB_NAME', 'blue_team_bmw');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}

$db_selected = mysqli_select_db($link, DB_NAME);

if (!$db_selected) {
    die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($link));
}

//echo 'Connected successfully';

$first = $_POST['firstName'];
$last = $_POST['lastName'];
$email = $_POST['emailAddress'];
$comments = $_POST['comments'];

$sql = "INSERT INTO contact_us (first_name, last_name, email, comments) VALUES ('$first','$last','$email','$comments')";

if(!mysqli_query($link, $sql)) {
    die('Error: ' . mysqli_error($link));
}

mysqli_close($link);
include 'contact_us_thank_you_page.php';
?>
