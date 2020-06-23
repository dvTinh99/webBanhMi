<?php
include "admin_include/header.php";
include "model/Product_Model.php";
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
            <th>unit_ptice</th>
            <th>promotion_price</th>
            <th>image</th>
            <th>unit</th>
            <th>new</th>
            <th>deldete</th>
            <th>update</th>
          </tr>
          <?php
          $arr = adminGetAllProducts();
          foreach ($arr as $value) {
  		# code...

            ?>
            <tr>
              <td><?php echo $value->id ?></td>
              <td><?php echo$value->name ?></td>
              <td><?php echo$value->id_type ?></td>
              <td><?php echo$value->decription ?></td>
              <td><?php echo$value->unit_price ?></td>
              <td><?php echo$value->promotion_price ?></td>
              <td><?php echo$value->image ?></td>
              <td><?php echo$value->unit ?></td>
              <td><?php echo$value->new_no ?></td>
              <form action="model/Delete_Model.php">
                <td>
                  <input type="hidden" name="action" value="delete" >
                  <input type="hidden" name="id" value=<?php echo $value->id ?> >
                  <button type="submit" class="btn btn-danger" >Xóa</button>
                </td>
              </form>
              <form action="admin_update.php">
              <td>
                <input type="hidden" name="action" value="update" >
                <input type="hidden" name="id" value=<?php echo $value->id ?> >
                <button type="submit" class="btn btn-primary" >Sửa</button>
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