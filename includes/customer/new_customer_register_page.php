<?php 
include('header_customer.php');
?>

<script type="text/javascript">
    function confirmPass() {
        var pass = document.getElementById("password").value
        var confPass = document.getElementById("confirm_password").value
        if(pass != confPass) {
            alert('Wrong confirm password !');
            document.getElementById("confirm_password").value = '';
        }
    }
    function confirmEmail() {
        var pass = document.getElementById("email").value
        var confPass = document.getElementById("confirm_email").value
        if(pass != confPass) {
            alert('Wrong confirm email !');
            document.getElementById("confirm_email").value = '';
        }
    }
</script>

<div style="border-bottom: black solid medium;">
    <h1>New Customer Register:</h1>
    </div>
    <br>

<!-- left div -->
<div style="width: 350px; padding: 10px; border: #1E6091 thin solid;">
    <form id="register_form" action="new_customer_register_store_data.php" method="post">
       
       <p>REGISTRATION</p>
        
       
        <label>First Name: </label>
        <input type="text" name="firstName" style="margin: 5px 0px 5px 34px;" required>
        <br>
        <label>Last Name: </label>
        <input type="text" name="lastName" style="margin: 5px 0px 5px 36px;" required>
        <br>
        <label>Address: </label>
        <input type="text" name="address" style="margin: 5px 0px 5px 54px;" required>
        <br>
        <label>City: </label>
        <input type="text" name="city" style="margin: 5px 0px 5px 83px;" required>
        <br>
        <label>Country: </label>
        <select name="country" form="register_form" style="margin: 5px 0px 5px 55px; width: 174px; height: 22px;" required>
            <option value="USA">USA</option>
        </select>
        <br>
        <label>State: </label>
        <select name="state" form="register_form" style="margin: 5px 0px 5px 74px; width: 174px; height: 22px;" required>
            <option value="Alabama">Alabama</option>
            <option value="Alaska">Alaska</option>
            <option value="Arizona">Arizona</option>
            <option value="Arkansas">Arkansas</option>
            <option value="California">California</option>
            <option value="Colorado">Colorado</option>
            <option value="Connecticut">Connecticut</option>
            <option value="Delaware">Delaware</option>
            <option value="Florida">Florida</option>
            <option value="Georgia">Georgia</option>
            <option value="Hawaii">Hawaii</option>
            <option value="Idaho">Idaho</option>
            <option value="Illinois">Illinois</option>
            <option value="Indiana">Indiana</option>
            <option value="Iowa">Iowa</option>
            <option value="Kansas">Kansas</option>
            <option value="Kentucky">Kentucky</option>
            <option value="Louisiana">Louisiana</option>
            <option value="Maine">Maine</option>
            <option value="Maryland">Maryland</option>
            <option value="Massachusetts">Massachusetts</option>
            <option value="Michigan">Michigan</option>
            <option value="Minnesota">Minnesota</option>
            <option value="Mississippi">Mississippi</option>
            <option value="Missouri">Missouri</option>
            <option value="Montana">Montana</option>
            <option value="Nebraska">Nebraska</option>
            <option value="Nevada">Nevada</option>
            <option value="New Hampshire">New Hampshire</option>
            <option value="New Jersey">New Jersey</option>
            <option value="New Mexico">New Mexico</option>
            <option value="New York">New York</option>
            <option value="North Carolina">North Carolina</option>
            <option value="North Dakota">North Dakota</option>
            <option value="Ohio">Ohio</option>
            <option value="Oklahoma">Oklahoma</option>
            <option value="Oregon">Oregon</option>
            <option value="Pennsylvania">Pennsylvania</option>
            <option value="Rhode Island">Rhode Island</option>
            <option value="South Carolina">South Carolina</option>
            <option value="South Dakota">South Dakota</option>
            <option value="Tennessee">Tennessee</option>
            <option value="Texas">Texas</option>
            <option value="Utah">Utah</option>
            <option value="Vermont">Vermont</option>
            <option value="Virginia">Virginia</option>
            <option value="Washington">Washington</option>
            <option value="West Virginia">West Virginia</option>
            <option value="Wisconsin">Wisconsin</option>
            <option value="Wyoming">Wyoming</option>
        </select>
        <br>
        <label>Zip Code: </label>
        <input type="number" name="zip" style="margin: 5px 0px 5px 49px;" required>
        <br>
        
        
        <p>CREATE SIGN IN INFORMATION</p>
        
        <label>Email: </label>
        <input type="email" name="email" id="email" style="margin: 5px 0px 5px 85px;" required>
        <br>
        <label>Confirm Email: </label>
        <input type="email" name="confirm_email" id="confirm_email" style="margin: 5px 0px 5px 25px;" onblur="confirmEmail()" required>
        <br>
        <label>Password: </label>
        <input type="password" name="password" id="password" style="margin: 5px 0px 5px 61px;" required>
        <br>
        <label>Confirm Password: </label>
        <input type="password" name="confirm_password" id="confirm_password" style="margin: 5px 0px 5px 0px;" onblur="confirmPass()" required>
        <br>
        <div style="text-align: center; margin-top: 10px;"> 
            <input type="submit" name="btnSubmit" style="width: 130px; height: 30px;" value="Create My Account" />
        </div>
    </form>
</div>
<?php 
include('../footer.php');
?>
