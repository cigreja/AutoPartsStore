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

$info_matched = 'false';

// customer validation
if($_GET['login'] == 'customer'){
    $query = "SELECT email, pw FROM customer_general_info;";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {

        $email = $row['email'];
        $pw = $row['pw'];

        if($email == $_POST['cust_email']){
            if($pw == $_POST['cust_password']){
                $get_cust_num_query = "SELECT cust_num FROM customer_general_info WHERE email = '" . $email . "' AND pw = '" . $pw . "' ;";
                $cust_num_result = mysqli_query($link,$get_cust_num_query);

                while ($cust_num_row = mysqli_fetch_assoc($cust_num_result)) {
                    session_start();
                    $_SESSION['cust_num'] = $cust_num_row['cust_num'];
                }
                $info_matched = 'true';
            }
        }
    }
}
//admin validation
elseif ($_GET['login'] == 'admin') {
    $query = "SELECT admin_num, email, pw FROM admin_info;";
    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result)) {

        $admin_num = $row['admin_num'];
        $email = $row['email'];
        $pw = $row['pw'];

        if($email == $_POST['admin_email']){
            if($pw == $_POST['admin_password']){
                session_start();
                $_SESSION['admin_num'] = $admin_num;
                $info_matched = 'true'; 
            }
        }
    }
}
// neither applied, this is for debug, one must apply
else{
    header('Location: ../../your_account.php?cust_message=error&admin_message=error');
}

if($info_matched == 'true'){
    // if information login info matched
    if($_GET['login'] == 'customer'){
        header('Location: ../customer/customer_page.php?menu=general');
    } elseif ($_GET['login'] == 'admin') {
        header('Location: ../admin/admin_page.php?menu=general&sub_menu=general');
    } else {
        // neither applied, this is for debug, one must apply
        header('Location: ../../your_account.php?cust_message=error&admin_message=error');
    }
}else{
    // if information login info does not match, send back with invalid info message
    if($_GET['login'] == 'customer'){
        header('Location: ../../your_account.php?cust_message=Invalid Information');
    } elseif ($_GET['login'] == 'admin') {
        header('Location: ../../your_account.php?admin_message=Invalid Information');
    } else {
        // neither applied, this is for debug, one must apply
        header('Location: ../../your_account.php?cust_message=error&admin_message=error');
    }
}

mysqli_close($link);
?>


