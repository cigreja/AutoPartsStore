<?php
session_start();
// connect to database
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

//echo 'Connected successfully';
?>


<!-- middle column -->
<div style="border: #1E6091 thin solid; width: 78%; float: left; margin: 10px;">
    
    <!-- middle column content -->
    <div style="width: 100%; padding: 5px;">
        <form id="register_form" action="update_info.php?update=add_part" method="post">

           
            <!-- Split Middle Column in half ( two columns) -->
            
            <!-- Left column -->
            <div style=" float: left; width: 40%; padding: 10px; margin: 10px;">
            
            
                <!-- Part info -->
                <div style=" width: 100%; float: left; border: black thin solid; padding: 10px; margin: 10px;">

                    <!-- parts table -->
                    <h2>Part Details:</h2>
                    <label>Categories Id:</label><br>
                    <input type="number"><br>
                    <label>In Stock:</label><br>
                    <input type="number"><br>
                    <label>Min Stock:</label><br>
                    <input type="number"><br>
                    <label>Max Stock:</label><br>
                    <input type="number"><br>
                    <label>Supplier Id:</label><br>
                    <input type="number"><br>

                    <!-- categories table -->
                    <label>Part Name:</label><br>
                    <input type="number"><br>
                    <label>List Price:</label><br>
                    <input type="number"><br>

                </div>
            
    </div>
            
            
            <!-- Right column -->
            <div style=" float: left; width: 40%; padding: 10px; margin: 10px;">
                
                <!-- Optional Details -->
                <div style=" width: 100%;  float: left; border: black thin solid; padding: 10px; margin: 10px;">
                    <h2>Optional Details: </h2>
                    <label>Sub Category:</label><input type="text"><br>
                    <label>Filter:</label><input type="text"><br>
                    <label>Description:</label><input type="text"><br>

                </div>
            
                <!-- vehicle models -->
                <div style="  width: 100%; float: left; border: black thin solid; padding: 10px; margin: 10px;">
                    <h2>Models</h2>
                    <label>Part Number:</label><input type="text"><br>
                    <label>Categories Id:</label><input type="text"><br>
                </div>


                <!-- vehicle years -->
                <div style="  width: 100%; float: left; border: black thin solid; padding: 10px; margin: 10px;">
                    <h2>Years</h2>
                    <label>Part Number:</label><input type="text"><br>
                    <label>Categories Id:</label><input type="text"><br>
                </div>
            
            </div>
            
        </form>
    </div>
</div>