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
						<td><p>Tên bánh</p></td>
						<td><input name ="name" type="text" placeholder="Tên Bánh"></td>
					</tr>
					<tr>
						<td><p>Kiểu Bánh</p>

						</td>
						<td><select name="id_type" id="cars">
							<option value="1">Bánh mặn</option>
							<option value="2">bánh ngọt</option>
							<option value="3">bánh trái cây</option>
							<option value="4">bánh kem</option>
							<option value="5">bánh crepe</option>
							<option value="6">bánh pizza</option>
							<option value="7">bánh su kem</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><p>Mô Tả</p></td>
					<td>
					
							
							<textarea rows = "5" cols = "60" name = "description" type="text" placeholder="Mô Tả"></textarea>
					
						<!-- <input name ="description" type="text" placeholder="Mô Tả"> -->
					</td>
				</tr>
				<tr>
					<td><p>Giá Tiền</p></td>
					<td><input name ="price" type="text" placeholder="giá tiền"></td>
				</tr>
				<tr>
					<td><p>Giảm giá</p></td>
					<td><input name ="promo" type="text" placeholder="Giảm giá"></td>
				</tr>
				<tr>
					<td><p>Hình ảnh</p></td>
					<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
				</tr>
				<tr>
					<td><p>Loại</p></td>
					<td>
						<select name="unit" id="cars">
							<option value="hộp">Hộp</option>
							<option value="cái">Cái</option>
						</select>
					</td>
				</tr>

			</table>
			<button type="submit" class="btn btn-success" name="submit">Insert</button>
</form>

		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
</body>
</html>