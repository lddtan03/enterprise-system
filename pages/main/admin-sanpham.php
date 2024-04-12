<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="mb-2 page-title">Danh sách sản phẩm</h2>
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
                      <th>Ảnh</th>
                      <th>Tên</th>
                      <th>Giá cũ</th>
                      <th>Giá mới</th>
                      <th>Nhãn hiệu</th>
                      <th>Danh mục</th>
                      <th>Số lượng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php                    
                    hienThiSanPham();
                    ?>
                    <!-- <tr>
                      <td>1</td>
                      <td>
                        <img src="assets/products/p1.jpg" alt="" style="width: 50px; height: 50px; border-radius: 1000px;">
                      </td>
                      <td>Nike Air</td>
                      <td>900.000</td>
                      <td>800.000</td>
                      <td>Nike</td>
                      <td>Nam, thể thao</td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chitietsoluong"></span>20</button>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div> <!-- simple table -->
        </div> <!-- end section -->
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->

  <!-- new event modal -->
  <!-- Chi tiết số lượng -->
  <div class="modal fade" id="chitietsoluong" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Chi tiết số lượng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-4">
          <table class="table datatables" id="dataTable-1">
            <thead>
              <tr>
                <th>Kích thước</th>
                <th>Số lượng</th>
              </tr>
            </thead>
            <tbody class="chiTietSoLuong">
              <!-- <tr>
                <td>30</td>
                <td>2</td>
              </tr>
              <tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- new event modal -->
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

<script>
  function getChiTietSoLuong(maSanPham) {
    var xml = new XMLHttpRequest();
    var request = "/HTTT-DN/pages/main/admin-sanpham-chitietsoluong.php?maSanPham=" + maSanPham;
    xml.open("GET", request, true);
    xml.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xml.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {        
        document.querySelectorAll("#dataTable-1 .chiTietSoLuong")[0].innerHTML = this.responseText;
      }
    };
    xml.send();
  }
</script>

<?php
function hienThiSanPham()
{
  require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');
  $productList = getProductList();
  for ($i = 0; $i < count($productList); $i++) {
    $product = $productList[$i];
    if ($product->getTinhTrang() == DA_XOA)
      continue;
    echo '<tr>' .
      '<td>' . $product->getMaSanPham() . '</td>' .
      '<td>' .
        '<div class="product-img" style="background-color:#EDEAEB; width: 100px; height: 80px;  border-radius: 5px;">
        <img src="' . $product->getHinhAnh() . '" alt="" style="width:100%; height:100%; object-fit:contain;">
          </div>'.
      '</td>' .
      '<td>' . $product->getTenSanPham() . '</td>' .
      '<td>' . changeMoney($product->getGiaCu()) . '₫</td>' .
      '<td>' . changeMoney($product->getGiaMoi()) . '₫</td>' .
      '<td>' . getNhanHieuById($product->getMaNhanHieu())->getTenNhanHieu() . '</td>' .
      '<td>Nam, thể thao</td>' .
      '<td>' .
      '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chitietsoluong" 
      onclick="getChiTietSoLuong(' . $product->getMaSanPham() . ')"></span>'
      . getSoLuongSanPham($product->getMaSanPham()) . '</button>' .
      '</td>' .
      '</tr>';
  }
}
?>