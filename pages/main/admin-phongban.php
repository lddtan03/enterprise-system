<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<?php


// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['taiKhoan'])) {
	$loggedInUser = $_SESSION['taiKhoan'];
}

?>







<main role="main" class="main-content">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="card-body">
					<p class="mb-2"><strong>Chỉnh sửa phòng ban</strong></p>

					<form method="POST" action="admin-phongban.php" id="editForm">
						<div class="form-group mb-3">
							<label for="custom-placeholder">Mã phòng</label>
							<input class="form-control" type="text" name="maPhong" value="" required readonly>
						</div>
						<div class="form-group mb-3">
							<label for="custom-zip">Tên phòng</label>
							<input class="form-control" type="text" name="tenPhong">
						</div>
						<div class="form-group mb-3">
							<label for="custom-money">Mã trưởng phòng</label>
							<input class="form-control" type="text" name="maTruongPhong" readonly>
						</div>
						<div class="form-group mb-3">
							<label for="custom-phone">Số lượng nhân viên</label>
							<input class="form-control" type="text" name="soLuongNhanVien" readonly>
						</div>
						<script>
							// Hàm để chuyển đổi định dạng ngày
							function convertDateFormat(inputFormat) {
								function pad(s) {
									return (s < 10) ? '0' + s : s;
								}
								var d = new Date(inputFormat);
								return [d.getFullYear(), pad(d.getMonth() + 1), pad(d.getDate())].join('-');
							}

							// Bắt sự kiện khi người dùng thay đổi giá trị ngày
							document.getElementById('date-input1').addEventListener('change', function() {
								var inputValue = this.value; // Lấy giá trị ngày từ input
								var formattedDate = convertDateFormat(inputValue); // Chuyển đổi định dạng ngày
								this.value = formattedDate; // Gán lại giá trị ngày đã được định dạng lại
							});
						</script>
						<!-- Giữ nguyên các trường không muốn cập nhật -->
						<div class="form-group mb-3">
							<p class="mb-2"><strong>Ngày nhận chức</strong></p>
							<div class="form-row">
								<div class="form-group col-md-8">
									<div class="input-group">
									<input type="text" class="form-control " id="" name="ngayNhanChuc" aria-describedby="button-addon2" readonly>
										<!-- <div class="input-group-append">
											<div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
						<!-- Thêm một script để xử lý sự kiện khi người dùng chọn ngày -->


						<div class="modal-footer">
							<!-- Xóa thuộc tính data-dismiss="modal" khỏi nút Lưu -->
							<button type="submit" class="btn mb-2 btn-success">Lưu</button>
							<button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Quay lại</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
// Xử lý yêu cầu chỉnh sửa phòng ban
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tenPhong']) && isset($_POST['ngayNhanChuc'])) {
    // Lấy dữ liệu từ biểu mẫu
    $maPhong = $_POST['maPhong'];
    $tenPhong = $_POST['tenPhong'];
    $ngayNhanChuc = $_POST['ngayNhanChuc'];

    // Kiểm tra tính hợp lệ của dữ liệu nếu cần

    // Thực hiện truy vấn cập nhật vào cơ sở dữ liệu
    $sql_update = "UPDATE phongban SET tenPhong = '$tenPhong', ngayNhanChuc = '$ngayNhanChuc' WHERE maPhong = '$maPhong'";
    if ($conn->query($sql_update) === TRUE) {
        // Xuất thông báo cập nhật thành công
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Cập nhật phòng ban thành công!'
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: 'Lỗi: " . $conn->error . "'
            });
        </script>";
    }
}
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Xử lý sự kiện khi người dùng nhấn nút "Cập nhật" trong modal
    const editForm = document.getElementById("editForm");
    editForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const maPhong = editForm.querySelector("input[name='maPhong']").value;
        const tenPhong = editForm.querySelector("input[name='tenPhong']").value;
        const ngayNhanChuc = editForm.querySelector("input[name='ngayNhanChuc']").value;

        updatePhongBan(maPhong, tenPhong, ngayNhanChuc);
    });
});

