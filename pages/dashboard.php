<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htttdn";


$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


$sql = "SELECT pb.maPhong, pb.tenPhong, COUNT(nv.maNhanVien) AS so_luong_nhan_vien 
        FROM phongban pb 
        LEFT JOIN nhanvien nv ON pb.maPhong = nv.maPhong 
        GROUP BY pb.maPhong, pb.tenPhong";
$result = $conn->query($sql);


// Tạo một mảng chứa dữ liệu cho biểu đồ
$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = array((string)$row['tenPhong'], (int)$row['so_luong_nhan_vien']);
}

$data_formatted = array();
foreach ($data as $row) {
  $data_formatted[] = array($row[0], $row[1]);
}


?>

<?php


// Truy vấn dữ liệu từ bảng phieunhap
$sql = "SELECT p.maNhaCungCap, SUM(p.tongSoLuong) AS totalQuantity
        FROM phieunhap p
        GROUP BY p.maNhaCungCap";
$result = $conn->query($sql);

// Tạo mảng lưu trữ dữ liệu
$data = array();

// Lặp qua kết quả truy vấn
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Lấy tổng số lượng nhập của từng nhà cung cấp
    $data[$row['maNhaCungCap']] = $row['totalQuantity'];
  }
}

// Tính tổng số lượng tổng cộng
$totalQuantity = array_sum($data);

// Tạo mảng dữ liệu cho biểu đồ
$chartData = array();

// Tính phần trăm của từng nhà cung cấp
foreach ($data as $maNCC => $quantity) {
  $percentage = ($quantity / $totalQuantity) * 100;
  // Lấy tên nhà cung cấp từ bảng nhacungcap
  $sql = "SELECT tenNCC FROM nhacungcap WHERE maNCC = '$maNCC'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $tenNCC = $row['tenNCC'];
  // Thêm dữ liệu vào mảng cho biểu đồ
  $chartData[] = array('label' => $tenNCC, 'y' => $percentage);
}

?>



<?php
// Nếu có yêu cầu AJAX fetch_data, thực hiện truy vấn và trả về dữ liệu JSON
if (isset($_GET['fetch_data'])) {
  // Kết nối đến cơ sở dữ liệu (thay thế thông tin kết nối của bạn)
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

  // Truy vấn dữ liệu từ bảng phieuxuat và bảng phieunhap
  $sql = "SELECT 'PhieuXuat' AS loai, ngayXuat AS ngay, tongTien, tongSoLuong FROM phieuxuat
            UNION ALL
            SELECT 'PhieuNhap' AS loai, ngayNhap AS ngay, tongTien, tongSoLuong FROM phieunhap
            ORDER BY ngay";
  $result = $conn->query($sql);

  // Tạo mảng lưu trữ dữ liệu
  $data = array();

  // Lặp qua kết quả truy vấn và lấy dữ liệu vào mảng
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
  }

  // Trả về dữ liệu dưới dạng JSON và gọi hàm drawChartWithData() để vẽ biểu đồ
  echo '<script>var jsonData = ' . json_encode($data) . '; drawChartWithData();</script>';
}
?>

<?php
// Truy vấn dữ liệu từ bảng sanpham
$sql = "SELECT s.maNhanHieu, COUNT(s.maNhanHieu) AS quantity
        FROM sanpham s
        GROUP BY s.maNhanHieu";
$result = $conn->query($sql);

// Tạo mảng lưu trữ dữ liệu
$data = array();

// Lặp qua kết quả truy vấn
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Lấy số lượng maNhanHieu của mỗi sản phẩm
    $data[$row['maNhanHieu']] = $row['quantity'];
  }
}

// Tính tổng số lượng tổng cộng
$totalQuantity = array_sum($data);

// Tạo mảng dữ liệu cho biểu đồ
$chartData2 = array();

// Sử dụng số lượng thay vì phần trăm
foreach ($data as $maNhanHieu => $quantity) {
  // Lấy tên nhãn hiệu từ bảng nhanhieu
  $sql = "SELECT tenNhanHieu FROM nhanhieu WHERE maNhanHieu = '$maNhanHieu'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $tenNhanHieu = $row['tenNhanHieu'];
  // Thêm dữ liệu vào mảng cho biểu đồ
  $chartData2[] = array('label' => $tenNhanHieu, 'y' => $quantity);
}

