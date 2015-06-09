
<?php 

session_start();

if(isset($_GET['table_name'])){
    $_SESSION['table_name'] = $_GET['table_name'];
}

if(isset($_GET['sub_group'])){
    $_SESSION['sub_group'] = $_GET['sub_group'];
}

if(isset($_GET['filter_item'])){
    $_SESSION['filter_item'] = $_GET['filter_item'];
}

if(isset($_GET['add_to_cart_message'])){
    $message = $_GET['add_to_cart_message'];
    ?><script type="text/javascript">alert('<?php echo $message; ?>');</script><?php
}
    
?>

<?php include('includes/parts_display_page/header_parts_display_page.php'); ?>
<?php include('includes/parts_display_page/year_and_model_form.php');?>
<?php include('includes/parts_display_page/categories_left_column.php');?>
<?php include('includes/parts_display_page/filter_items.php');?>
<?php include('includes/parts_display_page/display_parts.php');?>

<?php include('includes/footer.php'); ?>

<!-- Close the mySQL connection to the database -->
<?php mysqli_close($link); ?>