function updatePhongBan(maPhong, tenPhong, ngayNhanChuc) {
    const formData = new FormData();
    formData.append('maPhong', maPhong);
    formData.append('tenPhong', tenPhong);
    formData.append('ngayNhanChuc', ngayNhanChuc);

    fetch('pages/main/admin-phongban.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Có lỗi xảy ra khi gửi yêu cầu.');
        }
        return response.text();
    })
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: 'Cập nhật phòng ban thành công!'
        }).then(function() {
            $('#editModal').modal('hide');
            window.location.reload();
        });
    })
    .catch(error => {
        console.error('Lỗi:', error);
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Lỗi: ' + error.message
        });
    });
}
</script>

	<script>
		$(document).ready(function() {
			$('.drgpicker').datepicker({
				format: 'dd/mm/yyyy',
				autoclose: true,
				todayHighlight: true
			}).on('changeDate', function(e) {
				var selectedDate = moment(e.date).format('YYYY-MM-DD');
				$(this).val(selectedDate);
			});
		});
	</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="row" style="justify-content: space-between;">
					<h2 class="mb-2 page-title">Danh sách phòng ban</h2>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#admin-themphong"></span>Thêm phòng</button>
				</div>
				<div class="row my-4">
					<!-- Small table -->
					<div class="col-md-12">
						<div class="card shadow">
							<div class="card-body">
								<!-- table -->
								<table class="table datatables" id="dataTable-1">
									<thead>
										<tr>
											<th>STT</th>
											<th>Mã phòng</th>
											<th>Tên</th>
											<th>Mã TP</th>
											<th>Tên TP</th>
											<th>Số lượng NV</th>
											<!-- <th>Lương TB </th> -->
											<th>Ngày nhận chức</th>
											<th>Hành động</th>
										</tr>
									</thead>
									<tbody>
										<?php
										// Thực hiện truy vấn để lấy dữ liệu từ bảng phongban
										$sql = "SELECT
          p.maPhong,
          p.tenPhong,
          p.maTruongPhong,
          p.ngayNhanChuc,
          (SELECT COUNT(*) FROM nhanvien WHERE maPhong = p.maPhong) AS soLuongNV,
          (SELECT nv.hoTen FROM nhanvien nv WHERE nv.maChucVu = (SELECT maChucVu FROM chucvu WHERE maChucVu = 'TP') AND nv.maPhong = p.maPhong LIMIT 1) AS tenTruongPhong
      FROM
          phongban p";
										$result = $conn->query($sql);

										// Xử lý yêu cầu xóa phòng ban
										if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['maPhong'])) {
											$maPhong = $_GET['maPhong'];
											// Kiểm tra xem biến $maPhong có giá trị hợp lệ không
											if (!empty($maPhong)) {
												// Truy vấn DELETE để xóa phòng ban từ CSDL
												$sql_delete = "DELETE FROM phongban WHERE maPhong = '$maPhong'";
												// Thực hiện truy vấn DELETE nếu $sql_delete không rỗng

												if (!empty($sql_delete)) {
													if ($conn->query($sql_delete) === TRUE) {
														// Xuất thông báo xóa thành công và cập nhật dữ liệu trên trang
														// Xuất thông báo xóa thành công và cập nhật dữ liệu trên trang
														echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: 'Xóa phòng ban thành công!'
    }).then(function() {
        updateData();
    });
</script>";
													} else {
														echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Lỗi: " . $conn->error . "'
    });
</script>";
													}
												} else {
													echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Lỗi: Truy vấn DELETE không hợp lệ!'
    });
</script>";
												}
											} else {
												echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Lỗi: Mã phòng không hợp lệ!'
    });
