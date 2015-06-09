

<div style="border: #1E6091 thin solid; width: 17%; float: left; margin: 10px;">
 
    <br>
    <ul style="list-style-type: none;">
        <li>
            <?php if($sub_menu == 'parts'){ ?>
                <a class="current" href="admin_page.php?menu=parts&sub_menu=parts">Parts</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=parts&sub_menu=parts">Parts</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'add_part'){ ?>
            <a class="current" href="admin_page.php?menu=parts&sub_menu=add_part">Add Part</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=parts&sub_menu=add_part">Add Part</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'delete_part'){ ?>
            <a class="current" href="admin_page.php?menu=parts&sub_menu=delete_part">Delete Part</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=parts&sub_menu=delete_part">Delete Part</a>
            <?php } ?>
        </li>	
    </ul>
</div>


<!--  GET MAIN PAGE  -->

<?php

if($sub_menu == 'parts'){ include ('./parts/parts.php');}
if($sub_menu == 'add_part'){  include ('./parts/add_part.php');  }
if($sub_menu == 'delete_part'){  include ('./parts/delete_part.php');  }

?>