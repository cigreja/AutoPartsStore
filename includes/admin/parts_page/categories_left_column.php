
<script type="text/javascript" >
            function toggle(elementId) {
                var ele = document.getElementById(elementId);
                if(ele.style.display == "block") {
                    ele.style.display = "none";
                }
                else {
                    ele.style.display = "block";
                }
            }
</script>

<script type="text/css" >
.Category_Groups {
        text-decoration:none;
        list-style-type: none;
    }
</script>


<!-- Categories Left Column  -->
    <div style="width: 25%; float: left; border: black solid thin; margin: 0%; padding-bottom: 0px;">
        <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
            <h4 style="margin: 0px;">Category Groups</h4>
        </div>
        
        <!-- Category Groups content-->
       <?php
            // get model_by_year_id
            $query = "SELECT model_by_year_id
                      FROM model_by_year
                      WHERE year_id = " . $_SESSION['year'] . "
                      AND model_id = " . $_SESSION['model'] . ";";
            $get_model_by_id_result = mysqli_query($link,$query);
            $get_model_by_id = mysqli_fetch_assoc($get_model_by_id_result);
            // get categories
            $query = "SELECT distinct table_name, categories_name 
                      FROM parts_compatible pc, parts p, categories c
                      WHERE pc.part_number = p.part_number
                      AND p.categories_id = c.categories_id
                      AND model_by_year_id = " . $get_model_by_id['model_by_year_id'] . ";";
            $Categories = mysqli_query($link,$query);

            while ($Category_row = mysqli_fetch_assoc($Categories)) {
                $table_name = $Category_row['table_name'];
                $category_name = $Category_row['categories_name'];
                //get sub categories
                $query = "SELECT distinct sub_groups
                          FROM parts_compatible pc, parts p, categories c, " . $table_name . "  t
                          WHERE pc.part_number = p.part_number
                          AND p.categories_id = c.categories_id
                          AND c.categories_id = t.categories_id
                          AND model_by_year_id = " . $get_model_by_id['model_by_year_id'] . " ; " ;
                $sub_groups = mysqli_query($link,$query); ?>
        
        <div style="width: 100%; float: left; margin: 2%;" class="Category_Groups" >
                    <a onclick="toggle('<?php echo $category_name ?>')" ><?php echo $category_name ?></a>
                    <ul id="<?php echo $category_name ?>"  style="display: none;" >

        <?php   while ($sub_group_row = mysqli_fetch_assoc($sub_groups)) {
                $sub_group = $sub_group_row['sub_groups']; ?>

                        <li style="list-style-type: none;"><a href="parts_display_page.php?sub_group=<?php echo $sub_group ?>&table_name=<?php echo $table_name ?>&filter_item=show_all" style=" text-decoration:none; " > <?php echo $sub_group ?> </a></li>

         <?php } ?> </ul> 
        </div>  <?php } ?>
        
    </div>