</script>";
											}
										}

										$stt = 1;
										// Kiểm tra xem có dữ liệu được trả về không
										if ($result->num_rows > 0) {
											// Duyệt qua từng dòng dữ liệu và đổ vào bảng HTML
											while ($row = $result->fetch_assoc()) {
												echo "<tr>";
												echo "<td>" . $stt . "</td>";
												echo "<td>" . $row["maPhong"] . "</td>"; // Tương tự với các cột khác
												echo "<td>" . $row["tenPhong"] . "</td>";
												echo "<td>" . $row["maTruongPhong"] . "</td>"; // Hiển thị cột maTruongPhong
												echo "<td>" . $row["tenTruongPhong"] . "</td>";
												echo "<td>" . $row["soLuongNV"] . "</td>";
												echo "<td>" . date("d-m-Y", strtotime($row["ngayNhanChuc"])) . "</td>"; // Định dạng ngày tháng
												echo "<td>";
												echo "<div style='display: flex; align-items: center; justify-content: start; gap: 10px;'>";
												echo "<button type='button' class='btn mb-2 btn-warning'>Sửa</button>";
												// Nút "Xóa" sử dụng JavaScript để xác nhận trước khi xóa
												echo "<button type='button' class='btn mb-2 btn-danger xoaPhongBan' data-ma-phong='" . $row["maPhong"] . "' data-ten-phong='" . $row["tenPhong"] . "' data-so-luong-nhan-vien='" . $row["soLuongNV"] . "'>Xóa</button>";
												echo "</div>";
												echo "</td>";
												echo "</tr>";
												$stt++;
											}
										} else {
											echo "Không có dữ liệu";
										}
										?>

										<script>
											document.addEventListener("DOMContentLoaded", function() {
    // Xử lý sự kiện khi người dùng nhấn nút "Xóa"
    const buttons = document.querySelectorAll(".xoaPhongBan");
    buttons.forEach(button => {
        button.addEventListener("click", function() {
            const maPhong = this.getAttribute("data-ma-phong");
            const tenPhong = this.getAttribute("data-ten-phong");
            const soLuongNhanVien = this.getAttribute("data-so-luong-nhan-vien");

            Swal.fire({
                title: 'Xác nhận xóa',
                text: "Bạn có chắc chắn muốn xóa phòng ban " + tenPhong + " không?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (soLuongNhanVien > 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: "Phòng ban " + tenPhong + " đang có " + soLuongNhanVien + " nhân viên và không thể xóa."
                        });
                    } else {
                        deletePhongBan(maPhong);
                    }
                }
            });
        });
    });
});

function deletePhongBan(maPhong) {
    fetch('index.php?page=admin-phongban&maPhong=' + maPhong, {
        method: 'GET'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Có lỗi xảy ra khi gửi yêu cầu.');
        }
        return response.text();
    })
    .then(data => {
        Swal.fire({
            icon: 'success',
            title: 'Thành công',
            text: 'Xóa phòng ban thành công!'
        }).then(function() {
            updateData();
        });
    })
    .catch(error => {
        console.error('Lỗi:', error);
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Lỗi: Xóa phòng ban không thành công!'
        });
    });
}

