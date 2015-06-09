
<script>
      function get_qty(qty_id){
         return document.getElementById(qty_id).value;
      }
</script>

<div style="width: 74.55%; float: left; border: black solid thin; margin: 0px; padding-bottom: 0px;">
    
        <!-- Display Parts content -->
       <?php
            // get categories
            $query = "select model_by_year_id 
                      from model_by_year
                      where year_id = " . $_SESSION['year'] . "
                      and model_id = " . $_SESSION['model'] . ";";
            $model_by_year_id = mysqli_query($link,$query);
            $model_by_year_id = mysqli_fetch_assoc($model_by_year_id);
            
            if($_SESSION['filter_item'] == "show_all"){ 
                $query = "SELECT pc.part_number, part_name, part_description, list_price
                          FROM parts p, parts_compatible pc, " . $_SESSION['table_name'] . " tn
                          WHERE p.part_number = pc.part_number
                          AND p.categories_id = tn.categories_id
                          AND p.part_id = tn.part_id
                          AND pc.model_by_year_id = " . $model_by_year_id['model_by_year_id'] . ";";
                $parts = mysqli_query($link,$query);
                
            } else {
                $query = "SELECT pc.part_number, part_name, part_description, list_price
                          FROM parts p, parts_compatible pc, " . $_SESSION['table_name'] . " tn
                          WHERE p.part_number = pc.part_number
                          AND p.categories_id = tn.categories_id
                          AND p.part_id = tn.part_id
                          AND pc.model_by_year_id = " . $model_by_year_id['model_by_year_id'] . "
                          AND filters = '" . $_SESSION['filter_item'] . "';";
                $parts = mysqli_query($link,$query);
            }
            
            $i = 0;
            $qty_id = 0; 
            while ($part_row = mysqli_fetch_assoc($parts)) {
                $part_number = $part_row['part_number'];
                $part_name = $part_row['part_name'];
                $part_description = $part_row['part_description'];
                $list_price = $part_row['list_price'];
                
                if($i % 2 === 0){ ?>
                   <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
                <?php } else { ?>
                    <div style="width: 100%; margin: 0px; background-color: #ffffff; ">
                <?php } ?>
            
            <!-- Display Part Information-->
            <?php if($i % 2 === 0){ ?>
                   <div style=" width: 75%; height: 100px; float: left; background-color: #f0f0f0; " >
                <?php } else { ?>
                    <div style=" width: 75%; height: 100px; float: left; background-color: #ffffff; " >
                <?php } ?>
                <h4 style="margin: 10px;"> <?php echo $part_name; ?> </h4>
                <?php if($part_description != " "){ ?>
                <p style="margin: 10px;" ><?php echo $part_description; ?></p>
                <?php } ?>
                <p style="margin: 10px;" >Price: $<?php echo $list_price; ?></p>
            </div>
            
            <!-- Display Qty, Buy and Add to Cart-->
            <?php if($i % 2 === 0){ ?>
                   <div style=" width: 25%; height: 100px; float: left; background-color: #f0f0f0; " >
                <?php } else { ?>
                    <div style=" width: 25%; height: 100px; float: left; background-color: #ffffff; " >
                <?php } ?>
                <p  ><strong>Quantity: </strong>
                    <input name="quantity" id="<?php echo $qty_id ; ?>" type="number" value="1" style="width: 40px; ">
                </p>
                <p><a href="includes/customer/update_info.php?update=buy_now&part_number=<?php echo $part_number; ?>"  onclick="location.href=this.href+'&qty='+get_qty(<?php echo $qty_id ; ?>);return false;" ><img src="images/buynow.gif" style="width: 90px;" ></a></p>
                <p><a href="includes/customer/update_info.php?update=add_to_cart&part_number=<?php echo $part_number; ?>"  onclick="location.href=this.href+'&qty='+get_qty(<?php echo $qty_id ; ?>);return false;"><img src="images/add2cart.gif" style="width: 90px; height: 25px; " ></a></p>
            </div>
    <?php $qty_id++ ; ?>
    <?php if($i % 2 === 0){ ?>
       </div>  
    <?php } else { ?>
    </div>  
    <?php } ?>
     <?php $i++; } ?>
</div>   



