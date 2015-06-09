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

<?php include('year_and_model_form.php');?>
<?php include('keyword_search_form.php');?>
<?php include('part_number_search_form.php');?>
<?php include('category_groups_display.php');?>
