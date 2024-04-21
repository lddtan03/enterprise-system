<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Phân quyền</title>
</head>
<body>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row" style="justify-content: space-between;">
                        <h2 class="mb-2 page-title">Phân quyền tài khoản</h2>
                        <button type="button" class="btn mb-2 btn-primary btn-save">Lưu</button>
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
                                                <th>Mã</th>
                                                <th>Tên</th>
                                                <th style="width: 150px;">Nhân viên</th>
                                                <th style="width: 150px;">Quản lý nhân sự</th>
                                                <th style="width: 150px;">Quản lý kho</th>
                                                <th style="width: 150px;">Quản lý kinh doanh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Truy vấn để lấy dữ liệu từ bảng nhân viên và quyền từ bảng tài khoản
                                            $sql = "SELECT 
                                                    nv.maNhanVien, 
                                                    nv.hoTen, 
                                                    GROUP_CONCAT(DISTINCT tk.maNhomQuyen SEPARATOR ', ') AS maNhomQuyen
                                                    FROM 
                                                    nhanvien AS nv
                                                    LEFT JOIN 
                                                    taikhoan AS tk ON nv.maNhanVien = tk.taiKhoan
                                                    GROUP BY 
                                                    nv.maNhanVien, nv.hoTen;
                                                    ";
                                            $result = $conn->query($sql);

                                            // Kiểm tra kết quả trả về
                                            if ($result->num_rows > 0) {
                                                // Xuất dữ liệu trên mỗi hàng
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["maNhanVien"] . "</td>";
                                                    echo "<td>" . $row["hoTen"] . "</td>";
                                                    // Thêm radio button cho từng loại phân quyền
                                                    echo "<td>
                                                        <div class=''>
                                                            <input type='radio' class='radio-quyen' name='" . $row["maNhanVien"] . "-qlk' value='nhanvien'";
                                                    if ($row["maNhomQuyen"] == "nhanvien") {
                                                        echo " checked";
                                                    }
                                                    echo ">
                                                        </div>
                                                    </td>";
                                                    // Tương tự cho các radio button khác
                                                    echo "<td>
                                                        <div class=''>
                                                            <input type='radio' class='radio-quyen' name='" . $row["maNhanVien"] . "-qlk' value='quanlynhansu'";
                                                    if ($row["maNhomQuyen"] == "quanlynhansu") {
                                                        echo " checked";
                                                    }
                                                    echo ">
                                                        </div>
                                                    </td>";
                                                    // Tương tự cho các radio button khác
                                                    echo "<td>
                                                        <div class=''>
                                                            <input type='radio' class='radio-quyen' name='" . $row["maNhanVien"] . "-qlk' value='quanlykho'";
                                                    if ($row["maNhomQuyen"] == "quanlykho") {
                                                        echo " checked";
                                                    }
                                                    echo ">
                                                        </div>
                                                    </td>";
                                                    // Tương tự cho các radio button khác
                                                    echo "<td>
                                                        <div class=''>
                                                            <input type='radio' class='radio-quyen' name='" . $row["maNhanVien"] . "-qlk' value='quanlykinhdoanh'";
                                                    if ($row["maNhomQuyen"] == "quanlykinhdoanh") {
                                                        echo " checked";
                                                    }
                                                    echo ">
                                                        </div>
                                                    </td>";
                                                }
                                            } else {
                                                echo "Không có dữ liệu";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const btnSave = document.querySelector(".btn-save");
    btnSave.addEventListener("click", function() {
        const radioButtons = document.querySelectorAll(".radio-quyen");
        const formData = new FormData();

        radioButtons.forEach(function(radioButton) {
            if (radioButton.checked) {
                formData.append(radioButton.name, radioButton.value);
            }
        });

        fetch('pages/main/admin-phanquyen.php', {
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
            alert("Thay đổi quyền thành công!"); // Hiển thị thông báo từ server
            window.location.reload(); // Tải lại trang sau khi cập nhật thành công (nếu cần)
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Lỗi: ' + error.message);
        });
    });
});

    </script>

<?php
// Kết nối đến cơ sở dữ liệu


// Kiểm tra xem yêu cầu là phương thức POST và tồn tại dữ liệu
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // Lặp qua dữ liệu POST để cập nhật phân quyền
    foreach ($_POST as $key => $value) {
        // Tách mã nhân viên từ tên trường
        $maNhanVien = strtok($key, '-');

        // Cập nhật phân quyền trong bảng taikhoan
        $sql = "UPDATE taikhoan SET maNhomQuyen = '$value' WHERE taiKhoan = '$maNhanVien'";
        if ($conn->query($sql) !== TRUE) {
            // Nếu có lỗi, in thông báo lỗi
            echo "Lỗi khi cập nhật phân quyền: " . $conn->error;
            exit(); // Thoát khỏi script để ngăn chặn việc tiếp tục xử lý
        }
    }

    // Thông báo thành công nếu không có lỗi
    echo "Cập nhật phân quyền thành công!";
} else {
    // Nếu không có dữ liệu POST hoặc không phải là phương thức POST, in thông báo lỗi
    echo "Không có dữ liệu được gửi đi hoặc yêu cầu không hợp lệ!";
}
?>

</body>
</html>