// Chuyển dữ liệu sang JSON để sử dụng trong mã JavaScript
$chartDataJSON = json_encode($chartData2);
?>







<head>
  <title>Biểu đồ cột nhân viên từng phòng ban</title>
  <!-- Đường link tới thư viện Google Charts -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript">
    // Load thư viện Google Charts
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawCharts);

    // Hàm vẽ tất cả các biểu đồ
    function drawCharts() {
      drawColumnChart();
      drawPieChartNCC();
      drawPieChartSanPham();
    }

    // Hàm vẽ biểu đồ cột
    function drawColumnChart() {
      // Tạo một DataTable và thêm cột
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Phòng ban');
      data.addColumn('number', 'Số lượng nhân viên');

      // Thêm dữ liệu vào DataTable
      var bdCot = <?php echo json_encode($data_formatted); ?>;
      data.addRows(bdCot);

      // Cài đặt các tùy chọn cho biểu đồ
      var options = {
        title: 'Số lượng nhân viên từng phòng ban',
        legend: 'none',
        hAxis: {
          title: 'Phòng ban'
        },
        vAxis: {
          title: 'Số lượng nhân viên'
        }
      };

      // Tạo một biểu đồ cột và vẽ nó trong thẻ div có id 'chart_div'
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

    // Hàm vẽ biểu đồ tròn cho nhà cung cấp
    function drawPieChartNCC() {
      var chart = new CanvasJS.Chart("NCCchart", {
        animationEnabled: true,
        title: {
          text: "Tỷ lệ phần trăm sản phẩm của từng nhà cung cấp",
          fontFamily: "Arial, sans-serif",
        },
        data: [{
          type: "pie",
          startAngle: 240,
          yValueFormatString: "##0.00\"%\"",
          indexLabel: "{label} {y}",
          dataPoints: <?php echo json_encode($chartData, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }

    // Hàm vẽ biểu đồ tròn cho sản phẩm
    function drawPieChartSanPham() {
      var chart = new CanvasJS.Chart("sanPhamChart", {
        animationEnabled: true,
        title: {
          text: "Số lượng sản phẩm của từng nhãn hiệu",
          fontFamily: "Arial, sans-serif",
        },
        data: [{
          type: "pie",
          startAngle: 240,
          yValueFormatString: "##0",
          indexLabel: "{label} {y}",
          dataPoints: <?php echo $chartDataJSON; ?>
        }]
      });
      chart.render();
    }
  </script>



  </body>
</head>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->


<main role="main" class="main-content">
  
  <div class="container-fluid">
    <div id="chart_div" style="width: 100%; margin-bottom: 20px; height:500px"></div>
    <div class="row">
      <!-- Phần cho biểu đồ sản phẩm -->
      <div class="col-md-6">
        <div id="sanPhamChart" style="width: 100%;"></div>
      </div>
      <!-- Phần cho biểu đồ nhà cung cấp -->
      <div class="col-md-6">
        <div id="NCCchart" style="width: 100%;"></div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="bieudophieunhap" style="margin-top: 38%;"> 
      <div class="container-fluid">
        <h2>Biểu đồ phiếu nhập</h2>
        <div style="width:100%;">
          <canvas id="myChart1"></canvas>
        </div>
      </div>
    </div>
    <div class="bieudophieuxuat" style="margin-top: 20px;">
      <div class="container-fluid">
        <h2>Biểu đồ phiếu xuất</h2>
        <div style="width:100%;">
          <canvas id="myChartPhieuXuat"></canvas>
        </div>
      </div>
    </div>
  </div>
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

  // Truy vấn dữ liệu từ bảng phieunhap
  $sql = "SELECT ngayNhap AS ngay, tongTien, tongSoLuong FROM phieunhap ORDER BY ngay";

  $result = $conn->query($sql);

  // Tạo mảng lưu trữ dữ liệu
  $data = array();

  // Lặp qua kết quả truy vấn và lấy dữ liệu vào mảng
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
  }

  // Trả về dữ liệu dưới dạng JSON
  $jsonData = json_encode($data);

  $conn->close();
  ?>

  <script>
    const data1 = <?php echo $jsonData; ?>;

    function drawChart(data, canvasId) {
      const labels = data.map(item => item.ngay);
      const tongTien = data.map(item => item.tongTien);
      const tongSoLuong = data.map(item => item.tongSoLuong);

      const ctx = document.getElementById(canvasId).getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
              type: 'line',
              label: 'Tổng tiền',
              data: tongTien,
              borderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              yAxisID: 'y-axis-1'
            },
            {
              type: 'bar',
              label: 'Tổng số lượng',
              data: tongSoLuong,
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              yAxisID: 'y-axis-2'
            }
          ]
        },
        options: {
          scales: {
            yAxes: [{
                id: 'y-axis-1',
                type: 'linear',
                position: 'left',
                ticks: {
                  beginAtZero: true
                }
              },
              {
                id: 'y-axis-2',
                type: 'linear',
                position: 'right',
                ticks: {
                  beginAtZero: true
                }
              }
            ]
          }
        }
      });
    }

    drawChart(data1, 'myChart1');
  </script>
  </div>
  <br>


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

  // Truy vấn dữ liệu từ bảng phieunhap
  $sqlPhieuXuat = "SELECT ngayXuat AS ngay, tongTien, tongSoLuong FROM phieuxuat ORDER BY ngay";

  $resultPhieuXuat = $conn->query($sql);

  // Tạo mảng lưu trữ dữ liệu cho biểu đồ phiếu xuất
  $dataPhieuXuat = array();

  // Lặp qua kết quả truy vấn và lấy dữ liệu vào mảng
  if ($resultPhieuXuat->num_rows > 0) {
    while ($row = $resultPhieuXuat->fetch_assoc()) {
      $dataPhieuXuat[] = $row;
    }
  }

  // Trả về dữ liệu dưới dạng JSON cho biểu đồ phiếu xuất
  $jsonDataPhieuXuat = json_encode($dataPhieuXuat);
  ?>

  <script>
    const dataPhieuXuat = <?php echo $jsonDataPhieuXuat; ?>;

    function drawChartPhieuXuat(data) {
      const labels = data.map(item => item.ngay);
      const tongTien = data.map(item => item.tongTien);
      const tongSoLuong = data.map(item => item.tongSoLuong);

      const ctx = document.getElementById('myChartPhieuXuat').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
              type: 'line',
              label: 'Tổng tiền',
              data: tongTien,
              borderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              yAxisID: 'y-axis-1'
            },
            {
              type: 'bar',
              label: 'Tổng số lượng',
              data: tongSoLuong,
              backgroundColor: 'rgba(54, 162, 235, 0.5)',
              yAxisID: 'y-axis-2'
            }
          ]
        },
        options: {
          scales: {
            yAxes: [{
                id: 'y-axis-1',
                type: 'linear',
                position: 'left',
                ticks: {
                  beginAtZero: true
                }
              },
              {
                id: 'y-axis-2',
                type: 'linear',
                position: 'right',
                ticks: {
                  beginAtZero: true
                }
              }
            ]
          }
        }
      });
    }

    // Gọi hàm vẽ biểu đồ cho phiếu xuất khi trang được tải
    drawChartPhieuXuat(dataPhieuXuat);
  </script>
  </div>














  


  </div> <!-- .container-fluid -->

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var toggleViewLink = document.getElementById('toggleViewLinkNhap');
      var phieuXuatTable = document.getElementById('phieuNhapTable');
      var rows = phieuXuatTable.rows;
      var rowCount = rows.length;
      var isViewAll = false;

      // Ẩn các hàng sau hàng thứ 5 ban đầu
      for (var i = 6; i < rowCount; i++) {
        rows[i].style.display = 'none';
      }

      // Bắt sự kiện khi nhấp vào liên kết "View all" hoặc "View less"
      toggleViewLink.addEventListener('click', function(e) {
        e.preventDefault();
        isViewAll = !isViewAll; // Đảo ngược trạng thái hiện tại

        if (isViewAll) {
          // Hiển thị tất cả các hàng
          for (var i = 6; i < rowCount; i++) {
            rows[i].style.display = '';
          }
          toggleViewLink.textContent = 'View less';
        } else {
          // Ẩn các hàng sau hàng thứ 5
          for (var i = 6; i < rowCount; i++) {
            rows[i].style.display = 'none';
          }
          toggleViewLink.textContent = 'View all';
        }
      });

      // Bắt sự kiện khi người dùng nhập từ khóa tìm kiếm
      document.getElementById('searchInputNhap').addEventListener('input', function(e) {
        var keyword = e.target.value.toLowerCase();
        // Duyệt qua tất cả các hàng và ẩn hoặc hiển thị dựa trên từ khóa tìm kiếm
        for (var i = 0; i < rowCount; i++) {
          var row = rows[i];
          if (row.cells[0]) {
            var found = false;
            for (var j = 0; j < row.cells.length; j++) {
              var cellValue = row.cells[j].textContent.toLowerCase();
              if (cellValue.indexOf(keyword) > -1) {
                found = true;
                break;
              }
            }
            if (found) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          }
        }

      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var toggleViewLink = document.getElementById('toggleViewLinkXuat');
      var phieuXuatTable = document.getElementById('phieuXuatTable');
      var rows = phieuXuatTable.rows;
      var rowCount = rows.length;
      var isViewAll = false;

      // Ẩn các hàng sau hàng thứ 5 ban đầu
      for (var i = 6; i < rowCount; i++) {
        rows[i].style.display = 'none';
      }

      // Bắt sự kiện khi nhấp vào liên kết "View all" hoặc "View less"
      toggleViewLink.addEventListener('click', function(e) {
        e.preventDefault();
        isViewAll = !isViewAll; // Đảo ngược trạng thái hiện tại

        if (isViewAll) {
          // Hiển thị tất cả các hàng
          for (var i = 6; i < rowCount; i++) {
            rows[i].style.display = '';
          }
          toggleViewLink.textContent = 'View less';
        } else {
          // Ẩn các hàng sau hàng thứ 5
          for (var i = 6; i < rowCount; i++) {
            rows[i].style.display = 'none';
          }
          toggleViewLink.textContent = 'View all';
        }
      });
      // Bắt sự kiện khi người dùng nhập từ khóa tìm kiếm
      document.getElementById('searchInputXuat').addEventListener('input', function(e) {
        var keyword = e.target.value.toLowerCase();
        // Duyệt qua tất cả các hàng và ẩn hoặc hiển thị dựa trên từ khóa tìm kiếm
        for (var i = 0; i < rowCount; i++) {
          var row = rows[i];
          if (row.cells[0]) {
            var found = false;
            for (var j = 0; j < row.cells.length; j++) {
              var cellValue = row.cells[j].textContent.toLowerCase();
              if (cellValue.indexOf(keyword) > -1) {
                found = true;
                break;
              }
            }
            if (found) {
              row.style.display = '';
            } else {
              row.style.display = 'none';
            }
          }
        }
      });
    });
  </script>


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
</main> <!-- main -->


