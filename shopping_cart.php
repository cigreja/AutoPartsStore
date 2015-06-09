<?php 
include('includes/shopping_cart_page/header_shopping.php');
?>

<?php
if(isset($_GET['shipping_type'])){
    $shipping_type = $_GET['shipping_type'];
}else{
    $shipping_type = 'Ground';
}
?>

<script>
      function update_shipping_type(){
          var shipping_type = document.getElementById('shipping_handling').value;
          window.location.href = 'includes/customer/update_info.php?update=update_shipping_type&shipping_type='+shipping_type;
      }
      
      function update_qty(cart_item_index,qty_id){
          var qty = document.getElementById(qty_id).value;
          var shipping_type = document.getElementById('shipping_handling').value;
          window.location.href = 'includes/customer/update_info.php?update=update_qty_in_cart&cart_item_index='+cart_item_index+'&qty='+qty+'&shipping_type='+shipping_type;
      }
      
      function check_out(subtotal, shipping_type, shipping_price, sales_tax, total_price){
          var order_info = '&subtotal='+subtotal+'&shipping_type='+shipping_type+'&shipping_price='+shipping_price+'&sales_tax='+sales_tax+'&total_price='+total_price;
          window.location.href = 'includes/shopping_cart_page/check_out_page.php?menu=shipping'+order_info;
      }
</script>

<!-- shopping cart title -->
<div style="border-bottom: black solid medium;">
<h1>Shopping Cart:</h1>
</div>
<br>

<!-- display shopping cart content-->
<div style="width: 74.55%; float: left; border: black solid thin; margin: 0px; padding-bottom: 0px;">
    
    
<?php
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

