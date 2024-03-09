<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <h2 class="h3 mb-4 page-title">Cài đặt</h2>
        <div class="my-4">
          <form>
            <div class="row mt-5 align-items-center">
              <div class="col-md-3 text-center mb-5">
                <div class="avatar avatar-xl">
                  <img src="assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
              </div>
              <div class="col">
                <div class="row align-items-center">
                  <div class="col-md-7">
                    <h4 class="mb-1">Hồ Đỗ Hoàng Khang</h4>
                    <p class="small mb-3"><span class="badge badge-dark" style="font-size: 12px;">ID: 34 | Nhân viên</span></p>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="hoten">Họ và tên</label>
                <input type="text" id="hoten" class="form-control" placeholder="Hồ Đỗ Hoàng Khang">
              </div>
              <div class="form-group col-md-6">
                <label for="cmnd">CMND/CCCD</label>
                <input type="text" id="cmnd" class="form-control" placeholder="12312342141">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="sdt">Số điện thoại</label>
                <input type="text" class="form-control" id="sdt" placeholder="0923123123">
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="hodohoangkhang@gmail.com">
              </div>
            </div>
            <div class="form-group">
              <label for="diachi">Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" placeholder="P.O. Box 464, 5975 Eget Avenue">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="ngaysinh">Ngày sinh</label>
                <input class="form-control input-placeholder" id="ngaysinh" type="text" placeholder="02/03/2003" name="placeholder">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState5">Giới tính</label>
                <select id="inputState5" class="form-control">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="dantoc">Dân tộc</label>
                <input class="form-control input-placeholder" placeholder="Kinh" id="dantocr" type="text" name="placeholder">

              </div>
            </div>
            <hr class="my-4">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="luongcoban">Lương cơ bản</label>
                <input class="form-control input-placeholder" id="luongcoban" type="text" placeholder="8.000.000" name="placeholder" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="loaihopdong">Loại hợp đồng</label>
                <input class="form-control input-placeholder" placeholder="6 Năm" id="loaihopdong" type="text" name="placeholder" readonly >

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="ngaybatdauhopdong">Ngày bắt đầu hợp đồng</label>
                <input class="form-control input-placeholder" id="ngaybatdauhopdong" type="text" placeholder="25/02/2025" name="placeholder" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="ngayketthuchopdong">Ngày kêt thúc hợp đồng</label>
                <input class="form-control input-placeholder" placeholder="25-02-2025" id="ngayketthuchopdong" type="text" name="placeholder" readonly>

              </div>
            </div>
            

            <hr class="my-4">
            <div class="row mb-4">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="matkhaucu">Mật khẩu cũ</label>
                  <input type="password" class="form-control" id="matkhaucu">
                </div>
                <div class="form-group">
                  <label for="matkhaumoi">Mật khẩu mới</label>
                  <input type="password" class="form-control" id="matkhaumoi">
                </div>
                <div class="form-group">
                  <label for="xacnhanmatkhau">Xác nhận mật khẩu</label>
                  <input type="password" class="form-control" id="xacnhanmatkhau">
                </div>
              </div>
              <div class="col-md-6">
                <p class="mb-2">Password requirements</p>
                <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                <ul class="small text-muted pl-4 mb-0">
                  <li> Minimum 8 character </li>
                  <li>At least one special character</li>
                  <li>At least one number</li>
                  <li>Can’t be the same as a previous password </li>
                </ul>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Change</button>
          </form>
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

  function gtag()
  {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>