

<div style="border: #1E6091 thin solid; width: 17%; float: left; margin: 10px;">
 
    <br>
    <ul style="list-style-type: none;">
        <li>
            <?php if($sub_menu == 'general'){ ?>
                <a class="current" href="admin_page.php?menu=general&sub_menu=general">General</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=general&sub_menu=general">General</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'database'){ ?>
            <a class="current" href="admin_page.php?menu=general&sub_menu=database">Database</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=general&sub_menu=database">Database</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'log_out'){ ?>
                <a class="current" href="admin_page.php?menu=log_out">Log Out</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=log_out">Log Out</a>
            <?php } ?>
        </li>
		
    </ul>
</div>


<!--  GET MAIN PAGE  -->

<?php

if($sub_menu == 'general'){ include ('./general/general.php');}
if($sub_menu == 'database'){  include ('./general/database.php');  }
if($sub_menu == 'log_out'){ include ('./general/log_out.php'); }

?>