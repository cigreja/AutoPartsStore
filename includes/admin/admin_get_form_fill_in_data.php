<?php
define('DB_NAME', 'blue_team_bmw');
define('DB_USER', 'blue_team');
define('DB_PASSWORD', 'bmw');
define('DB_HOST', 'localhost');

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}

$db_selected = mysqli_select_db($link, DB_NAME);

if (!$db_selected) {
    die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($link));
}

// set session for new register
if($_GET['menu'] == 'new_register'){
    $query = "SELECT admin_num FROM admin_info ORDER BY admin_num DESC LIMIT 1;";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION['admin_num'] = $row['admin_num'];
    }
}

// get general information form fill in data
if($_GET['sub_menu'] == 'general'){
    session_start();
    $query = "SELECT * FROM admin_info WHERE admin_num = " . $_SESSION['admin_num'] . ";";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {

        $first = $row['first_name'];
        $last = $row['last_name'];
	$position = $row['position'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $country = $row['country'];
        $email = $row['email'];
        $password = $row['pw'];
	$salary = $row['salary'];
    }
}

?>


