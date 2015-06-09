
<div style="border-bottom: black solid thin; text-align: center;">
    <nav>
        <form name="year_and_model_form" style="margin-bottom: 0;" action="../admin/admin_page.php?menu=parts" method="post" >
            <label><strong>Search by year and model: </strong></label>
        
            <?php

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

            <input type="submit" value="Go!" onclick="this.form.submit()">
        </form>
    </nav>
</div>