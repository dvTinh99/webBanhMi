<?php
	include "admin_include/header.php";
	include "model/Type_Model.php";
?>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Loại Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="admin_insert_type.php"><button type="button" class="btn btn-warning">Thêm</button></a>
				</div>
			</div>
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
    <th>description</th>
    
    <!-- <th>image</th> -->
    
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
    <!-- <td><?php echo$value->image ?></td> -->
    <form method="GET" action="model/Delete_Model.php">
      <td>
        <input type="hidden" name="id_type" value=<?php echo $value->id ?> >
        <input name ="delete_type" type="submit" class="btn btn-danger" value="Xóa">
      </td>
    </form>
    <form method="POST" action="admin_type_update.php">
      <td>
        <input type="hidden" name="id_type" value=<?php echo $value->id ?> >
        <input type="submit" name="update_type" class="btn btn-primary" value="Sửa">
      </td>
    </form>
    
    
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