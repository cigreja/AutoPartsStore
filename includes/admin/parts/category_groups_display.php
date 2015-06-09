

<!-- if year and model are all ser or part number is all set Then
<?php if((isset($_SESSION['year']) && $_SESSION['model'] != "null" ) || (isset($_SESSION['part_number']) && $_SESSION['part_number'] != 'null' )){ ?>

<!-- Category Groups -->
    <script>
      function get_qty(qty_id){
         return document.getElementById(qty_id).value;
      }
</script>

<div style="width: 96%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px;">
        

<div style="width: 100%; float: left; border: black solid thin; margin: 0px; padding-bottom: 0px;">
    

    <!--create parts header div -->          
    <!-- Part_num  part name    list price  qty   cost -->
    <div  style="width: 100%; border-bottom: black thin solid; height: 40px; background: #f0f0f0;">
        <div  style="width: 14%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0; ">
            <h3 style="margin: 1%;">Part Number</h3>
        </div>
        <div  style=" width: 22%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
            <h3 style="margin: 1%;">Part Name</h3>
        </div>
        <div  style="width: 14%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
            <h3 style="margin: 1%;">List Price</h3>
        </div>
        <div  style="width: 14%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
            <h3 style="margin: 1%;">In Stock</h3>
        </div>
        <div  style="width: 14%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
            <h3 style="margin: 1%;">Stock Min</h3>
        </div>
        <div  style="width: 14%; float: left; height: 100%; background: #f0f0f0;">
            <h3 style="margin: 1%;">Stock Max</h3>
        </div>
    </div>
    
        <!-- Display Parts content -->
       <?php

       // get parts for either part number search or year and model
       if((isset($_SESSION['year']) && $_SESSION['model'] != "null")){
           
           // get model by year id
            $get_model_id_query = "select model_by_year_id 
                      from model_by_year
                      where year_id = " . $_SESSION['year'] . "
                      and model_id = " . $_SESSION['model'] . ";";
            $model_by_year_id = mysqli_query($link,$get_model_id_query);
            $model_by_year_id = mysqli_fetch_assoc($model_by_year_id);
            
            // execute query for year and model
            $get_table_names_query = "select p.part_number, table_name
                    from parts p, categories c, parts_compatible pc
                    where p.part_number = pc.part_number
                    and p.categories_id = c.categories_id
                    and model_by_year_id = " . $model_by_year_id['model_by_year_id'] . " ; ";
            $table_names_result = mysqli_query($link,$get_table_names_query);
            
            } else {
                
                // execute queary for part number
                $get_table_names_query = "select distinct p.part_number, table_name
                                        from parts p, categories c, parts_compatible pc
                                        where p.part_number = pc.part_number
                                        and p.categories_id = c.categories_id
                                        and p.part_number = " . $_SESSION['part_number'] . " ; ";
                    $table_names_result = mysqli_query($link,$get_table_names_query);
            }
            
            $i = 0;
            $qty_id = 0; 
            while ($table_row = mysqli_fetch_assoc($table_names_result)) {
                $part_number = $table_row['part_number'];
                $table_name = $table_row['table_name'];
                
                $parts_query = " select part_number, part_name, part_description, list_price, in_stock, in_stock_min, in_stock_max, supplier_id
                                from parts p, " . $table_name . " t
                                where p.part_id = t.part_id
                                and p.categories_id = t.categories_id
                                and part_number = " . $part_number . ";";
                $parts_result = mysqli_query($link,$parts_query);
                $part_row = mysqli_fetch_assoc($parts_result);
                        
                $part_number = $part_row['part_number'];
                $part_name = $part_row['part_name'];
                $part_description = $part_row['part_description'];
                $list_price = $part_row['list_price'];
                $in_stock = $part_row['in_stock'];
                $in_stock_min = $part_row['in_stock_min'];
                $in_stock_max = $part_row['in_stock_max'];
                $supplier_id = $part_row['supplier_id'];
                ?>
            
        <!--Display each part information -->          
    <!-- Part_num  part name    list price  qty   cost -->
    <div  style="width: 100%; margin: 0px; background-color: #ffffff; height: 30px; ">
        <a style="  " href="<?php echo "admin_page.php?menu=parts&sub_menu=parts&part_selected=" . $part_number . "&table_name=" . $table_name ; ?>"  >
        <div style=" width: 14%; height: 30px; float: left;  background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $part_number ; ?> </h3>
        </div>
         <div style=" width: 22%; height: 100%; float: left;  background-color: #ffffff;   " >
             <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $part_name ; ?> </h3>
        </div>
         <div style=" width: 14%; height: 100%; float: left;  background-color: #ffffff;   " >
             <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $list_price ; ?> </h3>
        </div>
         <div style=" width: 14%; height: 30px; float: left;  background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $in_stock ; ?> </h3>
        </div>
        <div style=" width: 14%; height: 30px; float: left;  background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $in_stock_min ; ?> </h3>
        </div>
        <div style=" width: 14%; height: 30px; float: left; background-color: #ffffff;   " >
            <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $in_stock_max  ; ?> </h3>
        </div>
        </a>
     </div>
    </a>

     <?php $i++; } ?>
</div>
                       </div> 
<!-- This is the else page if year and model has not been selected -->
<?php } else { ?>
<!-- Get Started -->
    <div style="width: 86%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px;">
        <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
            <h4 style="margin: 0px;">Get Started</h4></label>
        </div>
        
        <!-- Get Started content-->
        <div style="padding: 10px;">
            <br>
            <p>Please select the year and model to get started.</p>
            <br>
        </div>
    </div>     
<?php } ?>
                      




