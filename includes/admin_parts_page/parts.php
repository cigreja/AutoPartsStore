<?php 

session_start();

if(isset($_POST['year'])){
    if($_SESSION['year'] == $_POST['year']){
        //do nothing
        if(isset($_POST['model'])){
            $_SESSION['model'] = $_POST['model'];
        }
    }else{
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['model'] = "null";
    }
}
?>

<?php include('includes/parts_page/header_parts.php'); ?>
<?php include('includes/parts_page/year_and_model_form.php');?>
<?php include('includes/parts_page/keyword_search_form.php');?>
<?php include('includes/parts_page/part_number_search_form.php');?>
<?php include('includes/parts_page/category_groups_display.php');?>
<?php include('includes/footer.php'); ?>
