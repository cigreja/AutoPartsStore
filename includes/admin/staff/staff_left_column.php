

<div style="border: #1E6091 thin solid; width: 17%; float: left; margin: 10px;">
 
    <br>
    <ul style="list-style-type: none;">
        <li>
            <?php if($sub_menu == 'staff' || $sub_menu == 'staff_selected' ){ ?>
                <a class="current" href="admin_page.php?menu=staff&sub_menu=staff">Staff</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=staff&sub_menu=staff">Staff</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'add_staff'){ ?>
            <a class="current" href="admin_page.php?menu=staff&sub_menu=add_staff">Add Staff</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=staff&sub_menu=add_staff">Add Staff</a>
            <?php } ?>
        </li>
    </ul>
</div>


<!--  GET MAIN PAGE  -->

<?php

if($sub_menu == 'staff'){ include ('./staff/staff.php');}
if($sub_menu == 'add_staff'){  include ('./staff/add_staff.php');  }
if($sub_menu == 'staff_selected'){  include ('./staff/staff_selected.php');  }

?>