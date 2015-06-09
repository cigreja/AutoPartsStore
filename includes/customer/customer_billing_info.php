
<?php include ('get_form_fill_in_data.php'); ?>

<!-- middle column -->
<div style="border: #1E6091 thin solid; width: 50%; float: left; margin: 10px;">
    <!-- middle column title -->
    <div style="border-bottom: black solid thin;">
    <h2>Billing Information:</h2>
    </div>
    <br>
    <!-- middle column content -->

    <div style="width: 100%; padding: 10px;">
        <!-- billing information form -->
        <form id="register_form" action="update_info.php?update=billing" method="post">

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
        
        <!-- retrieve credit cards if any -->
        <div>
            <div style="border-bottom: black solid thin;">
            <h2>Credit Card Information:</h2>
            </div>
            <br>
            <?php 
                $get_credit_card_info_query = "SELECT card_type, card_number, expiration_month, expiration_year, ccv FROM customer_credit_card_info WHERE cust_num = " . $_SESSION['cust_num'] . ";";
                $get_credit_card_info_result = mysqli_query($link,$get_credit_card_info_query);
                
                $i = 1;
                while ($get_credit_card_info_row = mysqli_fetch_assoc($get_credit_card_info_result)) {

                    $card_type = $get_credit_card_info_row['card_type'];
                    $card_number = $get_credit_card_info_row['card_number'];
                    $expiration_month= $get_credit_card_info_row['expiration_month'];
                    $expiration_year= $get_credit_card_info_row['expiration_year'];
                    $ccv = $get_credit_card_info_row['ccv']; ?>
            <div>
            <form id="delete_credit_card_form" action="update_info.php?update=delete_card" method="post">
                <h2>CREDIT CARD <?php echo $i;?></h2>
            <br>
            
            <label>Card Type: </label>
            <input name="card_type" value="<?php echo $card_type;?>" style="margin: 5px 0px 5px 74px; width: 174px; height: 22px;" readonly >
            <br>
            <label>Card Number: </label>
            <input type="number" value="<?php echo $card_number;?>"  name="card_number" style="margin: 5px 0px 5px 53px;" readonly>
            <br>
            <label>Expiration: </label>
            <input name="expire_month" value="<?php echo $expiration_month;?>"  style="margin: 5px 0px 5px 76px; width: 76px; height: 22px;" readonly>
            <?php echo '/'; ?>
            <input name="expire_year" value="<?php echo $expiration_year;?>"  style="margin: 5px 0px 5px 5px; width: 77px; height: 22px;" readonly>
            <br>
            <label>CCV: </label>
            <input type="number" value="<?php echo $ccv;?>"  name="ccv" style="margin: 5px 0px 5px 117px;" readonly>
            <br>
            <div style="text-align: center; margin-top: 10px;"> 
                <input type="submit" name="btnSubmit" style="width: 130px; height: 30px;" value="Delete Card" />
            </div>
        </form>
            </div> 
            <?php  $i++;  }?>
        </div>
        
        <!-- add credit card form -->
        <form id="add_credit_card_form" action="update_info.php?update=add_card" method="post">
            
            <h2>ADD CREDIT CARD</h2>
            <br>
            
            <label>Card Type: </label>
            <select name="card_type" form="add_credit_card_form" style="margin: 5px 0px 5px 74px; width: 174px; height: 22px;" required>
                <option value="Mastercard">Mastercard</option>
                <option value="Visa">Visa</option>
                <option value="Discover">Discover</option>
                <option value="American Express">American Express</option>
            </select>
            <br>
            <label>Card Number: </label>
            <input type="number" name="card_number" style="margin: 5px 0px 5px 53px;" required>
            <br>
            <label>Expiration: </label>
            <select name="expire_month" form="add_credit_card_form" style="margin: 5px 0px 5px 76px; width: 76px; height: 22px;" required>
                <?php for($i = 1; $i < 13; $i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <?php echo '/'; ?>
            <select name="expire_year" form="add_credit_card_form" style="margin: 5px 0px 5px 5px; width: 77px; height: 22px;" required>
                <?php for($i = date('Y'); $i < date('Y') + 30; $i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <br>
            <label>CCV: </label>
            <input type="number" name="ccv" style="margin: 5px 0px 5px 117px;" required>
            <br>
            <div style="text-align: center; margin-top: 10px;"> 
                <input type="submit" name="btnSubmit" style="width: 130px; height: 30px;" value="Add Card" />
            </div>
        </form>
    </div>
</div>
