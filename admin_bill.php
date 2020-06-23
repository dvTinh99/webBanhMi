<?php
include "admin_include/header.php";
require_once('Bean/User.php');
include "model/User_Model.php";
?>
<div class="inner-header">
  <div class="container">
   <div class="pull-left">
    <h6 class="inner-title">Hóa Đơn</h6>
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
            <th>STT</th>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>ngày đặt</th>
            <th>đơn giá</th>
            <th>NOTE</th>
    <!-- <th>id sản phẩm</th>
      <th>số lượng sản phẩm</th> -->
    </tr>
    <?php
    $arr = getBill();
    $count = 1;
    foreach ($arr as $value) {
      ?>
      <tr>
        <td><?php echo $count ?></td>
        <td><?php echo$value["id"] ?></td>
        <td><?php echo$value["full_name"] ?></td>
        <td><?php echo$value["date_order"] ?></td>
        <td><?php echo$value["total"] ?></td>
        <td><?php echo$value["note"] ?></td>
    <!-- <td><?php echo$value["id_product"] ?></td>
      <td><?php echo$value["quantity"] ?></td> -->
      <form action="model/Delete_Model.php" method="GET">
        <td>
          <input type="hidden" name="id" value=<?php echo$value["id"] ?>>
          <input type="submit" name="deleteBill" class="btn btn-danger" value="delete">
        </td>
      </form>
      <!--  <td><input type="submit" class="btn btn-primary" value="Primary"></td> -->

    </tr>
    <?php
    $count ++ ;
  }
  ?>
  
</table>


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
</body>
</html>