function updateData() {
    window.location.reload();
}
										</script>









									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- simple table -->
				</div> <!-- end section -->
			</div> <!-- .col-12 -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->
	<div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="list-group list-group-flush my-n3">
						<div class="list-group-item bg-transparent">
							<div class="row align-items-center">
								<div class="col-auto">
									<span class="fe fe-box fe-24"></span>
								</div>
								<div class="col">
									<small><strong>Package has uploaded successfull</strong></small>
									<div class="my-0 text-muted small">Package is zipped and uploaded</div>
									<small class="badge badge-pill badge-light text-muted">1m ago</small>
								</div>
							</div>
						</div>
						<div class="list-group-item bg-transparent">
							<div class="row align-items-center">
								<div class="col-auto">
									<span class="fe fe-download fe-24"></span>
								</div>
								<div class="col">
									<small><strong>Widgets are updated successfull</strong></small>
									<div class="my-0 text-muted small">Just create new layout Index, form, table</div>
									<small class="badge badge-pill badge-light text-muted">2m ago</small>
								</div>
							</div>
						</div>
						<div class="list-group-item bg-transparent">
							<div class="row align-items-center">
								<div class="col-auto">
									<span class="fe fe-inbox fe-24"></span>
								</div>
								<div class="col">
									<small><strong>Notifications have been sent</strong></small>
									<div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
									<small class="badge badge-pill badge-light text-muted">30m ago</small>
								</div>
							</div> <!-- / .row -->
						</div>
						<div class="list-group-item bg-transparent">
							<div class="row align-items-center">
								<div class="col-auto">
									<span class="fe fe-link fe-24"></span>
								</div>
								<div class="col">
									<small><strong>Link was attached to menu</strong></small>
									<div class="my-0 text-muted small">New layout has been attached to the menu</div>
									<small class="badge badge-pill badge-light text-muted">1h ago</small>
								</div>
							</div>
						</div> <!-- / .row -->
					</div> <!-- / .list-group -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-5">
					<div class="row align-items-center">
						<div class="col-6 text-center">
							<div class="squircle bg-success justify-content-center">
								<i class="fe fe-cpu fe-32 align-self-center text-white"></i>
							</div>
							<p>Control area</p>
						</div>
						<div class="col-6 text-center">
							<div class="squircle bg-primary justify-content-center">
								<i class="fe fe-activity fe-32 align-self-center text-white"></i>
							</div>
							<p>Activity</p>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-6 text-center">
							<div class="squircle bg-primary justify-content-center">
								<i class="fe fe-droplet fe-32 align-self-center text-white"></i>
							</div>
							<p>Droplet</p>
						</div>
						<div class="col-6 text-center">
							<div class="squircle bg-primary justify-content-center">
								<i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
							</div>
							<p>Upload</p>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-6 text-center">
							<div class="squircle bg-primary justify-content-center">
								<i class="fe fe-users fe-32 align-self-center text-white"></i>
							</div>
							<p>Users</p>
						</div>
						<div class="col-6 text-center">
							<div class="squircle bg-primary justify-content-center">
								<i class="fe fe-settings fe-32 align-self-center text-white"></i>
							</div>
							<p>Settings</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- new event modal -->
	<div class="modal fade" id="admin-themphong" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="varyModalLabel">Thêm phòng ban</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body p-8">
					<div class="card shadow mb-8">
						<div class="card-body">
							<form class="needs-validation" action="index.php?page=admin-phongban" method="post" novalidate>
								<div class="form-row">
									<div class="col-md-6 mb-3">
										<label for="validationCustom01">Mã phòng</label>
										<input type="text" class="form-control" id="validationCustom01" name="maPhong" value="" required>
										<div class="valid-feedback">Looks good!</div>
									</div>
									<div class="col-md-6 mb-3">
										<label for="validationCustom02">Tên phòng</label>
										<input type="text" class="form-control" id="validationCustom02" name="tenPhong" value="" required>
										<div class="valid-feedback">Looks good!</div>
									</div>
								</div> <!-- /.form-row -->

								<div style="display: flex; justify-content: end;">
									<button class="btn btn-primary" name="submit" type="submit" value="">Thêm</button>
								</div>
							</form>

						</div> <!-- /.card-body -->
					</div> <!-- /.card -->
				</div>
			</div>
		</div> <!-- new event modal -->
	</div>

