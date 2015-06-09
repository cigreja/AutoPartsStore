
<?php 
if(isset($_GET['menu'])){
    $_menu = $_GET['menu'];
}
?>

<?php include ('header_customer.php'); ?>
    
<!-- left column -->
<?php include ('customer_menu_left_column.php'); ?>

<!-- middle column -->
<?php 
if($_menu == 'new_register'){ include ('./thank_you_for_registering.php'); }
if($_menu == 'general'){ include ('./customer_general_info.php'); }
if($_menu == 'shipping'){ include ('./customer_shipping_info.php'); }
if($_menu == 'billing'){ include ('./customer_billing_info.php'); }
if($_menu == 'orders'){ include ('./customer_orders_info.php'); }
if($_menu == 'log_out'){ include ('./customer_log_out.php'); }
if($_menu == 'invoice'){ include ('get_customer_invoice.php'); }
?>

<?php 
include('../footer.php');
?>



