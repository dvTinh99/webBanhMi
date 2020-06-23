<?php
	include "admin_include/header.php";
	include "model/User_Model.php";

  $arrUser = getAllUser();
?>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">User</h6>
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
    <th>email</th>
    <th>PassWord</th>
    <th>Phone</th>
    <th>Address</th>
  </tr>
  <?php
  	foreach ($arrUser as $value) {
  		# code...
  	
  ?>
  <tr>
    <td><?php echo $value->id ?></td>
    <td><?php echo$value->fullName ?></td>
    <td><?php echo$value->email ?></td>
    <td><?php echo$value->pass ?></td>
    <td><?php echo$value->phone ?></td>
    <td><?php echo$value->address ?></td>
    <form method="GET" action="model/Delete_Model.php">
      <td>
        <input type="submit" class="btn btn-danger" value="Xóa">
        <input type="hidden" name="user" value= "delete">
        <input type="hidden" name="id" value=<?php echo $value->id ?>>
      </td>
    </form>
    
   <!--  <td><input type="submit" class="btn btn-primary" value="Xửa"></td> -->
    
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