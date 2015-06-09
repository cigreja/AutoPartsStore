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

// set session for new register
if($_GET['menu'] == 'new_register'){
    $query = "SELECT cust_num FROM customer_general_info ORDER BY cust_num DESC LIMIT 1;";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION['cust_num'] = $row['cust_num'];
    }
}

// get general information form fill in data
if($_GET['menu'] == 'general'){
    session_start();
    $query = "SELECT * FROM customer_general_info WHERE cust_num = " . $_SESSION['cust_num'] . ";";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {

        $first = $row['first_name'];
        $last = $row['last_name'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $country = $row['country'];
        $email = $row['email'];
        $password = $row['pw'];
    }
}

// get shipping information form fill in data
if($_GET['menu'] == 'shipping'){
    session_start();
    $query = "SELECT * FROM customer_shipping_info WHERE cust_num = " . $_SESSION['cust_num'] . ";";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {

        $first = $row['first_name'];
        $last = $row['last_name'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $country = $row['country'];
    }
}

// get billing information form fill in data
if($_GET['menu'] == 'billing'){
    session_start();
    $query = "SELECT * FROM customer_billing_info WHERE cust_num = " . $_SESSION['cust_num'] . ";";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {

        $first = $row['first_name'];
        $last = $row['last_name'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $country = $row['country'];
    }
    
    // good place to retrieve their credit card info also
}

//mysqli_close($link);
?>


