<?php 

include('customer.php');

?>

<html>



<body>
	<select id="select">
<?php


	while($row2 = mysql_fetch_array($result)){

	?>

	<option><?php echo $row2['custid'];?>	</option>
<?php }
?>
	</select>

	<p id = "customername"></p>

<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
		$("#select").change(function(){
			var id = $("#select").val(); 
			$.ajax({

				url : 'getcustomer.php',
				type : 'get',
				data : {
					'name' : id 
						},
				success : function(data){
					$("#customername").html(data);
				}
			});
		});
	});
</script>
</body>
</html>