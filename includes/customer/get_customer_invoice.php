
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
    <header>
        <img src="../../images/team_blue.jpg" 
             alt="Blue Team Logo" width="130">
        <h1>Blue Team BMW</h1>
        <h2>Quality BMW genuine parts!</h2>
    </header>
    
    <?php
    // get invoice data
    $query = "SELECT * FROM invoices WHERE order_num =" . $order_num . ";";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);

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
 ?>
    <!-- Invoice Order Number-->
    <div style="border-bottom: black solid medium; margin: 0;">
        <h4 style="margin: 0;">Order Date: <?php echo $order_date ; ?> </h4>
    <h4 style="margin: 0;">Order Number: <?php echo $order_num ; ?> </h4>
    <h4 style="margin: 0;">Invoice Number: <?php echo $invoice_id ; ?> </h4>
    </div>
    <br>
    
    <!--create parts header div -->          
    <!-- Part_num  part name    list price  qty   cost -->
    <div  style="width: 100%; border-bottom: black thin solid; height: 25px; background: #1E6091;">
        <div  style="width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091; ">
            <h3 style="margin: 1%;">Part Number</h3>
        </div>
        <div  style=" width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Part Name</h3>
        </div>
        <div  style="width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">List Price</h3>
        </div>
        <div  style="width: 20%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Qty</h3>
        </div>
        <div  style="width: 19%; float: left; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Cost</h3>
        </div>
    </div>