<!-- Nhúng SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Xử lý dữ liệu từ biểu mẫu khi có yêu cầu POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Kiểm tra xem các trường đã được điền đầy đủ hay không
    if (isset($_POST['maPhong']) && isset($_POST['tenPhong'])) {
        // Lấy dữ liệu từ biểu mẫu
        $maPhong = $_POST['maPhong'];
        $tenPhong = $_POST['tenPhong'];

        // Kiểm tra xem mã phòng đã tồn tại trong CSDL chưa
        $sql_check = "SELECT * FROM phongban WHERE maPhong = '$maPhong'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "<script>
                async function showAlert() {
                    await Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: 'Mã phòng đã tồn tại trong CSDL!',
                        timer: 5000
                    });
                }
                showAlert();
            </script>";
        } else {
            // Nếu mã phòng chưa tồn tại, thêm dữ liệu vào CSDL
            $sql_insert = "INSERT INTO phongban (maPhong, tenPhong) VALUES ('$maPhong', '$tenPhong')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "<script>
                    async function showAlert() {
                        await Swal.fire({
                            icon: 'success',
                            title: 'Thành công',
                            text: 'Thêm phòng ban thành công!',
                            timer: 2000
                        });
                        // Chuyển hướng trang sau khi thông báo đã hiển thị đủ thời gian
                        setTimeout(function() {
                            window.location.replace('index.php?page=admin-phongban');
                        }, 500);
                    }
                    showAlert();
                </script>";
            } else {
                echo "Lỗi: " . $sql_insert . "<br>" . $conn->error;
            }
        }
    } else {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
    }
}
?>



</main> <!-- main -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src='js/jquery.dataTables.min.js'></script>
<script src='js/dataTables.bootstrap4.min.js'></script>
<script>
	$('#dataTable-1').DataTable({
		autoWidth: true,
		"lengthMenu": [
			[16, 32, 64, -1],
			[16, 32, 64, "All"]
		]
	});
</script>
<script src="js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'UA-56159088-1');
</script>

</script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src='js/jquery.mask.min.js'></script>
<script src='js/select2.min.js'></script>
<script src='js/jquery.steps.min.js'></script>
<script src='js/jquery.validate.min.js'></script>
<script src='js/jquery.timepicker.js'></script>
<script src='js/dropzone.min.js'></script>
<script src='js/uppy.min.js'></script>
<script src='js/quill.min.js'></script>
<script>
	$('.select2').select2({
		theme: 'bootstrap4',
	});
	$('.select2-multi').select2({
		multiple: true,
		theme: 'bootstrap4',
	});
	$('.drgpicker').daterangepicker({
		singleDatePicker: true,
		timePicker: false,
		showDropdowns: true,
		locale: {
			format: 'MM/DD/YYYY'
		}
	});
	$('.time-input').timepicker({
		'scrollDefault': 'now',
		'zindex': '9999' /* fix modal open */
	});
	/** date range picker */
	if ($('.datetimes').length) {
		$('.datetimes').daterangepicker({
			timePicker: true,
			startDate: moment().startOf('hour'),
			endDate: moment().startOf('hour').add(32, 'hour'),
			locale: {
				format: 'M/DD hh:mm A'
			}
		});
	}
	var start = moment().subtract(29, 'days');
	var end = moment();

	function cb(start, end) {
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	}
	$('#reportrange').daterangepicker({
		startDate: start,
		endDate: end,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
				'month')]
		}
	}, cb);
	cb(start, end);
	$('.input-placeholder').mask("00/00/0000", {
		placeholder: "__/__/____"
	});
	$('.input-zip').mask('00000-000', {
		placeholder: "____-___"
	});
	$('.input-money').mask("#.##0,00", {
		reverse: true
	});
	$('.input-phoneus').mask('(000) 000-0000');
	$('.input-mixed').mask('AAA 000-S0S');
	$('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
		translation: {
			'Z': {
				pattern: /[0-9]/,
				optional: true
			}
		},
		placeholder: "___.___.___.___"
	});
	// editor
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
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>
<script>
	var uptarg = document.getElementById('drag-drop-area');
	if (uptarg) {
		var uppy = Uppy.Core().use(Uppy.Dashboard, {
			inline: true,
			target: uptarg,
			proudlyDisplayPoweredByUppy: false,
			theme: 'dark',
			width: 770,
			height: 210,
			plugins: ['Webcam']
		}).use(Uppy.Tus, {
			endpoint: 'https://master.tus.io/files/'
		});
		uppy.on('complete', (result) => {
			console.log('Upload complete! We’ve uploaded these files:', result.successful)
		});
	}

	flatpickr("#date-input1", {
    dateFormat: "Y-m-d"
});
</script>
<script src="js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'UA-56159088-1');
</script>



