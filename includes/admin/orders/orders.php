<?php
// get invoice
if($menu == 'invoice'){
    include ('./orders/orders_invoices.php'); 
    
}else{
?>

<!-- Order information table title -->
<div style="border: #1E6091 thin solid; width: 50%; float: left; margin: 10px;">
    <div style="border-bottom: black solid thin; height: 25px;">
        <div style=" width: 33%; height: 100%; float: left; border-right: black thin solid; ">
            <h3 style="text-align: center; margin-top: 3px;">Order Date</h3>
        </div>
        <div style=" width: 33%; height: 100%; float: left; border-right: black thin solid; ">
            <h3 style="text-align: center; margin-top: 3px;">Order Number</h3>
        </div>
        <div style=" width: 33%; height: 100%; float: left; ">
            <h3 style="text-align: center; margin-top: 3px;">Invoice Number</h3>
        </div>
    </div>
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
    
    

    $order_info_query = "SELECT invoice_id, order_num, order_date
                        FROM invoices 
                        ORDER BY order_date DESC";

    $order_info_result = mysqli_query($link,$order_info_query);

    while ($order_info_row = mysqli_fetch_assoc($order_info_result)) {

        $invoice_id = $order_info_row['invoice_id'];
        $order_num = $order_info_row['order_num'];
        $order_date = $order_info_row['order_date'];
?>
    <!-- Order Info Table -->
    <div style="border-bottom: black solid thin; height: 25px;">
        <div style=" width: 33%; height: 100%; float: left; border-right: black thin solid; ">
            <h3 style="text-align: center; margin-top: 3px;">
                <a href="admin_page.php?menu=invoice&order_num=<?php echo $order_num ; ?>"> <?php echo $order_date ; ?> </a>
            </h3>
        </div>
        <div style=" width: 33%; height: 100%; float: left; border-right: black thin solid; ">
            <h3 style="text-align: center; margin-top: 3px;">
                <a href="admin_page.php?menu=invoice&order_num=<?php echo $order_num ; ?>"> <?php echo $order_num ; ?> </a>
            </h3>
        </div>
        <div style=" width: 33%; height: 100%; float: left; ">
            <h3 style="text-align: center; margin-top: 3px;">
                <a href="admin_page.php?menu=invoice&order_num=<?php echo $order_num ; ?>"> <?php echo $invoice_id ; ?> </a>
            </h3>
        </div>
    </div>
<?php } ?>
    

</div>

<?php }
//mysqli_close($link); ?>