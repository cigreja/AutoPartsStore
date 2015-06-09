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


/* THIS IS ALL CUSTOMER PAGE UPDATE PROCESSES */


// update general information data
if($update == 'general'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "update customer_general_info set first_name = '" . $first . "', last_name = '" . $last . "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "', email = '" . $email . "', pw = '" . $password . "' where cust_num = " . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: customer_page.php?menu=general');
}

// update shipping information data
if($update == 'shipping'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $sql = "update customer_shipping_info set first_name = '" . $first . "', last_name = '" . $last . "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "' where cust_num =" . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: customer_page.php?menu=shipping');
}

// update billing information data
if($update == 'billing'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $sql = "update customer_billing_info set first_name = '" . $first . "', last_name = '" . $last . "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "' where cust_num =" . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: customer_page.php?menu=billing');
}

// delete credit card
if($update == 'delete_card'){

    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expiration_month= $_POST['expire_month'];
    $expiration_year= $_POST['expire_year'];
    $ccv = $_POST['ccv']; 
    
    $sql = "DELETE FROM customer_credit_card_info WHERE card_type = '" . $card_type . "' AND card_number = " . $card_number . " AND expiration_month = " . $expiration_month . " AND expiration_year = " . $expiration_year . " AND ccv = " . $ccv . " AND cust_num =" . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: customer_page.php?menu=billing');
}

// add credit card
if($update == 'add_card'){

    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expiration_month= $_POST['expire_month'];
    $expiration_year= $_POST['expire_year'];
    $ccv = $_POST['ccv']; 
    
    $sql = "INSERT INTO customer_credit_card_info (cust_num, card_type, card_number, expiration_month, expiration_year, ccv ) VALUES ( " . $_SESSION['cust_num'] . ", '" . $card_type . "', " . $card_number . ", " . $expiration_month . ", " . $expiration_year . ", " . $ccv . " ) ;";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: customer_page.php?menu=billing');
}


/* THIS IS ALL SHOPPING CART UPDATE PROCESSES */


// add to cart
if($update == 'add_to_cart'){

    if($_SESSION['cust_num'] != ''){
        
        $cust_num = $_SESSION['cust_num'];
        $part_number = $_GET['part_number'];
        $qty = $_GET['qty'];

        $sql = "INSERT INTO shopping_cart (cust_num, part_number, qty ) VALUES ( " . $cust_num . ", " . $part_number . ", " . $qty . " ) ;";

        if(!mysqli_query($link, $sql)) {
            die('Error: ' . mysqli_error($link));
            $message = 'Sorry, there was an error, did not add to cart';
            header('Location: ../../parts_display_page.php?add_to_cart_message=' . $message);
        }
        $message = 'Added to cart';
        header('Location: ../../parts_display_page.php?add_to_cart_message=' . $message);
    }else{
        $message = 'You are not logged in. Please log in.';
        header('Location: ../../parts_display_page.php?add_to_cart_message=' . $message);
    }
    
}

// buy now
if($update == 'buy_now'){

    if($_SESSION['cust_num'] != ''){
        
        $cust_num = $_SESSION['cust_num'];
        $part_number = $_GET['part_number'];
        $qty= $_GET['qty'];

        $sql = "INSERT INTO shopping_cart (cust_num, part_number, qty ) VALUES ( " . $cust_num . ", " . $part_number . ", " . $qty . " ) ;";

        if(!mysqli_query($link, $sql)) {
            die('Error: ' . mysqli_error($link));
        }
        header('Location: ../../shopping_cart.php');
    }else{
        $message = 'You are not logged in. Please log in.';
        header('Location: ../../parts_display_page.php?add_to_cart_message=' . $message);
    }
}

// update qty in cart
if($update == 'update_qty_in_cart'){

    $cart_item_index = $_GET['cart_item_index'];
    $qty= $_GET['qty'];

    $sql = "UPDATE shopping_cart SET qty = " .$qty . "  WHERE  shopping_cart_pk  = " . $cart_item_index . " ; " ;
    
    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    // if statements to send right shipping_type_selected
    if(isset($_GET['shipping_type'])){
        $shipping_type = $_GET['shipping_type'];
        header('Location: ../../shopping_cart.php?shipping_type=' . $shipping_type);
    }else{
        header('Location: ../../shopping_cart.php');
    }
}

// delete item from cart
if($update == 'delete_item_from_cart'){

    $cart_item_index = $_GET['cart_item_index'];
    
    $sql = "DELETE FROM shopping_cart WHERE shopping_cart_pk = " . $cart_item_index . " ;";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    header('Location: ../../shopping_cart.php');
}

