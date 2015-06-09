
<div style="width: 74.55%; float: left; border: black solid thin; margin: 0px; padding-bottom: 0px;">
    <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
        <h4 style="margin: 0px;">Filter Items:</h4>
        <!-- Category Groups content-->
       <?php
            // get model_by_year_id
            $query = "SELECT model_by_year_id
                      FROM model_by_year
                      WHERE year_id = " . $_SESSION['year'] . "
                      AND model_id = " . $_SESSION['model'] . ";";
            $get_model_by_id_result = mysqli_query($link,$query);
            $model_by_year_id = mysqli_fetch_assoc($get_model_by_id_result);
            // get filters
            $query = "SELECT DISTINCT filters
                       FROM parts p, parts_compatible pc, " . $_SESSION['table_name'] . " t
                       WHERE pc.part_number = p.part_number
                       AND p.categories_id = t.categories_id
                       AND p.part_id = t.part_id
                       AND pc.model_by_year_id = " . $model_by_year_id['model_by_year_id'] . ";";
            $filter_items = mysqli_query($link,$query);
            ?>
        
        <div style="width: fit-content; float: left; margin: 2px; padding: 2px; border-left: black solid thin; " >
            <a href="parts_display_page.php?filter_item=show_all" > Show All </a>
        </div> 

        <?php
            while ($filter_items_row = mysqli_fetch_assoc($filter_items)) {
                $filter_item = $filter_items_row['filters'];
                ?>
        <div style="width: fit-content; float: left; margin: 2px; padding: 2px; border-left: black solid thin; " >
            <a href="parts_display_page.php?filter_item=<?php echo $filter_item ?>" > <?php echo $filter_item ?> </a>
        </div>  <?php } ?>
    </div>
</div>   

