
<?php 
if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}
if(isset($_GET['sub_menu'])){
    $sub_menu = $_GET['sub_menu'];
}
?>

<!-- get header  with main menu-->
<?php include ('header_admin.php'); ?>

<!-- get left  column with sub menu-->
<?php 
if($menu == 'new_register'){ include ('./thank_you_for_registering.php'); }
if($menu == 'general'){ include ('./general/general_left_column.php'); }
if($menu == 'parts'){ include ('./parts/parts_left_column.php'); }
if($menu == 'add_part'){ include ('./add_part_page.php'); }
if($menu == 'staff'){ include ('./staff/staff_left_column.php'); }
if($menu == 'accounting'){ include ('./accounting/accounting.php'); }
if($menu == 'suppliers'){ include ('./suppliers/suppliers_left_column.php'); }
if($menu == 'orders' || $menu == 'invoice'){ include ('./orders/orders.php'); }
if($menu == 'customer_purchases'){ include ('./admin_orders_info.php'); }
if($menu == 'log_out'){ include ('./admin_log_out.php'); }
?>

<!-- get footer -->
<?php  include('../footer.php'); ?>