// update shipping and handling type in cart
if($update == 'update_shipping_type'){

    // if statements to send right shipping_type_selected
    if(isset($_GET['shipping_type'])){
        $shipping_type = $_GET['shipping_type'];
        header('Location: ../../shopping_cart.php?shipping_type=' . $shipping_type);
    }else{
        header('Location: ../../shopping_cart.php');
    }
}


/* THIS IS ALL SHOPPING CART PAGE CHECK OUT PROCESS */


// update shipping information data for check out
if($update == 'check_out_shipping'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $sql = "update customer_shipping_info set first_name = '" . $first . "', last_name = '" . $last . "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "' where cust_num =" . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $order_info = '&subtotal=' . $_GET['subtotal'] . '&shipping_type=' . $_GET['shipping_type'] . '&shipping_price=' . $_GET['shipping_price'] . '&sales_tax=' . $_GET['sales_tax'] . '&total_price=' . $_GET['total_price'];
    header('Location: ../shopping_cart_page/check_out_page.php?menu=shipping' . $order_info);
}

// update billing information data for check out
if($update == 'check_out_billing'){
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $sql = "update customer_billing_info set first_name = '" . $first . "', last_name = '" . $last . "', address = '" . $address . "', city = '" . $city . "', country = '" . $country . "', state = '" . $state . "', zip = '" . $zip . "' where cust_num =" . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $order_info = '&subtotal=' . $_GET['subtotal'] . '&shipping_type=' . $_GET['shipping_type'] . '&shipping_price=' . $_GET['shipping_price'] . '&sales_tax=' . $_GET['sales_tax'] . '&total_price=' . $_GET['total_price'];
    header('Location: ../shopping_cart_page/check_out_page.php?menu=billing' . $order_info);
}

// delete credit card for check out
if($update == 'check_out_delete_card'){

    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expiration_month= $_POST['expire_month'];
    $expiration_year= $_POST['expire_year'];
    $ccv = $_POST['ccv']; 
    
    $sql = "DELETE FROM customer_credit_card_info WHERE card_type = '" . $card_type . "' AND card_number = " . $card_number . " AND expiration_month = " . $expiration_month . " AND expiration_year = " . $expiration_year . " AND ccv = " . $ccv . " AND cust_num =" . $_SESSION['cust_num'] . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $order_info = '&subtotal=' . $_GET['subtotal'] . '&shipping_type=' . $_GET['shipping_type'] . '&shipping_price=' . $_GET['shipping_price'] . '&sales_tax=' . $_GET['sales_tax'] . '&total_price=' . $_GET['total_price'];
    header('Location: ../shopping_cart_page/check_out_page.php?menu=billing' . $order_info);
}

// add credit card for check out
if($update == 'check_out_add_card'){

    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expiration_month= $_POST['expire_month'];
    $expiration_year= $_POST['expire_year'];
    $ccv = $_POST['ccv']; 
    
    $sql = "INSERT INTO customer_credit_card_info (cust_num, card_type, card_number, expiration_month, expiration_year, ccv ) VALUES ( " . $_SESSION['cust_num'] . ", '" . $card_type . "', " . $card_number . ", " . $expiration_month . ", " . $expiration_year . ", " . $ccv . " ) ;";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    $order_info = '&subtotal=' . $_GET['subtotal'] . '&shipping_type=' . $_GET['shipping_type'] . '&shipping_price=' . $_GET['shipping_price'] . '&sales_tax=' . $_GET['sales_tax'] . '&total_price=' . $_GET['total_price'];
    header('Location: ../shopping_cart_page/check_out_page.php?menu=billing' . $order_info);
}


/* THIS IS THE PLACE ORDER PROCESS */

