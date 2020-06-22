<?php
	include "admin_include/header.php";
	include "model/Type_Model.php";
?>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
<!-- 			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div> -->
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				

				<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>id_type</th>
    <th>description</th>
    
    <th>image</th>
    
    <th>deldete</th>
    <th>update</th>
  </tr>
  <?php
  	$arr = getAllType();
  	foreach ($arr as $value) {
  		# code...
  	
  ?>
  <tr>
    <td><?php echo $value->id ?></td>
    <td><?php echo$value->name ?></td>
    <td><?php echo$value->description ?></td>
    <td><?php echo$value->image ?></td>
    <td><input type="submit" class="btn btn-danger" value="Danger"></td>
    <td><input type="submit" class="btn btn-primary" value="Primary"></td>
    
  </tr>
  <?php
}
  ?>
  
</table>


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
</body>
</html>