<?php

    // get parts ordered
    $parts_query = "SELECT * FROM parts_ordered WHERE order_num =" . $order_num . ";";
    $parts_result = mysqli_query($link,$parts_query);
    
    while($parts_row = mysqli_fetch_assoc($parts_result)){
        $parts_ordered_pk = $parts_row['parts_ordered_pk'];
        $part_number = $parts_row['part_number'];
        $qty = $parts_row['qty'];
        
        // get table for the part
        $table_query = "SELECT table_name
                        FROM parts p, categories c
                        WHERE p.categories_id = c.categories_id
                        AND p.part_number = " . $part_number . " ;";
        $table_result = mysqli_query($link,$table_query);
        $table_row = mysqli_fetch_assoc($table_result);
        $table = $table_row['table_name'];
        
        // get part information
        $part_info_query = "SELECT part_name, list_price
                            FROM parts p, " . $table . " t
                            WHERE p.categories_id = t.categories_id
                            AND p.part_id = t.part_id
                            AND p.part_number = " . $part_number . " ;";
        $part_info_result = mysqli_query($link,$part_info_query);
        $part_info_row = mysqli_fetch_assoc($part_info_result);
        
        $part_name = $part_info_row['part_name'];
        $list_price = $part_info_row['list_price'];
    
?>
    <!--Display each part information -->          
    <!-- Part_num  part name    list price  qty   cost -->
    <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $part_number ; ?> </h3>
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;   " >
             <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $part_name ; ?> </h3>
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;   " >
             <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $list_price ; ?> </h3>
        </div>
         <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $qty ; ?> </h3>
        </div>
        <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $list_price * $qty ; ?> </h3>
        </div>
     </div>
<?php } ?>
    
    <!-- Subtotal -->
     <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;  " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;    " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 5px 0px 0px 20px;" >Sub Total:</h2>
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $subtotal_price ; ?> </h2>
        </div>
     </div>

    <!-- Shipping and Handling -->
     <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;  " >
            <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;   " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 10%; height: 100%; float: left; background-color: #ffffff;    " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 30%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 75px 0px 0px ; text-align: right;" > <?php echo $shipping_handling_type ; ?> Shipping: </h2>
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $shipping_handling_price ; ?> </h2>
        </div>
     </div>

    <!-- Sales Tax -->
    <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;  " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;    " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 5px 0px 0px 20px;" >Sales Tax:</h2>
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $sales_tax ; ?> </h2>
        </div>
     </div>

    <!-- Total -->
    <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <div style=" width: 20%; height: 30px; float: left; background-color: #ffffff;   " >
            <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;  " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 20%; height: 100%; float: left; background-color: #ffffff;    " >
             <!-- just an empty space filler div -->
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 5px 65px 0px 0px; text-align: right;" >Total:</h2>
        </div>
         <div style=" width: 19%; height: 30px; float: left; background-color: #ffffff;   " >
            <h2 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total_price ; ?> </h2>
        </div>
     </div>

    <!-- Customer Information -->
    <div style="width: 100%; height: 160px; margin-top: 10px;" >
        <!-- Shipping -->
        <div style=" width: 31%; height: 125px; float: left; margin: 1%; background-color: #ffffff;" >
    <?php
        // shipping
        $get_shipping_query = "SELECT * FROM invoice_shipping WHERE shipping_id = " . $shipping_id . ";";
        $shipping_result = mysqli_query($link,$get_shipping_query);
        $shipping_row = mysqli_fetch_assoc($shipping_result);

        $first = $shipping_row['first_name'];
        $last = $shipping_row['last_name'];
        $address = $shipping_row['address'];
        $city = $shipping_row['city'];
        $state = $shipping_row['state'];
        $zip = $shipping_row['zip'];
        $country = $shipping_row['country'];

        // output the shipping information
        echo "<h2><strong> Shipping: </strong></h2><br>"
              . $first . " " . $last . "<br>"
              . $address . "<br>"
              . $city . ", " . $state . " " . $zip . "<br>"
              . $country . "<br>";
    ?>
        </div>

        <!-- Billing -->
        <div style=" width: 31%; height: 125px; float: left; margin: 1%; background-color: #ffffff;" >
    <?php
        // billing
        $get_shipping_query = "SELECT * FROM invoice_shipping WHERE shipping_id = " . $shipping_id . ";";
        $shipping_result = mysqli_query($link,$get_shipping_query);
        $shipping_row = mysqli_fetch_assoc($shipping_result);

        $first = $shipping_row['first_name'];
        $last = $shipping_row['last_name'];
        $address = $shipping_row['address'];
        $city = $shipping_row['city'];
        $state = $shipping_row['state'];
        $zip = $shipping_row['zip'];
        $country = $shipping_row['country'];

        // output the billing information
        echo "<h2><strong> Billing: </strong></h2><br>"
              . $first . " " . $last . "<br>"
              . $address . "<br>"
              . $city . ", " . $state . " " . $zip . "<br>"
              . $country . "<br>";
    ?>
        </div>

        <!-- Payment -->
        <div style=" width: 31%; height: 125px; float: left; margin: 1%; background-color: #ffffff;" >
    <?php
        // payment
        $get_credit_card_info_query = "SELECT credit_card_pk, card_type, card_number, expiration_month, expiration_year, ccv FROM customer_credit_card_info WHERE cust_num = " . $_SESSION['cust_num'] . ";";
        $get_credit_card_info_result = mysqli_query($link,$get_credit_card_info_query);

        $get_credit_card_info_row = mysqli_fetch_assoc($get_credit_card_info_result);

        $credit_card_pk = $get_credit_card_info_row['credit_card_pk'];
        $card_type = $get_credit_card_info_row['card_type'];
        $card_number = $get_credit_card_info_row['card_number'];
        $expiration_month= $get_credit_card_info_row['expiration_month'];
        $expiration_year= $get_credit_card_info_row['expiration_year'];
        $ccv = $get_credit_card_info_row['ccv']; 

        // output payment information
        echo "<h2><strong> Payment: </strong></h2><br>"
              . "Credit Card ending: " . "<br>"
              . $card_number . "<br>"
              . "Type:                " . $card_type . "<br>"
              . "Expiration:          " . $expiration_month. "/" . $expiration_year . "<br>";
    ?>
        </div>
    </div>
<?php  mysqli_close($link); ?>
    
</div>
<!-- end invoice -->

