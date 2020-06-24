<?php
include "admin_include/header.php";
?>

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Thêm Sản phẩm</h6>
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
				<form action="model/Insert_Model.php" method="POST" enctype="multipart/form-data">

					<table>
						<tr>
							<th>Thông tin yêu cầu</th>
							<th>Thông tin cung cấp</th>
						</tr>

						<tr>
							<td><p>Tên kiểu bánh</p></td>
							<td><input name ="name_type" type="text" placeholder="Tên kiểu Bánh"></td>
						</tr>
						<tr>
							<td><p>Mô Tả</p></td>
							<td><textarea rows = "5" cols = "60" name = "description_type" type="text" placeholder="Mô Tả"></textarea></td>
						</tr>

					</table>
					<button type="submit" class="btn btn-success" name="insert_type">Insert</button>
				</form>

			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
</body>
</html>