<style>
	.card.shadow.mb-4 {
		display: none;
	}
</style>

<script>
	// Lắng nghe sự kiện khi nút "Sửa" được nhấn
	$('.btn-warning').click(function() {
		// Hiển thị modal và làm mờ trang hiện tại
		$('#editModal').modal('show');
	});

	$('.btn-danger').click(function() {
		// Đóng modal
		$('#editModal').modal('hide');
	});

	// Lắng nghe sự kiện khi nút "Sửa" được nhấn
	$('.btn-warning').click(function() {
		// Lấy giá trị mã phòng từ hàng hiện tại
		var maPhong = $(this).closest('tr').find('td:nth-child(2)').text();
		// Lấy giá trị tên phòng từ hàng hiện tại
		var tenPhong = $(this).closest('tr').find('td:nth-child(3)').text();
		// Lấy giá trị tên trưởng phòng từ hàng hiện tại
		var maTruongPhong = $(this).closest('tr').find('td:nth-child(4)').text();
		// Lấy giá trị số lượng nhân viên từ hàng hiện tại
		var soLuongNhanVien = $(this).closest('tr').find('td:nth-child(6)').text();
		// Lấy giá trị ngày nhận chức từ hàng hiện tại
		// var ngayNhanChuc = $(this).closest('tr').find('td:nth-child(7)').text();

		// Điền giá trị mã phòng vào trường input
		$('#editModal input[name="maPhong"]').val(maPhong);
		// Điền giá trị tên phòng vào trường input
		$('#editModal input[name="tenPhong"]').val(tenPhong);
		// Điền giá trị tên trưởng phòng vào trường input
		$('#editModal input[name="maTruongPhong"]').val(maTruongPhong);
		// Điền giá trị số lượng nhân viên vào trường input
		$('#editModal input[name="soLuongNhanVien"]').val(soLuongNhanVien);
		// Điền giá trị ngày nhận chức vào trường input
		// $('#editModal input[name="ngayNhanChuc"]').val(ngayNhanChuc);

		// Hiển thị modal và làm mờ trang hiện tại
		$('#editModal').modal('show');
	});

	// Lắng nghe sự kiện khi nút "Sửa" được nhấn
	$('.btn-warning').click(function() {
    // Lấy giá trị ngày nhận chức từ hàng hiện tại
    var ngayNhanChuc = $(this).closest('tr').find('td:nth-child(7)').text();
    // console.log("Ngày nhận chức:", ngayNhanChuc);

    // Chuyển đổi định dạng ngày từ dd-mm-yyyy sang yyyy-mm-dd
    var parts = ngayNhanChuc.split('-');
    var ngayNhanChucFormatted = parts[2] + '-' + parts[1] + '-' + parts[0];

    // Điền giá trị ngày nhận chức vào trường input
    $('#editModal input[name="ngayNhanChuc"]').val(ngayNhanChucFormatted);

    // Hiển thị modal và làm mờ trang hiện tại
    $('#editModal').modal('show');
});




</script>

