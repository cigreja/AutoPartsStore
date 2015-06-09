
<?php 

session_start();

if(isset($_POST['year'])){
    if($_SESSION['year'] == $_POST['year']){
        //do nothing
        if(isset($_POST['model'])){
            $_SESSION['model'] = $_POST['model'];
            $_SESSION['part_number'] = 'null';  
            header('Location: parts.php');
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


<aside id="sidebarA">
    <nav>
         <form name="year_and_model_form" style="margin-bottom: 0;" action="index.php" method="post" >
            <label><strong>Quick Search</strong></label>
        
            <?php

            // link to database: $link
            include('includes/home_page/header_home.php'); 

            // yearDropList
            $query = "SELECT * FROM year;";
            $result = mysqli_query($link,$query);

            echo "<select onchange=\"this.form.submit()\" name =\"year\" id =\"year\" >";
            echo "<option value=\"null\"> - Select Year - </option>";

            while ($row = mysqli_fetch_assoc($result)) {
                $year_id = $row['year_id'];
                $year_name = $row['year_name'];
                echo "<option value=\"" . $year_id . "\">" . $year_name . "</option>";

            }
            echo "</select>";



            // assign previously selected year
            if(isset($_SESSION['year'])){
                echo "<script> document.getElementById('year').value = " . $_SESSION['year'] . " ; </script>";
            }



            // modelDropList
            echo " <select  name=\"model\"  id=\"model\" >";
            echo " <option value=\"null\" > - Select Model - </option> ";

            if(isset($_SESSION['year'])){
                $query = "select model.model_id, model_name 
                        from model_by_year
                        join model
                        on model_by_year.model_id = model.model_id
                        where year_id = " . $_SESSION['year'] . ";";
                $result = mysqli_query($link,$query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $model_id = $row['model_id'];
                    $model_name = $row['model_name'];
                    echo "<option value=\"" . $model_id . "\" >" . $model_name . " </option> " ;
                }
            }
            echo " </select> ";
            
            
            
            // assign previously selected model
            if(isset($_SESSION['model'])){
                echo " <script> document.getElementById('model').value = \"" . $_SESSION['model'] . "\" ; </script> ";
            }
            
            
            

            //mysqli_close($link);
            ?>

            <input type="submit" value="Search" onclick="this.form.submit()">
        </form>
    </nav>
</aside>