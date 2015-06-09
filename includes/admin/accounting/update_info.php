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



// add supplier
if($update == 'add_supplier'){
    $first = $_POST['firstName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    

    $sql = "insert into suppliers (supplier_name, address, city, state, zip, country) values ('" . $first . "', '" . $address . "', '" .  $city . "', '" .  $state . "', " .  $zip . ", '" .  $country . "');";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $message= "updated successfully!";
    header('Location: ../admin_page.php?menu=suppliers&sub_menu=add_supplier&update_message='.$message);
}

// delete supplier
if($update == 'delete_supplier'){
    $supplier_id = $_POST['supplier_id'];
    

    $sql = "delete from suppliers where supplier_id =" . $supplier_id . " ;";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $message= "updated successfully!";
    header('Location: ../admin_page.php?menu=suppliers&sub_menu=delete_supplier&update_message=' . $message);
}

// update supplier
if($update == 'update_supplier'){
    $supplier_id = $_GET['supplier_id'];
    $supplier_name = $_POST['firstName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $sql = "update suppliers set supplier_name = '" . $supplier_name .  "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "' where supplier_id =" . $supplier_id . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    $message = 'Updated Successfully';
    header('Location: ../admin_page.php?menu=suppliers&sub_menu=supplier_selected&supplier_id=' . $supplier_id . '&update_message=' . $message);
}