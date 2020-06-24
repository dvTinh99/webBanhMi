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

			<form method="POST" action="model/Update_Model.php">
				<table>
					<tr>

						<th>name</th>
						<th>description</th>

						<!-- <th>image</th> -->

						<th>update</th>
					</tr>
					<?php
					if (isset($_POST["update_type"])) {
						$id= $_POST["id_type"];
						$type = getTypeID($id);

					}

					?>
					<tr>

						<td><input type="text" name="name_type" value= "<?php echo$type->name ?> "</td>
						<td><textarea rows = "5" cols = "60" type="text" name="des_type"><?php echo$type->description ?></textarea></td>
						<!-- <td><?php echo$value->image ?></td> -->
   <!--  <form method="GET" action="model/Delete_Model.php">
      <td>
        <input type="hidden" name="id_type" value=<?php echo $id ?> >
        <input name ="delete_type" type="submit" class="btn btn-danger" value="Xóa">
      </td>
  </form> -->

  <td>
  	<input type="hidden" name="id_type" value=<?php echo$type->id ?> >
  <!-- 	<input type="hidden" name="des_type" value=<?php echo$type->description ?> > -->
  	<input type="submit" name="update_type" class="btn btn-primary" value="Sửa">
  </td>



</tr>

</table>
</form>

</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
</body>
</html>