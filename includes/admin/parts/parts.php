
<?php 

session_start();

if(isset($_POST['year'])){
    if($_SESSION['year'] == $_POST['year']){
        //do nothing
        if(isset($_POST['model'])){
            $_SESSION['model'] = $_POST['model'];
            $_SESSION['part_number'] = 'null';    
        }
    }else{
        $_SESSION['year'] = $_POST['year'];
        $_SESSION['model'] = "null";
    }
}

if(isset($_POST['part_number']) && $_POST['part_number'] != ''){
    $_SESSION['part_number'] = $_POST['part_number'];
    $_SESSION['year'] = "null";
    $_SESSION['model'] = "null";
} else {
    $_SESSION['part_number'] = 'null';
}

?>

<div style=" float: left; width: 78%; border: black thin solid; margin: 10px;">
    <?php include('year_and_model_form.php');?>
    <?php include('part_number_search_form.php');?>
<?php if(isset($_GET['part_selected'])){  
    include('part_selected.php');   
} else {
    include('category_groups_display.php');
}  ?>
    
    
    
    
    
</div>