// customer needs to be logged in for their shopping cart
if(isset($_SESSION['cust_num']) && $_SESSION['cust_num'] != ''){

    // get table names
    $table_names_query = "SELECT s.qty, s.shopping_cart_pk, s.part_number, c.table_name
                            FROM shopping_cart s, parts p, categories c
                            WHERE s.part_number = p.part_number
                            AND p.categories_id = c.categories_id
                            AND s.cust_num = " . $_SESSION['cust_num'] . ";";

    $table_names_result = mysqli_query($link,$table_names_query);

    // check if any results returned from the query and not null
    // otherwise display empty cart message
    $test_if_null = mysqli_query($link,$table_names_query);

        ?>
                
    <!--create header div -->          
    <!-- Item     QTY       Cost       Price -->
    <div  style="width: 100%; border-bottom: black thin solid; height: 25px; background: #1E6091;">
        <div  style="width: 25%; float: left; border-right: black thin solid; height: 100%; background: #1E6091; ">
            <h3 style="margin: 1%;">Item</h3>
        </div>
        <div  style=" width: 24%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Price</h3>
        </div>
        <div  style="width: 24%; float: left; border-right: black thin solid; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Cost</h3>
        </div>
        <div  style="width: 24%; float: left; height: 100%; background: #1E6091;">
            <h3 style="margin: 1%;">Qty</h3>
        </div>
    </div>
                
                <?php 

            $i = 0;
            $qty_id = 0; 
            $subtotal = 0;
            $total_qty_of_items = 0; // used to calculate shipping
            //if(!empty($table_names_result))
            while ($table_names_row = mysqli_fetch_assoc($table_names_result)){
                
                $cart_item_index = $table_names_row['shopping_cart_pk'];
                $part_number = $table_names_row['part_number'];
                $qty = $table_names_row['qty'];
                $table_name = $table_names_row['table_name'];
                
                // get part information
                $part_info_query = "SELECT part_name, part_description, list_price
                                    FROM parts p, " . $table_name . " t
                                    WHERE p.part_id = t.part_id
                                    AND p.part_number = " . $part_number . ";";
                
                $part_info_result = mysqli_query($link,$part_info_query);
                $part_info_row = mysqli_fetch_assoc($part_info_result);
                
                $part_name = $part_info_row['part_name'];
                $part_description = $part_info_row['part_description'];
                $list_price = $part_info_row['list_price'];
 
                if($i % 2 === 0){ ?>
                   <div style="width: 100%; margin: 0px; background-color: #f0f0f0; height: 90px; ">
                <?php } else { ?>
                    <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 90px; ">
                <?php } ?>
            
            <!-- Display Item Information-->
            <?php if($i % 2 === 0){ ?>
                   <div style=" width: 25%; height: 90px; float: left; background-color: #f0f0f0; border-right: black thin solid; " >
                <?php } else { ?>
                    <div style=" width: 25%; height: 90px; float: left; background-color: #ffffff; border-right: black thin solid; " >
                <?php } ?>
                <h4 style="margin: 2%;"> <?php echo $part_name; ?> </h4>
                <?php if($part_description != " "){ ?>
                <p style="margin: 2%;" ><?php echo $part_description; ?></p>
                <?php } ?>
            </div>
                       
            <!-- Display Price of Item-->
            <?php if($i % 2 === 0){ ?>
                   <div style=" width: 24%; height: 90px; float: left; background-color: #f0f0f0; border-right: black thin solid; " >
                <?php } else { ?>
                    <div style=" width: 24%; height: 90px; float: left; background-color: #ffffff; border-right: black thin solid; " >
                <?php } ?>
                <p style="margin: 2%;" >Price: $<?php echo $list_price; ?></p>
            </div>
                    
            <!-- Display Cost of Items -->
            <?php if($i % 2 === 0){ ?>
                   <div style=" width: 24%; height: 90px; float: left; background-color: #f0f0f0; border-right: black thin solid; " >
                <?php } else { ?>
                    <div style=" width: 24%; height: 90px; float: left; background-color: #ffffff; border-right: black thin solid; " >
                <?php } ?>
                <p style="margin: 2%;" >Cost: $<?php echo $list_price * $qty; ?></p>
            </div>
                       
            <!-- Display Qty box and delete button-->
            <?php if($i % 2 === 0){ ?>
                   <div style=" width: 24%; height: 90px; float: left; background-color: #f0f0f0; " >
                <?php } else { ?>
                    <div style=" width: 24%; height: 90px; float: left; background-color: #ffffff;  " >
                <?php } ?>
                            <p><label style="margin: 2%;" ><strong>Quantity: </strong></label>
                                <input name="quantity" id="<?php echo $qty_id ; ?>" type="number" value="<?php echo $qty ; ?>" onblur="update_qty(<?php echo $cart_item_index . ', ' . $qty_id ; ?>)"  style="width: 40px; margin: 2%; ">
                            </p>
                        <form action="includes/customer/update_info.php?update=delete_item_from_cart&cart_item_index=<?php echo $cart_item_index; ?>" method="post" >
                            <p><input type="button" value="Delete Item" onclick="this.form.submit()" style=" margin: 2%;"></p>
                        </form>
                    </div>  
                       
    <?php 
    $qty_id++ ; 
    $total_qty_of_items = $total_qty_of_items + $qty;
    $subtotal = $subtotal + ($list_price * $qty);
    ?>
    <?php if($i % 2 === 0){ ?>
       </div>  
    <?php } else { ?>
    </div>  
    <?php } ?>
     <?php $i++; } ?>
            
            <!-- Subtotal -->
             <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; border-top: black thin solid;">
                <div style=" width: 25%; height: 30px; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                     <h2 style=" margin: 5px 0px 0px 20px;" >Sub Total:</h2>
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff;  border-right: black thin solid;  " >
                     <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $subtotal ; ?> </h3>
                </div>
                 <div style=" width: 24%; height: 30px; float: left; background-color: #ffffff; border-rigt: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
             </div>
            
            <!-- Shipping and Handling -->
            <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; border-top: black thin solid;">
                <div style=" width: 25%; height: 100%; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                     <h2 style=" margin: 5px 0px 0px 20px;" >Shipping:</h2>
                </div>
                <!-- Shipping and Handling Drop down list -->
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                     <select name="shipping_handling" id="shipping_handling" style="margin: 5px 0px 5px 18px; width: 135px; height: 22px;" onchange="update_shipping_type()"  required>
                         <option <?php if( $shipping_type == "Ground"){ echo 'selected '; } ?> value="Ground" onchange="get_shipping_type(shipping_handling);" >Ground</option>
                        <option <?php if( $shipping_type == "Standard"){ echo 'selected '; } ?>  value="Standard" onselect="get_shipping_type(shipping_handling);" >Standard</option>
                        <option <?php if( $shipping_type == "Two Day"){ echo 'selected '; } ?>  value="Two Day">Two Day</option>
                        <option <?php if( $shipping_type == "One Day"){ echo 'selected '; } ?>  value="One Day">One Day</option>
                     </select>
                </div>
                <?php if( $shipping_type == "Ground"){ $shipping_rate = 5; } ?> 
                <?php if( $shipping_type == "Standard"){ $shipping_rate = 10; } ?> 
                <?php if( $shipping_type == "Two Day"){ $shipping_rate = 15; } ?> 
                <?php if( $shipping_type == "One Day"){ $shipping_rate = 20; } ?> 
                <?php $shipping_price = round($shipping_rate * $total_qty_of_items,2);?>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff;  border-right: black thin solid;  " >
                     <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $shipping_price; ?> </h3>
                </div>
                 <div style=" width: 24%; height: 30px; float: left; background-color: #ffffff; border-rigt: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
             </div>
            
            <!-- Sales Tax -->
            <?php $sales_tax = round(($subtotal + $shipping_price) * 0.05,2); // this can be configured for each state ?>
            <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; border-top: black thin solid;">
                <div style=" width: 25%; height: 30px; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                     <h2 style=" margin: 5px 0px 0px 20px;" >Sales Tax:</h2>
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff;  border-right: black thin solid;  " >
                     <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $sales_tax ; ?> </h3>
                </div>
                 <div style=" width: 24%; height: 30px; float: left; background-color: #ffffff; border-rigt: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
             </div>
            
            <!-- Total -->
            <?php $total = round($subtotal + $shipping_price + $sales_tax,2); ?>
            <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; border-top: black thin solid;">
                <div style=" width: 25%; height: 30px; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                     <h2 style=" margin: 5px 0px 0px 20px;" >Total:</h2>
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff;  border-right: black thin solid;  " >
                     <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $total ; ?> </h3>
                </div>
                 <div style=" width: 24%; height: 30px; float: left; background-color: #ffffff; border-rigt: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
             </div>
            
            <!-- Checkout ? -->
            <?php $total = round($subtotal + $shipping_price + $sales_tax,2); ?>
            <div style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; border-top: black thin solid;">
                <div style=" width: 25%; height: 30px; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff; border-right: black thin solid;  " >
                     <h2 style=" margin: 5px 0px 0px 20px;" >Check Out?</h2>
                </div>
                 <div style=" width: 24%; height: 100%; float: left; background-color: #ffffff;  border-right: black thin solid;  " >   
                     <input style="margin: 5px 0px 0px 30px; width: 100px;" type="button" value="Check Out" onclick="check_out('<?php echo $subtotal ?>', '<?php echo $shipping_type ?>', '<?php echo $shipping_price ?>', '<?php echo $sales_tax ?>', '<?php echo $total ?>')">
                </div>
                 <div style=" width: 24%; height: 30px; float: left; background-color: #ffffff; border-rigt: black thin solid;  " >
                    <!-- just an empty space filler div -->
                </div>
             </div>
            
            <!-- Else Customer needs to log in -->
            
            <?php } else {?>
            <p> You are not logged in to your account. Please log in to your account to access your shopping cart.</p>
    <?php    } ?>
            
</div>   

<?php 
include('includes/footer.php');
?>