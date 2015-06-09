
<html>
<head>
    <title>Blue Team BMW</title>
    <link rel="stylesheet" href="../../styles/main.css" type="text/css">
    <link rel="shortcut icon" href="../../images/team_blue.jpg">  
</head>

<body>

    <header>
        <img src="../../images/team_blue.jpg" 
             alt="Blue Team Logo" width="130">
        <h1>Blue Team BMW</h1>
        <h2>Quality BMW genuine parts!</h2>
    </header>
    <nav id="nav_bar">
        <ul>
            <li><a  href="../../index.php">
                  Home</a></li>
                  <li><a  href="../../parts.php">
                    Parts</a></li>
                    <li><a  href="../../your_account.php">
                    Your Account</a></li>
                    <li><a  href="../../shopping_cart.php">
                    Shopping Cart</a></li>
                    <li><a class="current" href="../../contact_us.php">
                    Contact Us</a></li>
        </ul>
    </nav>
    
    <?php include('column_left_contact.php'); ?>
    
<!-- start the middle column -->

<section>
    <div style="border-bottom: black solid medium;">
    <h1>Contact Us:</h1>
    </div>
    <br>
    
    
    <?php

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}

$db_selected = mysqli_select_db($link, DB_NAME);

if (!$db_selected) {
    die('Can\'t use ' . DB_NAME . ': ' . mysqli_error($link));
}

$query = "SELECT * FROM contact_us ORDER BY contact_us_id DESC LIMIT 1;";
$result = mysqli_query($link,$query);


while ($row = mysqli_fetch_assoc($result)) {

    $first = $row['first_name'];
    $last = $row['last_name'];
    $email = $row['email'];
    $comments = $row['comments'];
    
    echo "<h1><strong> Thank you! </strong></h1>
          <h2><strong> Sent Successfully! </strong></h2>
          <br>
          First Name: " . $first . "<br>
          Last Name: " . $last . "<br>
          Email: " . $email . "<br>
          Comments: " . $comments . "<hr><br>";
    
}
    
    mysqli_close($link);
?>
    
    
</section>

<!-- end the middle column -->

<?php 
include('column_right_contact.php');
include('../footer.php');
?>

