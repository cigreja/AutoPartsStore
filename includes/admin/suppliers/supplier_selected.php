
<!-- suppliers-->
    <div style="width: 75%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px;">
        <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
            <h4 style="margin: 0px;">Suppliers</h4></label>
        </div>

<?php
session_start();
if(isset($_GET['supplier_id'])){
    $supplier_id = $_GET['supplier_id'];
}


if(isset($_GET['update_message'])){
    $message = $_GET['update_message'];
    ?><script type="text/javascript">alert('<?php echo $message; ?>');</script><?php
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

      $query = 'select * from suppliers where supplier_id =' . $supplier_id . ';';
      $result = mysqli_query($link,$query);
      
      if(!empty($result)){
      $row = mysqli_fetch_assoc($result);
          $supplier_id = $row['supplier_id'];
          $supplier_name = $row['supplier_name'];
          $address = $row['address'];
          $city = $row['city'];
          $state = $row['state'];
          $zip = $row['zip'];
          $country = $row['country'];
      
?>



        <!-- Add Supplier Form-->
        <div style="width: 100%; padding: 10px; margin-left: 30%;">
        <form id="register_form" action="suppliers/update_info.php?update=update_supplier&supplier_id=<?php echo $supplier_id  ; ?>" method="post">

            <label>Name: </label>
            <input type="text" name="firstName" value="<?php echo $supplier_name ; ?>" style="margin: 5px 0px 5px 72px;" required>
            <br>
            
            <label>Address: </label>
            <input type="text" name="address"  value="<?php echo $address; ?>"  style="margin: 5px 0px 5px 54px;" required>
            <br>
            <label>City: </label>
            <input type="text" name="city"  value="<?php echo $city ; ?>"  style="margin: 5px 0px 5px 83px;" required>
            <br>
            <label>State: </label>
            <select name="state" id="state" value="<?php echo $state ; ?>"  form="register_form" style="margin: 5px 0px 5px 74px; width: 174px; height: 22px;" required>
                <option <?php if( $state == "Alabama"){ echo 'selected '; } ?> value="Alabama" >Alabama</option>
                <option <?php if( $state == "Alaska"){ echo 'selected '; } ?>  value="Alaska">Alaska</option>
                <option <?php if( $state == "Arizona"){ echo 'selected '; } ?>  value="Arizona">Arizona</option>
                <option <?php if( $state == "Arkansas"){ echo 'selected '; } ?>  value="Arkansas">Arkansas</option>
                <option <?php if($state == 'California'){ echo 'selected '; } ?> value="California">California</option>
                <option <?php if( $state == "Colorado"){ echo 'selected '; } ?>  value="Colorado">Colorado</option>
                <option <?php if( $state == "Connecticut"){ echo 'selected '; } ?>  value="Connecticut">Connecticut</option>
                <option <?php if( $state == "Delaware"){ echo 'selected '; } ?>  value="Delaware">Delaware</option>
                <option <?php if( $state == "Florida"){ echo 'selected '; } ?>  value="Florida">Florida</option>
                <option <?php if( $state == "Georgia"){ echo 'selected '; } ?>  value="Georgia">Georgia</option>
                <option <?php if( $state == "Hawaii"){ echo 'selected '; } ?>  value="Hawaii">Hawaii</option>
                <option <?php if( $state == "Idaho"){ echo 'selected '; } ?>  value="Idaho">Idaho</option>
                <option <?php if( $state == "Illinois"){ echo 'selected '; } ?>  value="Illinois">Illinois</option>
                <option <?php if( $state == "Indiana"){ echo 'selected '; } ?>  value="Indiana">Indiana</option>
                <option <?php if( $state == "Iowa"){ echo 'selected '; } ?>  value="Iowa">Iowa</option>
                <option  <?php if( $state == "Kansas"){ echo 'selected '; } ?> value="Kansas">Kansas</option>
                <option <?php if( $state == "Kentucky"){ echo 'selected '; } ?>  value="Kentucky">Kentucky</option>
                <option <?php if( $state == "Louisiana"){ echo 'selected '; } ?>  value="Louisiana">Louisiana</option>
                <option <?php if( $state == "Maine"){ echo 'selected '; } ?>  value="Maine">Maine</option>
                <option <?php if( $state == "Maryland"){ echo 'selected '; } ?>  value="Maryland">Maryland</option>
                <option <?php if( $state == "Massachusetts"){ echo 'selected '; } ?>  value="Massachusetts">Massachusetts</option>
                <option <?php if( $state == "Michigan"){ echo 'selected '; } ?>  value="Michigan">Michigan</option>
                <option <?php if( $state == "Minnesota"){ echo 'selected '; } ?>  value="Minnesota">Minnesota</option>
                <option <?php if( $state == "Mississippi"){ echo 'selected '; } ?>  value="Mississippi">Mississippi</option>
                <option <?php if( $state == "Missouri"){ echo 'selected '; } ?>  value="Missouri">Missouri</option>
                <option <?php if( $state == "Montana"){ echo 'selected '; } ?>  value="Montana">Montana</option>
                <option <?php if( $state == "Nebraska"){ echo 'selected '; } ?>  value="Nebraska">Nebraska</option>
                <option <?php if( $state == "Nevada"){ echo 'selected '; } ?>  value="Nevada">Nevada</option>
                <option <?php if( $state == "New Hampshire"){ echo 'selected '; } ?>  value="New Hampshire">New Hampshire</option>
                <option <?php if( $state == "New Jersey"){ echo 'selected '; } ?>  value="New Jersey">New Jersey</option>
                <option <?php if( $state == "New Mexico"){ echo 'selected '; } ?>  value="New Mexico">New Mexico</option>
                <option <?php if( $state == "New York"){ echo 'selected '; } ?>  value="New York">New York</option>
                <option <?php if( $state == "North Carolina"){ echo 'selected '; } ?>  value="North Carolina">North Carolina</option>
                <option <?php if( $state == "North Dakota"){ echo 'selected '; } ?>  value="North Dakota">North Dakota</option>
                <option <?php if( $state == "Ohio"){ echo 'selected '; } ?>  value="Ohio">Ohio</option>
                <option <?php if( $state == "Oklahoma"){ echo 'selected '; } ?>  value="Oklahoma">Oklahoma</option>
                <option <?php if( $state == "Oregon"){ echo 'selected '; } ?>  value="Oregon">Oregon</option>
                <option <?php if( $state == "Pennsylvania"){ echo 'selected '; } ?>  value="Pennsylvania">Pennsylvania</option>
                <option <?php if( $state == "Rhode Island"){ echo 'selected '; } ?>  value="Rhode Island">Rhode Island</option>
                <option <?php if( $state == "South Carolina"){ echo 'selected '; } ?>  value="South Carolina">South Carolina</option>
                <option <?php if( $state == "South Dakota"){ echo 'selected '; } ?>  value="South Dakota">South Dakota</option>
                <option <?php if( $state == "Tennessee"){ echo 'selected '; } ?>  value="Tennessee">Tennessee</option>
                <option <?php if( $state == "Texas"){ echo 'selected '; } ?>  value="Texas">Texas</option>
                <option <?php if( $state == "Utah"){ echo 'selected '; } ?>  value="Utah">Utah</option>
                <option <?php if( $state == "Vermont"){ echo 'selected '; } ?>  value="Vermont">Vermont</option>
                <option <?php if( $state == "Virginia"){ echo 'selected '; } ?>  value="Virginia">Virginia</option>
                <option <?php if( $state == "Washington"){ echo 'selected '; } ?>  value="Washington">Washington</option>
                <option <?php if( $state == "West Virginia"){ echo 'selected '; } ?>  value="West Virginia">West Virginia</option>
                <option <?php if( $state == "Wisconsin"){ echo 'selected '; } ?>  value="Wisconsin">Wisconsin</option>
                <option <?php if( $state == "Wyoming"){ echo 'selected '; } ?>  value="Wyoming">Wyoming</option>
            </select>
            <br>
            <label>Zip Code: </label>
            <input type="number" name="zip"  value="<?php echo $zip ; ?>"  style="margin: 5px 0px 5px 49px;" required>
            <br>
            <label>Country: </label>
            <select name="country" form="register_form"  value="<?php echo $country ; ?>"  style="margin: 5px 0px 5px 55px; width: 174px; height: 22px;" required>
                <option value="USA">USA</option>
            </select>
            <br>
            
            <div style="text-align: center; margin-top: 10px;"> 
                <input type="submit" name="btnSubmit" style="width: 130px; height: 30px; margin-right: 40%;" value="Update Supplier" />
            </div>
        </form>
    </div>
       

      <?php } ?>

        
        </div>  