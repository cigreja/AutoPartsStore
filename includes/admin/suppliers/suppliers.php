

<!-- suppliers-->
    <div style="width: 75%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px;">
        <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
            <h4 style="margin: 0px;">Suppliers</h4></label>
        </div>

<?php
session_start();
if(isset($_GET['update'])){
    $update = $_GET['update'];
}

// connect to database
define('DB_NAME', 'blue_team_bmw');
define('DB_USER', 'blue_team');
define('DB_PASSWORD', 'bmw');
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

      $query = 'select * from suppliers;';
      $result = mysqli_query($link,$query);
      
      if(!empty($result))
      while($row = mysqli_fetch_assoc($result)){
          $supplier_id = $row['supplier_id'];
          $supplier_name = $row['supplier_name'];
          $address = $row['address'];
          $city = $row['city'];
          $state = $row['state'];
          $zip = $row['zip'];
          $country = $row['country'];
      
?>



        <!-- Get Started content-->
        <div style="padding: 10px;">
            <a href="admin_page.php?menu=suppliers&sub_menu=supplier_selected&supplier_id=<?php echo $supplier_id ; ?>"><?php echo $supplier_name ; ?></a><br>
        </div>
       

      <?php } ?>

        
        </div>  