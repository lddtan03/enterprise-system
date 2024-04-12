<?php
$con = new mysqli('localhost', 'root', '11111111', 'htttdn');

if (isset($_GET['month'])) {
  $selectedTime = $_GET['month'];
  $selectedYear = substr($selectedTime, 0, 4);
  $selectedMonth = substr($selectedTime, 5, 2);

  $query = $con->query("
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

  $data = array(
    'tenPhong' => [],
    'soLuongNhanVien' => []
  );

  foreach ($query as $row) {
    $data['tenPhong'][] = $row['tenPhong'];
    $data['soLuongNhanVien'][] = $row['soLuongNhanVien'];
  }

  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    echo json_encode($data);
    exit;
  }
} else {
  $query = $con->query("
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

  foreach ($query as $row) {
    $data['tenPhong'][] = $row['tenPhong'];
    $data['soLuongNhanVien'][] = $row['soLuongNhanVien'];
  }
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
  .chart-container {
    width: 500px;
    height: 500px;
  }
</style>

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="my-3">  
          <h2 class="page-title">Thống kê nhân sự theo tháng</h2>
          <div class="shadow m-2">
            <input type="month" id="monthInput" value= "<?php echo $selectedTime ? $selectedTime : "2024-04" ?>" onchange="updateChart()">
          </div>
          <div class="card shadow float-left">
            <div class="m-2 chart-container">
              <canvas id="myChart"></canvas>
            </div>
            <h2 class="mx-2 my-2">Tổng số nhân sự: <?php echo array_sum($data['soLuongNhanVien']) ?></h2>
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
        label: 'Người',
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
