<?php
session_start();
if(isset($_GET['update'])){
    $update = $_GET['update'];
}

// connect to database
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

//echo 'Connected successfully';

// update general information data
if($update == 'general'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $password = $_POST['password'];
	$salary = $_POST['salary'];

    $sql = "update admin_info set first_name = '" . $first . "', last_name = '" . $last . "', position = '" . $position . "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "', email = '" . $email . "', pw = '" . $password . "' where cust_num = " . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: customer_page.php?menu=general');
}


mysqli_close($link);
?>

