

<div style="border: #1E6091 thin solid; width: 17%; float: left; margin: 10px;">
 
    <br>
    <ul style="list-style-type: none;">
        <li>
            <?php if($sub_menu == 'suppliers' || $sub_menu == 'supplier_selected' ){ ?>
                <a class="current" href="admin_page.php?menu=suppliers&sub_menu=suppliers">Suppliers</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=suppliers&sub_menu=suppliers">Suppliers</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'add_supplier'){ ?>
            <a class="current" href="admin_page.php?menu=suppliers&sub_menu=add_supplier">Add Supplier</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=suppliers&sub_menu=add_supplier">Add Supplier</a>
            <?php } ?>
        </li>
        <li>
            <?php if($sub_menu == 'delete_supplier'){ ?>
            <a class="current" href="admin_page.php?menu=suppliers&sub_menu=delete_supplier">Delete Supplier</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=suppliers&sub_menu=delete_supplier">Delete Supplier</a>
            <?php } ?>
        </li>	
    </ul>
</div>


<!--  GET MAIN PAGE  -->

<?php

if($sub_menu == 'suppliers'){ include ('./suppliers/suppliers.php');}
if($sub_menu == 'add_supplier'){  include ('./suppliers/add_supplier.php');  }
if($sub_menu == 'delete_supplier'){  include ('./suppliers/delete_supplier.php');  }
if($sub_menu == 'supplier_selected'){  include ('./suppliers/supplier_selected.php');  }

?>