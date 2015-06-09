<?php 
include('includes/contact_us_page/header_contact.php');
include('includes/contact_us_page/column_left_contact.php');
?>

<!-- start the middle column -->

<section>
    <div style="border-bottom: black solid medium;">
    <h1>Contact Us:</h1>
    </div>
    <br>
    
    <form action="includes/contact_us_page/contact_us_store_data.php" method="post">
        <label>First Name: </label>
        <input type="text" name="firstName" style="margin-left: 2px;" required>
        <br>
        <label>Last Name: </label>
        <input type="text" name="lastName" style="margin-left: 2px;" required>
        <br>
        <label>Email: </label>
        <input type="email" name="emailAddress" style="margin-left: 1px;" required>
        <br>
        <label>Comments: </label>
        <textarea name="comments" cols="50" rows="10" required></textarea>
        <br>
        <div style="text-align:center"> 
            <input type="submit" name="btnSubmit" style="width: 100px; height: 30px;" value="Send" />
        </div>
    </form>
</section>

<!-- end the middle column -->

<?php 
include('includes/contact_us_page/column_right_contact.php');
include('includes/footer.php');
?>