// place order for check out and direct to invoice page
if($update == 'place_order'){

    // set order number
    $order_num_query = "SELECT MAX(order_num) AS order_num FROM parts_ordered;";
    $order_num_result = mysqli_query($link,$order_num_query);

    if(!empty($order_num_result)){ 
        // if order number result is not empty then increment by 1
        $order_num_row = mysqli_fetch_assoc($order_num_result);
        $order_num = $order_num_row['order_num'] + 1 ;
    }else{
        // else set the order number to 1
        $order_num = 1 ;
    }
    
    // get customer number
    $cust_num = $_SESSION['cust_num'];
    
    // insert order into customer orders
    $sql = "INSERT INTO customer_orders (cust_num, order_num) VALUES ( " . $cust_num . ", " . $order_num . " ) ;";
    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }

    // get shopping cart information
    $shopping_cart_query = "SELECT * FROM shopping_cart WHERE cust_num = " . $cust_num . ";";
    $shopping_cart_items_result = mysqli_query($link,$shopping_cart_query);
    while ($shopping_cart_item = mysqli_fetch_assoc($shopping_cart_items_result)) {
        $shopping_cart_pk = $shopping_cart_item['shopping_cart_pk'];
        $part_number= $shopping_cart_item['part_number'];
        $qty= $shopping_cart_item['qty'];
        
        // insert item into parts_ordered
        $sql = "INSERT INTO parts_ordered (order_num, part_number, qty ) VALUES ( " . $order_num . ", " . $part_number . ", " . $qty . " ) ;";
        if(!mysqli_query($link, $sql)) {
            die('Error: ' . mysqli_error($link));
        }
        
        // delete item from cart
        $sql = "DELETE FROM shopping_cart WHERE shopping_cart_pk = " . $shopping_cart_pk . ";";
        if(!mysqli_query($link, $sql)) {
            die('Error: ' . mysqli_error($link));
        }
        
        // update in stock
        $sql = "UPDATE parts SET in_stock = (in_stock - " . $qty . ") WHERE part_number = " . $part_number . " ;";
        if(!mysqli_query($link, $sql)) {
            die('Error: ' . mysqli_error($link));
        }
    }
    
    // get order date
    $order_date = date("Y/m/d"); 
    
    // get order placed information  
    $credit_card_pk= $_GET['credit_card_pk'];
    $subtotal= $_GET['subtotal'];
    $shipping_type= $_GET['shipping_type'];
    $shipping_price= $_GET['shipping_price'];
    $sales_tax= $_GET['sales_tax'];
    $total_price= $_GET['total_price'];
    
     // set invoice id number
    $invoice_id_number_query = "SELECT MAX(invoice_id) AS invoice_id_number FROM invoices;";
    $invoice_id_number_result = mysqli_query($link,$invoice_id_number_query);
    if(!empty($invoice_id_number_result)){ 
        // if invoice id number result is not empty then increment by 1
        $invoice_id_number_row = mysqli_fetch_assoc($invoice_id_number_result);
        $invoice_id = $invoice_id_number_row['invoice_id_number'] + 1 ;
    }else{
        // else set the invoice id number to 1
        $invoice_id = 1 ;
    }
    
    // connect all invoice tables from invoices
    $shipping_id = $invoice_id;
    $billing_id = $invoice_id;
    $payment_id = $invoice_id;
    
    // insert order into invoices
    $insert_invoice_query = "INSERT INTO invoices (order_date, order_num, shipping_id, billing_id, payment_id, subtotal_price, shipping_handling_type, shipping_handling_price, sales_tax, total_price) 
            VALUES ( '" . $order_date . "', " . $order_num . "," . $shipping_id . "," . $billing_id . "," . $payment_id . "," . $subtotal . ",'" . $shipping_type . "'," . $shipping_price . "," . $sales_tax . ", " . $total_price . " ) ;";
    if(!mysqli_query($link, $insert_invoice_query)) {
        die('Error: ' . mysqli_error($link));
    }
    
    // get customer shipping information
    $query = "SELECT * FROM customer_shipping_info WHERE cust_num = " . $cust_num . ";";
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
    
    // insert shipping information into invoice_shipping
    $sql = "INSERT INTO invoice_shipping (first_name, last_name, address, city, country, state, zip) VALUES ('$first','$last','$address','$city','$country','$state','$zip')";
    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    // get customer billing information
    $query = "SELECT * FROM customer_billing_info WHERE cust_num = " . $cust_num . ";";
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
    
    // insert billing information into invoice_billing
    $sql = "INSERT INTO invoice_billing (first_name, last_name, address, city, country, state, zip) VALUES ('$first','$last','$address','$city','$country','$state','$zip')";
    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    // get credit card info for payment
    $get_credit_card_info_query = "SELECT * FROM customer_credit_card_info WHERE credit_card_pk = " . $credit_card_pk . ";";
    $get_credit_card_info_result = mysqli_query($link,$get_credit_card_info_query);

    while ($get_credit_card_info_row = mysqli_fetch_assoc($get_credit_card_info_result)) {

        $card_type = $get_credit_card_info_row['card_type'];
        $card_number = $get_credit_card_info_row['card_number'];
        $expiration_month= $get_credit_card_info_row['expiration_month'];
        $expiration_year= $get_credit_card_info_row['expiration_year'];
        $ccv = $get_credit_card_info_row['ccv'];
    }
    
    // insert credit card info into invoice_payment
    $sql = "INSERT INTO invoice_payment (card_type, card_number, expiration_month, expiration_year, ccv ) VALUES ( '" . $card_type . "', " . $card_number . ", " . $expiration_month . ", " . $expiration_year . ", " . $ccv . " ) ;";
    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
    }
    
    // check stock and restock if needed
    $query = "SELECT DISTINCT p.part_number, p.in_stock, p.in_stock_min, p.in_stock_max, p.supplier_id
            FROM parts p, parts_ordered o
            WHERE p.part_number = o.part_number
            and order_num = " . $order_num . " ; ";
    $result = mysqli_query($link,$query);
    
    
    // restock on parts to max value if below min value
    while ($row = mysqli_fetch_assoc($result)) {

        $supplier_id = $row['supplier_id'];
        $part_number = $row['part_number'];
        $stock = $row['in_stock'];
        $min = $row['in_stock_min'];
        $max = $row['in_stock_max'];
        $buy = $max - $stock;  // how many to buy
        
        // get table for part data
        $table_query = "select c.table_name
                        from parts p, categories c
                        where p.categories_id = c.categories_id
                        and p.part_number = " . $part_number . ";";
        $table_result = mysqli_query($link,$table_query);
        $table_row = mysqli_fetch_assoc($table_result);
        $table_name = $table_row['table_name'];
        
        // list price for part
        $price_query = "select t.list_price
                        from parts p, " . $table_name . " t
                        where p.categories_id = t.categories_id
                        and p.part_id = t.part_id
                        and p.part_number = " . $part_number . " ; ";
        $price_result = mysqli_query($link,$price_query);
        $price_row = mysqli_fetch_assoc($price_result);
        $list_price = $price_row['list_price'];
        
        $subtotal = $list_price * $buy;
        $shipping_type = 'Ground';
        $shipping_price = 15;
        $sales_tax = ($subtotal + $shipping_price) * .06;
        $total_price = $subtotal + $shipping_price + $sales_tax;
        
        if($stock < $min){
            
            // get order number for supplier order
            $order_num_query = "SELECT MAX(order_num) AS order_num FROM parts_ordered;";
            $order_num_result = mysqli_query($link,$order_num_query);
            if(!empty($order_num_result)){ 
                // if order number result is not empty then increment by 1
                $order_num_row = mysqli_fetch_assoc($order_num_result);
                $order_num = $order_num_row['order_num'] + 1 ;
            }else{
                // else set the order number to 1
                $order_num = 1 ;
            }
            
            // update in stock
            $sql = "UPDATE parts SET in_stock = (in_stock + " . $buy . ") WHERE part_number = " . $part_number . " ;";
            if(!mysqli_query($link, $sql)) {
                die('Error: ' . mysqli_error($link));
            }
            
            // insert item into parts_ordered
            $sql = "INSERT INTO parts_ordered (order_num, part_number, qty ) VALUES ( " . $order_num . ", " . $part_number . ", " . $buy . " ) ;";
            if(!mysqli_query($link, $sql)) {
                die('Error: ' . mysqli_error($link));
            } 
            
            // insert order into supplier orders
            $sql = "INSERT INTO supplier_orders (supplier_id, order_num) VALUES ( " . $supplier_id . ", " . $order_num . " ) ;";
            if(!mysqli_query($link, $sql)) {
                die('Error: ' . mysqli_error($link));
            }

            // set invoice id number
            $invoice_id_number_query = "SELECT MAX(invoice_id) AS invoice_id_number FROM invoices;";
            $invoice_id_number_result = mysqli_query($link,$invoice_id_number_query);
            if(!empty($invoice_id_number_result)){ 
                // if invoice id number result is not empty then increment by 1
                $invoice_id_number_row = mysqli_fetch_assoc($invoice_id_number_result);
                $invoice_id = $invoice_id_number_row['invoice_id_number'] + 1 ;
            }else{
                // else set the invoice id number to 1
                $invoice_id = 1 ;
            }

            // insert order into invoices
            $insert_invoice_query = "INSERT INTO invoices (order_date, order_num, subtotal_price, shipping_handling_type, shipping_handling_price, sales_tax, total_price) 
                    VALUES ( '" . $order_date . "', " . $order_num . ","  . $subtotal . ",'" . $shipping_type . "'," . $shipping_price . "," . $sales_tax . ", " . $total_price . " ) ;";
            if(!mysqli_query($link, $insert_invoice_query)) {
                die('Error: ' . mysqli_error($link));
            }
        }
    }
    
    header('Location: ../shopping_cart_page/check_out_page.php?menu=place_order&order_num=' . $order_num);
}


mysqli_close($link);
?>

