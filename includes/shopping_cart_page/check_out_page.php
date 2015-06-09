
<?php 
if(isset($_GET['menu'])){
    $_menu = $_GET['menu'];
    if(isset($_GET['subtotal'])){
        $order_info = '&subtotal=' . $_GET['subtotal'] . '&shipping_type=' . $_GET['shipping_type'] . '&shipping_price=' . $_GET['shipping_price'] . '&sales_tax=' . $_GET['sales_tax'] . '&total_price=' . $_GET['total_price'];
    }    
}
?>

<?php include('header_check_out_page.php');?>

<!-- the check out process -->
<?php 
// get shipping information
if($_menu == 'shipping'){ 
    header ('Location: get_shipping.php?menu=shipping' . $order_info); }
    
// get billing information
if($_menu == 'billing'){ 
    header ('Location: get_billing.php?menu=billing' . $order_info); }

// get invoice and thank you for purchase message
if($_menu == 'place_order'){ ?>
    <br>
    <h1 style="text-align: center;"><strong> Thank you! </strong></h1>
    <h2 style="text-align: center;"><strong> Here is your invoice! </strong></h2>
    <br><br>
   <?php include ('get_invoice.php'); 
} ?>

<?php include('../footer.php');?>