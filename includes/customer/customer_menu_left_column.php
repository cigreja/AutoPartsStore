
<div style="border: #1E6091 thin solid; width: 10%; float: left; margin: 10px;">
    <br>
    <ul style="list-style-type: none;">
          <li>
            <?php if($_menu == 'general'){ ?>
              <a class="current" href="customer_page.php?menu=general">General</a>
            <?php } else { ?>
                <a  href="customer_page.php?menu=general">General</a>
            <?php } ?>
          </li>
        <li>
            <?php if($_menu == 'shipping'){ ?>
                <a class="current" href="customer_page.php?menu=shipping">Shipping</a>
            <?php } else { ?>
                <a  href="customer_page.php?menu=shipping">Shipping</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'billing'){ ?>
                <a class="current" href="customer_page.php?menu=billing">Billing</a>
            <?php } else { ?>
                <a  href="customer_page.php?menu=billing">Billing</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'orders'){ ?>
                <a class="current" href="customer_page.php?menu=orders">Orders</a>
            <?php } else { ?>
                <a  href="customer_page.php?menu=orders">Orders</a>
            <?php } ?>
        </li>
        <li>
            <?php if($_menu == 'log_out'){ ?>
                <a class="current" href="customer_page.php?menu=log_out">Log Out</a>
            <?php } else { ?>
                <a  href="customer_page.php?menu=log_out">Log Out</a>
            <?php } ?>
        </li>
    </ul>
</div>

