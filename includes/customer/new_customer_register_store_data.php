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
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "INSERT INTO customer_general_info (first_name, last_name, address, city, country, state, zip, email, pw) VALUES ('$first','$last','$address','$city','$country','$state','$zip','$email','$password')";

if(!mysqli_query($link, $sql)) {
    die('Error: ' . mysqli_error($link));
}

$sql = "INSERT INTO customer_shipping_info (first_name, last_name, address, city, country, state, zip) VALUES ('$first','$last','$address','$city','$country','$state','$zip')";

if(!mysqli_query($link, $sql)) {
    die('Error: ' . mysqli_error($link));
}

$sql = "INSERT INTO customer_billing_info (first_name, last_name, address, city, country, state, zip) VALUES ('$first','$last','$address','$city','$country','$state','$zip')";

if(!mysqli_query($link, $sql)) {
    die('Error: ' . mysqli_error($link));
}

// set session to new customer
$query = "SELECT cust_num FROM customer_general_info ORDER BY cust_num DESC LIMIT 1;";
$result = mysqli_query($link,$query);

while ($row = mysqli_fetch_assoc($result)) {
    session_start();
    $_SESSION['cust_num'] = $row['cust_num'];
}
    
mysqli_close($link);
header ('Location: customer_page.php?menu=new_register');
?>
