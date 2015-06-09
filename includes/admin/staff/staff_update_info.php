<?php

session_start();
if(isset($_GET['update'])){
    $update = $_GET['update'];
}

// connect to database
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



// add staff
if($update == 'add_staff'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $pw = $_POST['password'];
    

    $sql = "insert into staff (first_name, last_name, address, city, state, zip, country, email, pw) values ('" . $first . "','" . $last . "', '" . $address . "', '" .  $city . "', '" .  $state . "', " .  $zip . ", '" .  $country . "'  , '" . $email . "' , '" . $password . "');";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $message= "updated successfully!";
    header('Location: ../admin_page.php?menu=staff&sub_menu=add_staff&update_message='.$message);
}

// delete staff
if($update == 'delete_staff'){
    $staff_id = $_GET['staff_id'];
    

    $sql = "delete from staff where staff_id = " . $staff_id . " ;";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $message= "updated successfully!";
    header('Location: ../admin_page.php?menu=staff&sub_menu=delete_staff&update_message=' . $message);
}

// update staff
if($update == 'staff'){
    $staff_id = $_GET['staff_id'];
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $pw = $_POST['password'];

    $sql = "update staff set first_name = '" . $first . "', last_name = '" . $last .  "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = " . $zip . ", email = '" . $email . "', pw = '" . $pw . "' where staff_id =" . $staff_id . " ;";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    $message = 'Updated Successfully';
    header('Location: ../admin_page.php?menu=staff&sub_menu=staff_selected&staff_id=' . $staff_id . '&update_message=' . $message);
}