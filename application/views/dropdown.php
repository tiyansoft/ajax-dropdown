
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;  
      charset=utf-8" />  
      <title>cascade drops example</title>

      <script type="text/javascript" src="<?php echo base_url('assets') ?>/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('assets') ?>/jquery-ui.min.js"></script>


       <script type="text/javascript">  
          $(document).ready(function() {  
             $("#categorydropdown").change(function(){  
             /*dropdown post *///  
             

             var category_id = $(this).val();
             $.ajax({
             	url: "<?php echo base_url(); ?>dropdown/buildSubCategory",
             	type: "POST",
             	data: {"category_id": category_id},
             	dataType: "json",
             	success: function(data){
             		$("#subcatdropdown").html(data);
             	},

             	error: function(){
             		alert('Error');
             	}
             });
             //alert(category_id);

             /*$.ajax({  
                url:"<?php echo base_url();?>index.php/dropdown/buildSubCategory",  
                    data: {id:$(this).val()},  
                    type: "POST",  
                    success:function(data){  
                    $("#subcatdropdown").html(data);  
                 }  
              }); **/  
           });  
        });  
     </script> 
</head>
<body>

	<!--category dropdown-->  
      <?php echo form_dropdown('categorydropdown',  
      $categories,'','class="required" id="categorydropdown"'); ?>  
      <br />  
      <br />  
      <!--city dropdown-->  
      <select name="subcatdropdown" id="subcatdropdown">  
         <option value="">Select</option>  
      </select>  
      <br />  

</body>
</html>