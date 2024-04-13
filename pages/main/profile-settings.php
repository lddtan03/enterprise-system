<?php
require_once './object/database.php';

$nv = new Database;

$maNhanVien = $_SESSION['taiKhoan'];

$result = $nv->executeQuery("select nv.maNhanVien, cmnd, trangthai, avatar, sdt, hoTen, gioiTinh, email, danToc, ngaySinh, diaChi, tenPhong, tenChucVu, ngayKetThuc, luongCoBan, ngayBatDau, loaiHopDong from chucvu cv join nhanvien nv on cv.maChucVu=nv.maChucVu join phongban pb on pb.maPhong=nv.maPhong join hopdong hd on hd.maNhanVien=nv.maNhanVien where nv.maNhanVien = '$maNhanVien'");
// echo "<pre>";
// print_r($result);
// echo "</pre>";

if(isset($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "')</script>";
    unset($_SESSION['alert_message']);
}
?>



<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <h2 class="h3 mb-4 page-title">Cài đặt</h2>
        <div class="my-4">
          <form class="mb-5" method="POST" action="index.php?page=suathongtincanhan">
            <?php
            foreach ($result as $nhanvien) {
            ?>

              <div class="row mt-5 align-items-center">
                <div class="col-md-3 text-center mb-4">
                  <div class="avatar avatar-l">
                    <img src="assets/avatars/<?php echo $nhanvien['avatar'] ?>" alt="..." class="avatar-img rounded-circle" style="max-width: 170px;">
                  </div>
                </div>
                <div class="col">
                  <div class="row align-items-center">
                    <div class="col-md-7">
                      <h4 class="mb-1" style="font-size: 24px;"><?php echo $nhanvien['hoTen']; ?></h4>
                      <p class="small mb-4"><span class="badge badge-dark" style="font-size: 13px;">ID: <?php echo $nhanvien['maNhanVien']; ?> | <?php echo $nhanvien['tenChucVu']; ?></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="hoten">Họ và tên</label>
                  <input type="text" id="hoten" name="hoten" class="form-control" placeholder="Hồ Đỗ Hoàng Khang" value="<?php echo $nhanvien['hoTen']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="cmnd">CMND/CCCD</label>
                  <input type="text" id="cmnd" name="cmnd" class="form-control" placeholder="12312342141" value="<?php echo $nhanvien['cmnd']; ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="sdt">Số điện thoại</label>
                  <input type="text" id="sdt" name="sdt" class="form-control" placeholder="0923123123" value="<?php echo $nhanvien['sdt']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="hodohoangkhang@gmail.com" value="<?php echo $nhanvien['email']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="P.O. Box 464, 5975 Eget Avenue" value="<?php echo $nhanvien['diaChi']; ?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="ngaysinh">Ngày sinh</label>
                  <input class="form-control input-placeholder" id="ngaysinh" name="ngaysinh" type="text" placeholder="02/03/2003" name="placeholder" value="<?php echo $nhanvien['ngaySinh']; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState5">Giới tính</label>
                  <select id="inputState5" name="inputState5" class="form-control">
                    <option value="male" <?php if ($nhanvien['gioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                    <option value="female" <?php if ($nhanvien['gioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="dantoc">Dân tộc</label>
                  <input class="form-control input-placeholder" placeholder="Kinh" id="dantoc" type="text" name="dantoc" value="<?php echo $nhanvien['danToc']; ?>">

                </div>
              </div>
              <hr class="my-4">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="luongcoban">Lương cơ bản</label>
                  <input class="form-control input-placeholder" id="luongcoban" type="text" name="placeholder" value="<?php echo $nhanvien['luongCoBan']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="loaihopdong">Loại hợp đồng</label>
                  <input class="form-control input-placeholder" placeholder="6 Năm" id="loaihopdong" type="text" name="placeholder" value="<?php echo $nhanvien['loaiHopDong']; ?>" readonly>

                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="ngaybatdauhopdong">Ngày bắt đầu hợp đồng</label>
                  <input class="form-control input-placeholder" id="ngaybatdauhopdong" type="text" placeholder="25/02/2025" name="placeholder" value="<?php echo $nhanvien['ngayBatDau']; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="matkhaumoi">Ngày kêt thúc hợp đồng</label>
                  <input class="form-control input-placeholder" placeholder="25-02-2025" id="ngayketthuchopdong" type="text" name="placeholder" value="<?php echo $nhanvien['ngayKetThuc']; ?>" readonly>

                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="matkhaucu">Mật khẩu cũ</label>
                  <input class="form-control input-placeholder" id="matkhaucu" type="password"  name="matkhaucu">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="matkhaumoi">Mật khẩu mới</label>
                  <input class="form-control input-placeholder" id="matkhaumoi" type="password" name="matkhaumoi" >

                </div>
              </div>

              <input type="submit" class="btn btn-primary" value="Lưu thay đổi" name="btn_submit"></input>
            <?php
            }
            ?>
          </form>
        </div>

       

      </div> <!-- /.card-body -->
    </div> <!-- /.col-12 -->
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