<script src="js/apexcharts.custom.js"></script>
<script src="js/apexcharts.min.js"></script>
<script src="js/apps.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/config.js"></script>
<script src="js/d3.min.js"></script>
<script src="js/datamaps-zoomto.js"></script>
<script src="js/datamaps.all.min.js"></script>
<script src="js/datamaps.custom.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/dropzone.min.js"></script>
<script src="js/fullcalendar.custom.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/gauge.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.steps.min.js"></script>
<script src="js/jquery.stickOnScroll.js"></script>
<script src="js/jquery.timepicker.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/quill.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/topojson.min.js"></script>
<script src="js/uppy.min.js"></script>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src='js/daterangepicker.js'></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src="js/tinycolor-min.js"></script>
<script src="js/config.js"></script>
<script src="js/d3.min.js"></script>
<script src="js/topojson.min.js"></script>
<script src="js/datamaps.all.min.js"></script>
<script src="js/datamaps-zoomto.js"></script>
<script src="js/datamaps.custom.js"></script>
<script src="js/Chart.min.js"></script>
<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="js/gauge.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/apexcharts.min.js"></script>
<script src="js/apexcharts.custom.js"></script>
<script src='js/jquery.mask.min.js'></script>
<script src='js/select2.min.js'></script>
<script src='js/jquery.steps.min.js'></script>
<script src='js/jquery.validate.min.js'></script>
<script src='js/jquery.timepicker.js'></script>
<script src='js/dropzone.min.js'></script>
<script src='js/uppy.min.js'></script>
<script src='js/quill.min.js'></script>
<script>
  $('#dataTable-1').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [16, 32, 64, -1],
      [16, 32, 64, "All"]
    ]
  });
</script>
<script src="../js/apps.js"></script>
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
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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

