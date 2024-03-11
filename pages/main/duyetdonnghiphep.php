<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <h2 class="mb-2 page-title">Danh sách đơn xin nghỉ</h2>
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
                      <th>Mã đơn</th>
                      <th>Mã nhân viên</th>
                      <th style="width: 100px;">Ngày bắt đầu</th>
                      <th style="width: 100px;">Ngày kết thúc </th>
                      <th>Số ngày nghỉ</th>
                      <th style="width: 300px;">Lý do</th>
                      <th>Người duyệt</th>
                      <th>Ngày duyệt</th>
                      <th>Trạng thái</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>2</td>
                      <td>20/03/2023</td>
                      <td>20/03/2025</td>
                      <td>10</td>
                      <td>Đi chơi</td>
                      <td>Hoài Nam</td>
                      <td>12-32-2032</td>
                      <td>Chưa duyệt</td>
                      <td>
                        <div style="display: flex; align-items: center; justify-content: start; gap: 10px;">
                          <button type="button" class="btn mb-2 btn-success">Duyệt</button>
                          <button type="button" class="btn mb-2 btn-danger">Xóa</button>
                        </div>
                      </td>
                    </tr>
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
  <!-- new event modal -->
  <div class="modal fade" id="taodon" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Đơn xin nghỉ phép</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-8">
          <div class="card shadow mb-8">
            <div class="card-body">
              <form class="needs-validation" method="post" action="index.php?page=donnghiphep"  novalidate>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="date-input1">Ngày nghỉ bắt đầu</label>
                    <div class="input-group">
                      <input type="text" class="form-control drgpicker" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="date-input1">Ngày nghỉ kết thúc</label>
                    <div class="input-group">
                      <input type="text" class="form-control drgpicker" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">
                      <div class="input-group-append">
                        <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.form-row -->
                <div class="form-group mb-3">
                  <label for="validationTextarea1">Lý do</label>
                  <textarea class="form-control" id="validationTextarea1" placeholder="Nhập lý do ở dây" required="" rows="3"></textarea>
                  <div class="invalid-feedback"> Vui lòng điền lý do. </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Nộp"></input>
              </form>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </div>
    </div>
  </div> <!-- new event modal -->
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