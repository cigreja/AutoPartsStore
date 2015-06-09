
<html>
<head>
    <title>Blue Team BMW</title>
	<link rel="stylesheet" href="../../styles/main.css" type="text/css">
	<link rel="shortcut icon" href="../../images/team_blue.jpg">  
</head>

<body>

    <header>
        <img src="../../images/team_blue.jpg" 
             alt="Blue Team Logo" width="130">
        <h1>Blue Team BMW</h1>
        <h2>Quality BMW genuine parts!</h2>
    </header>
    <nav id="nav_bar">
        <ul>
        <li>
            <?php if($menu == 'general'){ ?>
                <a class="current" href="admin_page.php?menu=general&sub_menu=general">General</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=general&sub_menu=general">General</a>
            <?php } ?>
        </li>
		<li>
            <?php if($menu == 'staff'){ ?>
                <a class="current" href="admin_page.php?menu=staff&sub_menu=staff">Staff</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=staff&sub_menu=staff">Staff</a>
            <?php } ?>
        </li>
        <li>
            <?php if($menu == 'parts'){ ?>
                <a class="current"  href="admin_page.php?menu=parts&sub_menu=parts">Parts</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=parts&sub_menu=parts">Parts</a>
            <?php } ?>
        </li>
        <li>
            <?php if($menu == 'orders'){ ?>
                <a class="current" href="admin_page.php?menu=orders">Orders</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=orders">Orders</a>
            <?php } ?>
        </li>
        <li>
            <?php if($menu == 'accounting'){ ?>
                <a class="current" href="admin_page.php?menu=accounting">Accounting</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=accounting">Accounting</a>
            <?php } ?>
        </li>
        <li>
            <?php if($menu == 'suppliers'){ ?>
                <a class="current" href="admin_page.php?menu=suppliers&sub_menu=suppliers">Suppliers</a>
            <?php } else { ?>
                <a  href="admin_page.php?menu=suppliers&sub_menu=suppliers">Suppliers</a>
            <?php } ?>
        </li>	
    </ul>
    </nav>