
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
      function update_part_info(a,b,c,d,e){
          var part_value1 = document.getElementById(a).value;
          var part_value2 = document.getElementById(b).value;
          var part_value3 = document.getElementById(c).value;
          var part_value4 = document.getElementById(d).value;
          var part_value5 = document.getElementById(e).value;
          if(part_value1 === '' || part_value2 === '' || part_value3 === '' || part_value4 === '' || part_value5 === '' || ){
              alert('please enter required value for this option');
          }else{
              window.location.href = 'parts/update_parts_info.php?add_part=update&part_selected=<?php echo $part_selected ; ?>&table_name=<?php echo $table_name ; ?>&part_name='+part_value1+'&list_price='+part_value2+'&in_stock='+part_value3+'&in_stock_min='+part_value4+'&in_stock_max='+part_value5;
          }
      }
</script>

<div style="width: 75%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px;">
        

    <div style="width: 100%; float: left; border: black solid thin; margin: 0px; padding-bottom: 0px;">


        <!--create parts header div -->          
        <!-- Part_num  part name    list price  qty   cost -->
        <div  style="width: 100%; border-bottom: black thin solid; height: 40px; background: #f0f0f0;">
            <div  style=" width: 24%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
                <h3 style="margin: 1%;">Part Name</h3>
            </div>
            <div  style="width: 17%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
                <h3 style="margin: 1%;">List Price</h3>
            </div>
            <div  style="width: 17%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
                <h3 style="margin: 1%;">In Stock</h3>
            </div>
            <div  style="width: 17%; float: left; border-right: black thin solid; height: 100%; background: #f0f0f0;">
                <h3 style="margin: 1%;">Stock Min</h3>
            </div>
            <div  style="width: 17%; float: left; height: 100%; background: #f0f0f0;">
                <h3 style="margin: 1%;">Stock Max</h3>
            </div>
        </div>

            

            <!--Display each part information -->          
        <!-- Part_num  part name    list price  qty   cost -->
        <div  style="width: 100%; margin: 0px; background-color: #ffffff; height: 110px; ">
            <form action="parts/update_parts_info.php?menu=parts&sub_menu=add_part&add_part=add_part&part_selected=<?php echo $part_selected ; ?>&table_name=<?php echo $table_name ; ?>" method="post" >
            
                 <div style=" width: 24%; height: 100%; float: left;  background-color: #ffffff;text-align: center;" >
                     <input type="text" id="update_part_name"  style="width: 90%; height: 25px; margin: 10px;" required />
                     
                </div>
           
            
                 <div style=" width: 17%; height: 100%; float: left;  background-color: #ffffff;  text-align: center;  " >
                     <input type="text" id="update_list_price"  style="width: 90%; height: 25px; margin: 10px;" required />
                    
                </div>
            
            
                 <div style=" width: 17%; height: 30px; float: left;  background-color: #ffffff;   text-align: center; " >
                    <input type="text" id="update_in_stock"  style="width: 90%; height: 25px; margin: 10px;" required />
                    <input type="submit" name="update_in_stock"  value="Add New Part"  onclick="update_part_info('update_part_name','update_list_price','update_in_stock','update_stock_min','update_stock_max')"  style="width: 90%; height: 25px; margin: 10px ;">
                </div>
           
            <div style=" width: 17%; height: 30px; float: left;  background-color: #ffffff;  text-align: left;  " >
                <input type="text" id="update_stock_min"  style="width: 90%; height: 25px; margin: 10px;" required />
                
            </div>
            
                <div style=" width: 17%; height: 30px; float: left; background-color: #ffffff;  text-align: center; " >
                    <input type="text" id="update_stock_max"   style="width: 90%; height: 25px; margin: 10px;" required />
                    
                </div>
            </form>
         </div>
    </div>
</div>

                      




