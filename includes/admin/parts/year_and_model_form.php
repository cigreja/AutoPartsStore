<!-- Keyword Search  change to model year-->
    <div style="width: 40%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px; height: 104px;">
        <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
            <h4 style="margin: 0px;">Search By Year And Model</h4></label>
        </div>
        <form  name="year_and_model_form" style="margin-bottom: 0; padding: 10px;" action="../admin/admin_page.php?menu=parts&sub_menu=parts" method="post">
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

            echo "<select onchange=\"this.form.submit()\" name =\"year\" id =\"year\" style=\" height: 25px;\" >";
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
            echo " <select  name=\"model\"  id=\"model\" style=\" height: 25px;\" >";
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

            <input type="submit" name="search" value="Search" onclick="this.form.submit()" style="width: 60; height: 25; margin-left: 10px; margin-bottom: 0px; color: #FFFFFF; background-color: #1E6091;"/>
        </form>      
    </div>   
