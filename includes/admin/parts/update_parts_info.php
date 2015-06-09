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


/* THIS IS ALL THE UPDATE PART PROCESSES */


// update_part_name
if(isset($_GET['update_part_name'])){
    $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $update_part_name = $_GET['update_part_name'];
    
    $parts_query = " select t.part_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_id = $part_row['part_id'];
                

    $sql = "update " . $table_name . " set part_name = '" . $update_part_name .  "' where part_id = " . $part_id . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
        $message = 'Sorry there was a problem, did not update';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }else{
        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }
}


// update_list_price
if(isset($_GET['update_list_price'])){
    $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $update_list_price = $_GET['update_list_price'];
    
    $parts_query = " select t.part_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_id = $part_row['part_id'];
                

    $sql = "update " . $table_name . " set list_price = '" . $update_list_price .  "' where part_id = " . $part_id . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
        $message = 'Sorry there was a problem, did not update';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }else{
        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }
}


// update_in_stock
if(isset($_GET['update_in_stock'])){
    $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $qty = $_GET['update_in_stock'];
    
    // get order date
    $order_date = date("Y/m/d"); 
    
    // check stock and restock if needed
    $part_info_query = "SELECT DISTINCT p.part_number, p.in_stock, p.in_stock_min, p.in_stock_max, p.supplier_id
            FROM parts p
            WHERE p.part_number = " . $part_number . " ; ";
    $part_info_result = mysqli_query($link,$part_info_query);
    $part_info_row = mysqli_fetch_assoc($part_info_result);

        $supplier_id = $part_info_row['supplier_id'];
        $part_number = $part_info_row['part_number'];
        $stock = $part_info_row['in_stock'];
        $min = $part_info_row['in_stock_min'];
        $max = $part_info_row['in_stock_max'];
        //$buy = $max - $stock;  // we use the qty bought manually

        // list price for part
        $price_query = "select t.list_price
                        from parts p, " . $table_name . " t
                        where p.categories_id = t.categories_id
                        and p.part_id = t.part_id
                        and p.part_number = " . $part_number . " ; ";
        $price_result = mysqli_query($link,$price_query);
        $price_row = mysqli_fetch_assoc($price_result);
        $list_price = $price_row['list_price'];
        
        $subtotal = $list_price * $qty;
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
            $sql = "UPDATE parts SET in_stock = (in_stock + " . $qty . ") WHERE part_number = " . $part_number . " ;";
            if(!mysqli_query($link, $sql)) {
                die('Error: ' . mysqli_error($link));
            }
            
            // insert item into parts_ordered
            $sql = "INSERT INTO parts_ordered (order_num, part_number, qty ) VALUES ( " . $order_num . ", " . $part_number . ", " . $qty . " ) ;";
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

        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    
}


// update_stock_min
if(isset($_GET['update_stock_min'])){
    $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $update_stock_min = $_GET['update_stock_min'];
    
    $parts_query = " select t.part_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_id = $part_row['part_id'];
                

    $sql = "update parts set in_stock_min = '" . $update_stock_min .  "' where part_number = " . $part_number . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
        $message = 'Sorry there was a problem, did not update';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }else{
        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }
}


// update_stock_max
if(isset($_GET['update_stock_max'])){
   $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $update_stock_max = $_GET['update_stock_max'];
    
    $parts_query = " select t.part_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_id = $part_row['part_id'];
                

    $sql = "update parts set in_stock_max = '" . $update_stock_max .  "' where part_number = " . $part_number . ";";

    if(!mysqli_query($link, $sql)) {
        die('Error: ' . mysqli_error($link));
        $message = 'Sorry there was a problem, did not update';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }else{
        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=parts&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    }
}


// add_part
if(isset($_GET['add_part'])){
    $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $update_stock_max = $_GET['update_stock_max'];
    
    $parts_query = " select t.part_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_id = $part_row['part_id'];
                

    $sql = "insert into parts set in_stock_max = '" . $update_stock_max .  "' where part_number = " . $part_number . ";";

    
        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=add_part&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    
}




// delect_part
if(isset($_GET['delete_part'])){
    $part_number = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
    $update_stock_max = $_GET['update_stock_max'];
    
    $parts_query = " select t.part_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_id = $part_row['part_id'];
                

    $sql = "insert into parts set in_stock_max = '" . $update_stock_max .  "' where part_number = " . $part_number . ";";

    
        $message = 'Updated successfully!';
        header('Location: ../admin_page.php?menu=parts&sub_menu=delete_part&part_selected=' . $part_number . '&table_name=' . $table_name . '&update_message=' . $message);
    
}