<!-- <script>
	const form = document.getElementById('editForm');
	const tenPhongInput = document.getElementById('tenPhong');
	const ngayNhanChucInput = document.getElementById('date-input1');
	const maPhongInput = document.getElementById('maPhong'); // Lấy từ nguồn khác

	form.addEventListener('submit', (event) => {
		event.preventDefault();

		const data = {
			tenPhong: tenPhongInput.value,
			ngayNhanChuc: ngayNhanChucInput.value,
			maPhong: maPhongInput.value,
		};

		// Gửi dữ liệu đến server bằng AJAX
		fetch('admin-phongban.php', {
				method: 'POST',
				body: JSON.stringify(data),
			})
			.then((response) => {
				if (response.ok) {
					// Hiển thị thông báo cập nhật thành công
					alert('Cập nhật phòng ban thành công!');
				} else {
					// Hiển thị thông báo lỗi
					alert('Lỗi cập nhật phòng ban!');
				}
			});
	});


	// Gán giá trị cho các biến sau khi trang đã được tải xong
	window.addEventListener('DOMContentLoaded', () => {
		form = document.getElementById('editForm');
		tenPhongInput = document.getElementById('tenPhong');
		ngayNhanChucInput = document.getElementById('date-input1');
		maPhongInput = document.getElementById('maPhong'); // Lấy từ nguồn khác

		// Thêm sự kiện submit cho form
		form.addEventListener('submit', (event) => {
			event.preventDefault();

			const data = {
				tenPhong: tenPhongInput.value,
				ngayNhanChuc: ngayNhanChucInput.value,
				maPhong: maPhongInput.value,
			};

			// Gửi dữ liệu đến server bằng AJAX
			fetch('admin-phongban.php', {
					method: 'POST',
					body: JSON.stringify(data),
				})
				.then((response) => {
					if (response.ok) {
						// Hiển thị thông báo cập nhật thành công
						alert('Cập nhật phòng ban thành công!');
					} else {
						// Hiển thị thông báo lỗi
						alert('Lỗi cập nhật phòng ban!');
					}
				});
		});
	});
</script> -->


<!-- <script>
	// Bắt sự kiện khi trang tải xong
	document.addEventListener("DOMContentLoaded", function() {
		// Lấy tất cả các nút "Xóa"
		var deleteButtons = document.querySelectorAll(".xoaPhongBan");

		// Lặp qua từng nút và thêm sự kiện click
		deleteButtons.forEach(function(button) {
			button.addEventListener("click", function() {
				// Lấy mã phòng từ thuộc tính data-maphong
				var maPhong = this.getAttribute("data-maphong");

				// Gửi yêu cầu xóa dữ liệu đến máy chủ bằng AJAX
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function() {
					if (xhr.readyState === XMLHttpRequest.DONE) {
						if (xhr.status === 200) {
							// Xóa hàng khỏi bảng nếu xóa thành công
							var row = button.closest("tr");
							row.parentNode.removeChild(row);
							alert("Xóa phòng ban thành công!");
						} else {
							// alert("Đã có lỗi xảy ra khi xóa phòng ban!");
						}
					}
				};

				// Mở kết nối và gửi yêu cầu
				xhr.open("DELETE", "admin-phongban.php?maPhong=" + maPhong, true);
				xhr.send();
			});
		});
	});
</script> -->

<!-- <script>
    // Sử dụng JavaScript để bắt sự kiện khi form được submit
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("addPhongBan");

        form.addEventListener("submit", function (event) {
            // Ngăn chặn hành vi mặc định của form (tải lại trang)
            event.preventDefault();

            // Lấy dữ liệu từ form
            var maPhong = document.getElementById("validationCustom01").value;
            var tenPhong = document.getElementById("validationCustom02").value;

            // Tạo một đối tượng XMLHttpRequest để gửi dữ liệu form đến server
            var xhr = new XMLHttpRequest();

            // Mở một kết nối đến file PHP xử lý việc thêm phòng
            xhr.open("POST", "index.php?page=admin-phongban", true);

            // Thiết lập tiêu đề của yêu cầu HTTP
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // Xử lý sự kiện khi trạng thái của yêu cầu thay đổi
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Hiển thị thông báo từ phản hồi của server
                    alert(xhr.responseText);
                }
            };

            // Gửi dữ liệu form đến server
            xhr.send("maPhong=" + maPhong + "&tenPhong=" + tenPhong);
        });
    });
</script> -->