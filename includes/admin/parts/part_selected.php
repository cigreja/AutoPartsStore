<?php if(isset($_GET['part_selected'])){
    $part_selected = $_GET['part_selected'];
    $table_name = $_GET['table_name'];
}

if(isset($_GET['update_message'])){
    $message = $_GET['update_message'];
    ?><script type="text/javascript">alert('<?php echo $message; ?>');</script><?php
}

?>

<script>
      function update_part_info(part_name){
          var part_value = document.getElementById(part_name).value;
          if(part_value == ''){
              alert('please enter required value for this option');
          }else{
              window.location.href = 'parts/update_parts_info.php?part_selected=<?php echo $part_selected ; ?> &'+part_name+'='+part_value+'&table_name=<?php echo $table_name ; ?>';
          }
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

                    $part_number = $_GET['part_selected'];
                    $table_name = $_GET['table_name'];

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
        <div  style="width: 100%; margin: 0px; background-color: #ffffff; height: 130px; ">
            <div style=" width: 14%; height: 30px; float: left;  background-color: #ffffff;  text-align: center; " >
                <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $part_number ; ?> </h3>
            </div>
            
                 <div style=" width: 22%; height: 100%; float: left;  background-color: #ffffff;text-align: center;" >
                     <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $part_name ; ?> </h3>
                     <input type="text" id="update_part_name" form="update_part_name" style="width: 90%; height: 25px; margin: 10px;" required />
                     <input type="submit" name="update_part_name" form="update_part_name" onclick="update_part_info('update_part_name')"  value="Update Part Name" style="width: 90%; height: 25px; margin: 10px ;">
                </div>
           
            
                 <div style=" width: 14%; height: 100%; float: left;  background-color: #ffffff;  text-align: center;  " >
                     <h3 style=" margin: 8px 0px 0px 25px ;" > $<?php echo $list_price ; ?> </h3>
                     <input type="text" id="update_list_price" form="update_list_price" style="width: 90%; height: 25px; margin: 10px;" required />
                    <input type="submit" name="update_list_price" form="update_list_price" value="Update Price" onclick="update_part_info('update_list_price')" style="width: 90%; height: 25px; margin: 10px ;">
                </div>
            
            
                 <div style=" width: 14%; height: 30px; float: left;  background-color: #ffffff;   text-align: center; " >
                    <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $in_stock ; ?> </h3>
                    <input type="text" id="update_in_stock" form="update_in_stock" style="width: 90%; height: 25px; margin: 10px;" required />
                    <input type="submit" name="update_in_stock" form="update_in_stock" value="Order More" onclick="update_part_info('update_in_stock')"  style="width: 90%; height: 25px; margin: 10px ;">
                </div>
           
            <div style=" width: 14%; height: 30px; float: left;  background-color: #ffffff;  text-align: center;  " >
                <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $in_stock_min ; ?> </h3>
                <input type="text" id="update_stock_min" form="update_stock_min" style="width: 90%; height: 25px; margin: 10px;" required />
                <input type="submit" name="update_stock_min" form="update_stock_min" value="Set Min" onclick="update_part_info('update_stock_min')"  style="width: 90%; height: 25px; margin: 10px ;">
            </div>
            
                <div style=" width: 14%; height: 30px; float: left; background-color: #ffffff;  text-align: center; " >
                    <h3 style=" margin: 8px 0px 0px 25px ;" > <?php echo $in_stock_max  ; ?> </h3>
                    <input type="text" id="update_stock_max" form="update_stock_max"  style="width: 90%; height: 25px; margin: 10px;" required />
                    <input type="submit" name="update_stock_max" form="update_stock_max" value="Set Max" onclick="update_part_info('update_stock_max')" style="width: 90%; height: 25px; margin: 10px; ">
                </div>
            
         </div>
    </div>
</div>

                      




