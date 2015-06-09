
<?php

if(isset($_GET['update'])){
    $update = $_GET['update'];
}
session_start();
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

// get order number
if(isset($_GET['order_num'])){
    $order_num = $_GET['order_num'];
}






/* THIS IS INVOICE */

?>

<head>
    <title>Invoice</title>
    <link rel="stylesheet" href="../../styles/main.css" type="text/css">
    <link rel="shortcut icon" href="../../images/team_blue.jpg">  
</head>

<!-- Invoice begins here -->
<div style="border: black thin solid; padding: 1%; margin: 1%; float: left; width: 100%;">

    <!-- Invoice header company logo-->
    
    
    
    <h1> Customers Invoices </h1>
    <div style="border-bottom: black solid medium; margin: 0;">
     
    </div>
    <br>
    
    <!--create parts header div -->          
    <!-- Part_num  part name    list price  qty   cost -->
    <div  style="width: 100%; border-bottom: black thin solid; height: 25px; background: #1E6091;">
        <div  style="width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091; ">
            <h3 style="margin: 1%;">Order Date</h3>
        </div>
        <div  style=" width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Sub Total</h3>
        </div>
        <div  style="width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Shipping</h3>
        </div>
        <div  style="width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Sales Tax</h3>
        </div>
        <div  style="width: 19%; float: left; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Total</h3>
        </div>
    </div>
<?php

    // get invoice data
    $query = "SELECT * FROM invoices WHERE shipping_id is not null;;";
    $result = mysqli_query($link,$query);
    while($row = mysqli_fetch_assoc($result)){

    $invoice_id = $row['invoice_id'];
    $order_date = $row['order_date'];
    $order_num = $row['order_num'];
    $shipping_id = $row['shipping_id'];
    $billing_id = $row['billing_id'];
    $payment_id = $row['payment_id'];
    $subtotal_price = $row['subtotal_price'];
    $shipping_handling_type = $row['shipping_handling_type'];
    $shipping_handling_price = $row['shipping_handling_price'];
    $sales_tax = $row['sales_tax'];
    $total_price = $row['total_price'];
    
    $total_sub = 0;
    $total_ship = 0;
    $total_tax = 0;
    $total_total = 0;
    

?>
    <!--Display each part information -->          
    <!-- Part_num  part name    list price  qty   cost -->
    <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $order_date ; ?> </h3>
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;   " >
             <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $subtotal_price ; ?> </h3>
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;   " >
             <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $shipping_handling_price ; ?> </h3>
        </div>
         <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $sales_tax ; ?> </h3>
        </div>
        <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total_price; ?> </h3>
        </div>
     </div>
<?php 

    $total_sub = $total_sub + $subtotal_price;
    $total_ship = $total_ship + $shipping_handling_price;
    $total_tax =  $total_tax + $sales_tax;
    $total_total =  $total_total + $total_price;

    } 
    
    ?>
    
    <!-- Subtotal -->
     <div style="width: 100%; margin: 0px; border-top: black thin solid; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > <?php echo '' ; ?> </h2>
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;  " >
             <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total_sub ; ?> </h2>
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;    " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total_ship ; ?> </h2>
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total_tax ; ?> </h2>
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total_total ; ?> </h2>
        </div>
     </div>
   
  
<?php  mysqli_close($link); ?>
    
</div>

<!-- end invoice -->

