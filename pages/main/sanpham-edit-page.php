<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');
$maSanPham = '';
if (isset($_GET['masanpham'])) {
	$maSanPham = $_GET['masanpham'];
}
$product = getProductById($maSanPham);
?>
<main role="main" class="main-content">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<form class="col-12" id="edit-product-form" enctype="multipart/form-data" action="/HTTT-DN/pages/main/sanpham-edit.php" method="post" onsubmit="return checkForm(event)">
				<div id="back-to-prev-page">
					<a href="index.php?page=sanpham">
						<div class="icon">
							<i class="fa-solid fa-arrow-left"></i>
						</div>
						<div class="title">Quay lại</div>
					</a>
					<input name="edit-product-submit" id="submit-form-btn" type="submit" value="Lưu">					
				</div>
				<h2 class="page-title">Chỉnh sửa sản phẩm</h2>
				<div class="card shadow mb-4">
					<div class="card-header">
						<strong class="card-title">Thông tin sản phẩm</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="maSanPham">Mã sản phẩm</label>
									<input type="text" id="maSanPham" class="form-control" readonly name="maSanPham" value="<?php echo $product->getMaSanPham(); ?>" style="cursor:default">
								</div>
								<div class="form-group mb-3">
									<label for="tenSanPham">Tên sản phẩm</label>
									<input type="text" id="tenSanPham" class="form-control" name="tenSanPham" value="<?php echo $product->getTenSanPham(); ?>">
								</div>
								<div class="form-group mb-3">
									<label for="giaCu">Giá cũ</label>
									<input type="text" id="giaCu" class="form-control" name="giaCu" value="<?php echo $product->getGiaCu(); ?>">
								</div>
								<div class="form-group mb-3">
									<label for="giaMoi">Giá mới</label>
									<input type="text" id="giaMoi" class="form-control" name="giaMoi" value="<?php echo $product->getGiaMoi(); ?>">
								</div>
								<div class="form-group mb-3">
									<label for="maNhanHieu">Nhãn hiệu</label>
									<select class="form-control" id="maNhanHieu" name="maNhanHieu">
										<?php
										$nhanHieuList = getNhanHieuList();
										for ($i = 0; $i < count($nhanHieuList); $i++) {
											$nhanHieu = $nhanHieuList[$i];
											if ($product->getMaNhanHieu() == $nhanHieu->getMaNhanHieu())
												echo '<option value="' . $nhanHieu->getMaNhanHieu() . '" selected>' . $nhanHieu->getTenNhanHieu() . '</option>';
											else
												echo '<option value="' . $nhanHieu->getMaNhanHieu() . '">' . $nhanHieu->getTenNhanHieu() . '</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group mb-3">
									<div class="card shadow">
										<div class="card-body">
											<p class="mb-2"><strong>Phân loại</strong></p>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="sanPhamMoi" name="sanPhamMoi" value="1" <?php
																																				if ($product->getSanPhamMoi() == "1")
																																					echo "checked";
																																				?>>
												<label class="custom-control-label" for="sanPhamMoi">Sản phẩm mới</label>
											</div>
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="sanPhamHot" name="sanPhamHot" value="1" <?php
																																				if ($product->getSanPhamHot() == "1")
																																					echo "checked";
																																				?>>
												<label class="custom-control-label" for="sanPhamHot">Sản phẩm hot</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div id="product-img-container">
									<div class="title">Ảnh sản phẩm</div>
									<div class="image-container">
										<img src="<?php echo $product->getHinhAnh(); ?>" id="pimage">
									</div>
									<div class="change-image-container">
										<input type="file" name="image" id="imageInput" style="display: none;" onchange="previewImage();">
										<input type="button" value="ĐỔI ẢNH" onclick="document.getElementById('imageInput').click();" class="change-btn">
									</div>
								</div>
							</div>
							<div class="col-md-12 mb-4">
								<div class="card shadow">
									<div class="card-body">
										<h5 class="card-title">Mô tả sản phẩm</h5>
										<!-- Create the editor container -->
										<!-- <div id="editor" style="min-height:120px;">
											<?php
											//echo $product->getMoTa();
											?>
										</div> -->
										<textarea name="moTa" id="moTa" cols="113" rows="10"><?php echo $product->getMoTa(); ?></textarea>
									</div>
								</div>
							</div> <!-- end section -->
						</div>
						<!-- <input type="submit" name="product-change-submit" value="1" style="display: none;" id="submit-btn"> -->
					</div>
				</div> <!-- / .card -->
			</form> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
</main> <!-- main -->

<script src='js/quill.min.js'></script>

<script>
	var editor = document.getElementById('editor');
	if (editor) {
		var toolbarOptions = [
			[{
				'font': []
			}],
			[{
				'header': [1, 2, 3, 4, 5, 6, false]
			}],
			['bold', 'italic', 'underline', 'strike'],
			['blockquote', 'code-block'],
			[{
					'header': 1
				},
				{
					'header': 2
				}
			],
			[{
					'list': 'ordered'
				},
				{
					'list': 'bullet'
				}
			],
			[{
					'script': 'sub'
				},
				{
					'script': 'super'
				}
			],
			[{
					'indent': '-1'
				},
				{
					'indent': '+1'
				}
			], // outdent/indent
			[{
				'direction': 'rtl'
			}], // text direction
			[{
					'color': []
				},
				{
					'background': []
				}
			], // dropdown with defaults from theme
			[{
				'align': []
			}],
			['clean'] // remove formatting button
		];
		var quill = new Quill(editor, {
			modules: {
				toolbar: toolbarOptions
			},
			theme: 'snow'
		});
	}
</script>

<script>
	function previewImage() {
		var imageInput = document.getElementById('imageInput');
		var previewImg = document.getElementById('pimage');
		var file = imageInput.files[0]; // Lấy tệp tin đã chọn

		// Kiểm tra xem người dùng đã chọn tệp tin hay chưa
		if (file) {
			var reader = new FileReader();

			// Đọc dữ liệu hình ảnh từ tệp tin
			reader.onload = function(e) {
				previewImg.src = e.target.result; // Hiển thị hình ảnh
			}

			reader.readAsDataURL(file); // Đọc dữ liệu dưới dạng URL dữ liệu
		} else {
			previewImg.src = 'assets/images/no-image.png'; // Reset hình ảnh nếu không có tệp tin được chọn
		}
	}

	document.getElementById("edit-product-form").addEventListener("submit", function(event) {
		// Ngăn chặn hành vi mặc định của form
		event.preventDefault();

		// Lấy giá trị của form
		var formData = new FormData(this);

		// Tạo một đối tượng XMLHttpRequest
		var xhr = new XMLHttpRequest();

		// Xác định hành động và phương thức của form
		var action = this.getAttribute("action");
		var method = this.getAttribute("method");

		// Xử lý phản hồi từ server (nếu cần)
		xhr.onreadystatechange = function() {
			if (xhr.readyState === XMLHttpRequest.DONE) {
				// Code xử lý phản hồi từ server
				if(this.responseText == "unchange") {
					alertMessage('info', 'Bạn chưa thay đổi thông tin sản phẩm nào');
				} else if (this.responseText == "success") {
					alertMessage('success', 'Thay đổi thông tin sản phẩm thành công');
				} else 
					alertMessage('fail', 'Thay đổi thông tin sản phẩm thất bại');
			}
		};

		// Mở kết nối tới trang xử lý form với phương thức POST
		xhr.open(method, action, true);

		// Gửi yêu cầu với dữ liệu form
		xhr.send(formData);
	});

	function checkForm(e) {
		var numberRegEx = /^[0-9]+$/;
		var tenSanPham = document.getElementById("tenSanPham");
		var giaCu = document.getElementById("giaCu");
		var giaMoi = document.getElementById("giaMoi");

		if (tenSanPham.value == "" || tenSanPham.value == undefined || tenSanPham.value == NaN) {
			alert("Bạn chưa nhập tên sản phẩm!");
			tenSanPham.focus();
			e.preventDefault();
			return false;
		} else if (giaCu.value == "" || giaCu.value == undefined || giaCu.value == NaN) {
			alert("Bạn chưa nhập giá tiền cũ!");
			giaCu.focus();
			e.preventDefault();
			return false;
		} else if (!numberRegEx.test(giaCu.value) && giaCu.value != "") {
			alert("Giá tiền không hợp lệ!");
			giaCu.focus();
			e.preventDefault();
			return false;
		} else if (giaMoi.value == "" || giaMoi.value == undefined || giaMoi.value == NaN) {
			alert("Bạn chưa nhập giá tiền mới!");
			giaMoi.focus();
			e.preventDefault();
			return false;
		} else if (!numberRegEx.test(giaMoi.value) && giaMoi.value != "") {
			alert("Giá tiền không hợp lệ!");
			giaMoi.focus();
			e.preventDefault();
			return false;
		}
	}
</script>

<?php
function getImageName($url)
{
	$name = explode("/", $url);
	$name = "/" . $name[count($name) - 2] . "/" . $name[count($name) - 1];
	return $name;
}
?>