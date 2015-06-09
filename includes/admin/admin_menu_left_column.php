

<div style="border: #1E6091 thin solid; width: 17%; float: left; margin: 10px;">
 
    <br>
    <ul style="list-style-type: none;">
        <li>
            <?php if($_menu == 'general'){ ?>
                <a class="current" href="admin_page.php?menu=general">General</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=general">General</a>
            <?php } ?>
        </li>
		<li>
            <?php if($_menu == 'staff'){ ?>
                <a class="current" href="admin_page.php?menu=staff">Staff</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=staff">Staff</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'parts'){ ?>
                <a class="current"  href="admin_page.php?menu=parts">Parts</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=parts">Parts</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'add_part'){ ?>
                <a class="current"  href="admin_page.php?menu=add_part">Add Part</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=add_part">Add Part</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'orders'){ ?>
                <a class="current" href="admin_page.php?menu=orders">Orders</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=orders">Orders</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'accounting'){ ?>
                <a class="current" href="admin_page.php?menu=accounting">Accounting</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=accounting">Accounting</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'suppliers'){ ?>
                <a class="current" href="admin_page.php?menu=suppliers">Suppliers</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=suppliers">Suppliers</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'phpmyadmin'){ ?>
            <a class="current" href="../../phpmyadmin/phpmyadmin.php?menu=phpmyadmin">phpmyadmin</a>
            <?php } else { ?>
                <a  href="../../phpmyadmin/phpmyadmin.php?menu=phpmyadmin">phpmyadmin</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'log_out'){ ?>
                <a class="current" href="admin_page.php?menu=log_out">Log Out</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=log_out">Log Out</a>
            <?php } ?>
        </li>
		
    </ul>
</div>

