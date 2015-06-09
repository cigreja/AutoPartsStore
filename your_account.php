<?php 
include('includes/your_account_page/header_account.php');

session_start();

if(isset($_SESSION['cust_num'])){
    //check for null or logged out
    if($_SESSION['cust_num'] != ''){
        header('Location: includes/customer/customer_page.php?menu=general');
    }
}

if(isset($_GET['cust_message'])){
    $cust_message = $_GET['cust_message'] . '<br>';
    echo '<script type="text/javascript">'
        . 'document.getElementById("cust_email").value = \'\';'
        . 'document.getElementById("cust_password").value = \'\';'
        . '</script>';
}
 else {
    $cust_message = '';
}

if(isset($_GET['admin_message'])){
    $admin_message = $_GET['admin_message'] . '<br>';
    echo '<script type="text/javascript">'
        . 'document.getElementById("admin_email").value = \'\';'
        . 'document.getElementById("admin_password").value = \'\';'
        . '</script>';
}
 else {
    $admin_message = '';
}

?>

<div style="border-bottom: black solid medium;">
    <h1>Your Account:</h1>
    </div>
    <br>

    <!-- left div -->
    <div style="width: 25%; float: left; border: black solid thin; margin: 2%; padding: 10px;">
        <form action="includes/customer/new_customer_register_page.php" method="post">
        <h3>New Customers</h3>
        <p>In order to take advantage of the great products and services we offer, it is necessary to register for an account.</p>
        <input type="submit" name="register" value="Register" style="width: 80; height: 30;"/>
        </form>
    </div>   
    
     <!-- middle div -->
    <div style="width: 25%; float: left; border: black solid thin; margin: 2%; padding: 10px;">
        <form action="includes/your_account_page/login_validation.php?login=customer" method="post">
        <h3>Returning Customers</h3>
        <p>Enter your email address and password below to sign in to your account.</p>
        <br><label>Email: </label>
        <br><input type="email" name="cust_email" id="cust_email" required>
        <br>
        <br><label>Password: </label>
        <br><input type="password" name="cust_password" id="cust_password" required>
        <br>
        <?php echo $cust_message;?>
        <br><input type="submit" name="sign_in" value="Sign In" style="width: 80; height: 30;"/>
        </form>
    </div>
    
    <!-- right div -->
    <div style="width: 25%; float: left; border: black solid thin; margin: 2%; padding: 10px;">
        <form action="includes/your_account_page/login_validation.php?login=admin" method="post">
        <h3>Administration</h3>
        <p>Sign in here if you are part of the Blue Team BMW administration.</p>
        <br><label>Email: </label>
        <br><input type="email" name="admin_email" id="admin_email" required>
        <br>
        <br><label>Password: </label>
        <br><input type="password" name="admin_password" id="admin_password" required>
        <br>
        <?php echo $admin_message;?>
        <br><input type="submit" name="sign_in" value="Sign In" style="width: 80; height: 30;"/>
        </form>
    </div>



<!-- end the middle column -->

<?php 
include('includes/footer.php');
?>