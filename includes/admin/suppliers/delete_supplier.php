
<script>
function delete_supplier(id){
          var val = document.getElementById(id).value;
          if(part_value == ''){
              alert('please enter required value for this option');
          }else{
              window.location.href = 'suppliers/update_info.php?menu=suppliers&supplier_id='+val+'&sub_menu=delete_supplier';
          }
      }


</script>


<?php
if(isset($_GET['update_message'])){
    $message = $_GET['update_message'];
    ?><script type="text/javascript">alert('<?php echo $message; ?>');</script><?php
}
?>

<!-- Delete Supplier -->
    <div style="width: 40%; float: left; border: black solid thin; margin: 2%; padding-bottom: 0px;">
        <div style="width: 100%; margin: 0px; background-color: #f0f0f0; ">
            <h4 style="margin: 0px;">Enter Supplier Id Number </h4></label>
        </div>
        <form   style="padding: 10px;" action="suppliers/update_info.php?menu=suppliers&sub_menu=delete_supplier&update=delete_supplier" method="post">
            <input type="text"  name="supplier_id" id="supplier_id" style=" margin-left: 10px; margin-bottom: 0px; width: 250px; height: 25px;" required>
            <input type="submit" name="delete" value="Delete" onclick="delete_supplier('supplier_id')" style="width: 60; height: 25; margin-left: 10px; margin-bottom: 0px; color: #FFFFFF; background-color: #1E6091;"/>
        </form>
    </div>   