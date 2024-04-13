<?php
$con = new mysqli('localhost', 'root', '11111111', 'htttdn');

$selectedTime = null;

$data = array(
  'tenPhong' => [],
  'soLuongNhanVien' => [],
);

if (isset($_GET['month'])) {
  $selectedTime = $_GET['month'];
  $selectedYear = substr($selectedTime, 0, 4);
  $selectedMonth = substr($selectedTime, 5, 2);

  // ?` dem so nhan vien moi phong ban
  $query1 = $con->query("
    SELECT 
      pb.tenPhong,
      COUNT(DISTINCT c.maNhanVien) AS soLuongNhanVien
    FROM 
      chamcong c
      JOIN nhanvien n ON c.maNhanVien = n.maNhanVien
      JOIN phongban pb ON n.maPhong = pb.maPhong
    WHERE 
      c.thangChamCong = $selectedMonth AND c.namChamCong = $selectedYear
    GROUP BY 
      pb.tenPhong;
  ");

  // xuat thong tin cac nhan vien lam viec trong thang
  $query2 = $con->query("
  SELECT 
    nv.maNhanVien, 
    nv.hoTen, 
    pb.tenPhong AS phongBan,
    cc.soNgayLamViec,
    cc.soNgayNghiKhongPhep,
    cc.thucLanh
  FROM nhanvien nv
  JOIN phongban pb ON nv.maPhong = pb.maPhong
  JOIN chamcong cc ON nv.maNhanVien = cc.maNhanVien
  WHERE cc.thangChamCong = $selectedMonth AND cc.namChamCong = $selectedYear
  ORDER BY nv.maNhanVien;
  ");

  foreach ($query1 as $row) {
    $data['tenPhong'][] = $row['tenPhong'];
    $data['soLuongNhanVien'][] = $row['soLuongNhanVien'];
  }

  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    echo json_encode($data);
    // echo json_encode($data2);
    exit;
  }

} else {
  $query1 = $con->query("
    SELECT 
      pb.tenPhong,
      COUNT(DISTINCT c.maNhanVien) AS soLuongNhanVien
    FROM 
      chamcong c
      JOIN nhanvien n ON c.maNhanVien = n.maNhanVien
      JOIN phongban pb ON n.maPhong = pb.maPhong
    WHERE 
      c.thangChamCong = 1 AND c.namChamCong = 2024
    GROUP BY 
      pb.tenPhong;
  ");

  $query2 = $con->query("
  SELECT 
    nv.maNhanVien, 
    nv.hoTen, 
    pb.tenPhong AS phongBan,
    cc.soNgayLamViec,
    cc.soNgayNghiKhongPhep,
    cc.thucLanh
  FROM nhanvien nv
  JOIN phongban pb ON nv.maPhong = pb.maPhong
  JOIN chamcong cc ON nv.maNhanVien = cc.maNhanVien
  WHERE cc.thangChamCong = 4 AND cc.namChamCong = 2024
  ORDER BY nv.maNhanVien;
  ");

  foreach ($query1 as $row) {
    $data['tenPhong'][] = $row['tenPhong'];
    $data['soLuongNhanVien'][] = $row['soLuongNhanVien'];
  }
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
  .chart-container {
    width: 300px;
    height: 300px;
  }
</style>

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="mb-3">
          <h2 class="page-title">Thống kê nhân sự theo tháng</h2>
          <div class="m-2">
            <input type="month" id="monthInput" value="<?php echo $selectedTime ? $selectedTime : "2024-04" ?>"
              onchange="updateChart()">
          </div>
          <div class="shadow float-left">
            <div class="m-2 chart-container">
              <canvas id="myChart"></canvas>
            </div>
            <h2 class="mx-2 my-2">Tổng số nhân sự: <?php echo array_sum($data['soLuongNhanVien']) ?></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-4">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <!-- table -->
            <table class="table datatables" id="dataTable-1">
              <thead>
                <tr>
                  <th>Mã NV</th>
                  <th>Tên NV</th>
                  <th>Phòng ban</th>
                  <th>Ngày đi làm</th>
                  <th>Ngày nghỉ</th>
                  <th>Lương thực lãnh</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = $query2->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row['maNhanVien'] . "</td>";
                  echo "<td>" . $row['hoTen'] . "</td>";
                  echo "<td>" . $row['phongBan'] . "</td>";
                  echo "<td>" . $row['soNgayLamViec'] . "</td>";
                  echo "<td>" . $row['soNgayNghiKhongPhep'] . "</td>";
                  echo "<td>" . number_format($row['thucLanh']) . " VNĐ</td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  const ctx = document.getElementById('myChart');

  const chart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($data['tenPhong']) ?>,
      datasets: [{
        label: 'Số nhân viên',
        data: <?php echo json_encode($data['soLuongNhanVien']) ?>,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true
    }
  });

  function updateChart() {
    const selectedMonth = document.getElementById('monthInput').value;

    window.location.replace(`./index.php?page=thongkenhansu&month=${selectedMonth}`)
  }
</script>