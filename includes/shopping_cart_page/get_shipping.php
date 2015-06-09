<?php 
if(isset($_GET['subtotal'])){
    $order_info = '&subtotal=' . $_GET['subtotal'] . '&shipping_type=' . $_GET['shipping_type'] . '&shipping_price=' . $_GET['shipping_price'] . '&sales_tax=' . $_GET['sales_tax'] . '&total_price=' . $_GET['total_price'];
}
?>

<?php include('header_check_out_page.php');?>
<?php include ('../customer/get_form_fill_in_data.php'); ?>

<!-- middle column -->
<div style="border: #1E6091 thin solid; width: 50%; float: left; margin: 10px;">
    <!-- middle column title -->
    <div style="border-bottom: black solid thin;">
    <h2>Shipping Information:</h2>
    </div>
    <br>
    <!-- middle column content -->

    <div style="width: 100%; padding: 10px;">
        <form id="register_form" action="../customer/update_info.php?update=check_out_shipping<?php echo $order_info; ?>" method="post">

            <label>First Name: </label>
            <input type="text" name="firstName" value="<?php echo $first; ?>" style="margin: 5px 0px 5px 34px;" required>
            <br>
            <label>Last Name: </label>
            <input type="text" name="lastName" value="<?php echo $last; ?>" style="margin: 5px 0px 5px 36px;" required>
            <br>
            <label>Address: </label>
            <input type="text" name="address" value="<?php echo $address; ?>" style="margin: 5px 0px 5px 54px;" required>
            <br>
            <label>City: </label>
            <input type="text" name="city" value="<?php echo $city; ?>" style="margin: 5px 0px 5px 83px;" required>
            <br>
            <label>State: </label>
            <select name="state" id="state" form="register_form" style="margin: 5px 0px 5px 74px; width: 174px; height: 22px;" required>
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
            <input type="number" name="zip" value="<?php echo $zip; ?>" style="margin: 5px 0px 5px 49px;" required>
            <br>
            <label>Country: </label>
            <select name="country" form="register_form" value="<?php echo $country; ?>" style="margin: 5px 0px 5px 55px; width: 174px; height: 22px;" required>
                <option value="USA">USA</option>
            </select>
            <br>
            <div style="text-align: center; margin-top: 10px;"> 
                <input type="submit" name="btnSubmit" style="width: 130px; height: 30px;" value="Update" />
            </div>
        </form>
    </div>
</div>

<!-- Go To Billing Div -->
<div style="border: #1E6091 thin solid; width: 50%; float: left; margin: 10px;">
        <form id="get_billing_button_form" action="get_billing.php?menu=billing<?php echo $order_info; ?>" method="post">
            <div style="text-align: center; margin-top: 10px;"> 
                <input type="button" name="go_to_billing_button" form="get_billing_button_form" onclick="this.form.submit()"style="width: 130px; height: 30px;" value="Go To Billing" />
            </div>
        </form>
    </div>


