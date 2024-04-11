<?php
require_once './object/database.php';

$manv = $_SESSION['taiKhoan'];
$row = new Database;
$arr = $row->executeQuery("select * from chamcong cc join nhanvien nv on cc.maNhanVien = nv.maNhanVien join hopdong hd on hd.maNhanVien = nv.maNhanVien where nv.maNhanVien = $manv and thangChamCong = 3 and namChamCong = 2024");
$getNgayNghiTheoMa = $row->executeQuery("select nv.maNhanVien, SUM(soNgayNghi) soNgayNghiCoPhep from nhanvien nv join donnghiphep dnp on nv.maNhanVien = dnp.maNhanVien where nv.maNhanVien = $manv and MONTH(ngayBatDauNghi) = 3  group by nv.maNhanVien");

print_r($getNgayNghiTheoMa)
?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row" style="justify-content: space-between;">
                    <h2 class="mb-2 page-title">Bảng lương tháng</h2>
                    <div>
                        <label for="thang">Tháng</label>
                        <select name="thang" id="thang">
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                        </select>
                        <label for="nam">Năm</label>
                        <select name="nam" id="nam">
                            <option value="2024">2024</option>
                        </select>
                    </div>
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
                                            <th>Mã nhân viên</th>
                                            <th>Tên nhân viên</th>
                                            <th>Số ngày công</th>
                                            <th>Lương cơ bản/ngày</th>
                                            <th>Số ngày nghỉ không phép</th>
                                            <th>Số ngày nghỉ có phép</th>
                                            <th>Số ngày trễ</th>
                                            <th>Số giờ tăng ca</th>
                                            <th>Lương thưởng</th>
                                            <th>Phụ cấp</th>
                                            <th>Khoản trừ bảo hiểm</th>
                                            <th>Khoản trừ khác</th>
                                            <th>Thuế</th>
                                            <th>Lương tháng</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body_table">
                                        <?php
                                        if (!empty($arr))
                                            foreach ($arr as $element) {
                                        ?>
                                            <tr>
                                                <td><?php echo $element['maNhanVien'] ?></td>
                                                <td><?php echo $element['hoTen'] ?></td>
                                                <td><?php echo $element['soNgayLamViec'] ?></td>
                                                <td><?php echo ceil($element['luongCoBan'] / 26) ?></td>
                                                <td><?php echo $element['soNgayNghiKhongPhep'] ?></td>
                                                <th><?php if (isset($getNgayNghiTheoMa[0]['soNgayNghiCoPhep'])) echo $getNgayNghiTheoMa[0]['soNgayNghiCoPhep'];
                                                    else echo 0 ?></th>
                                                <th><?php echo $element['soNgayTre'] ?></th>
                                                <th><?php echo $element['soGioTangCa'] ?></th>
                                                <td><?php echo $element['luongThuong'] ?></td>
                                                <td><?php echo $element['phuCap'] ?></td>
                                                <td><?php echo $element['khoanTruBaoHiem'] ?></td>
                                                <td><?php echo $element['khoanTruKhac'] ?></td>
                                                <td><?php echo $element['thue'] ?></td>
                                                <td><?php echo $element['thucLanh'] ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        <!-- Modal gia han hop dong-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Gia hạn hợp đồng</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span class="manv"></span>
                                                        <script>
                                                            let exampleModal = document.getElementById('exampleModal');
                                                            let maNV = document.querySelectorAll('.giahan');
                                                            let modal_body = document.querySelector('.modal-body');
                                                            let maNV2 = document.querySelector('.manv');
                                                            maNV.forEach((currentValue, index, array) => {
                                                                currentValue.addEventListener('click', () => {
                                                                    let ma = currentValue.getAttribute('manv')
                                                                    maNV2.innerHTML = `${ma}`;
                                                                    <?php
                                                                    // $getNhanVienTheoMa = $row->executeQuery(`select maNhanVien from nhanvien`);
                                                                    ?>
                                                                })
                                                            })
                                                        </script>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <button type="button" class="btn btn-primary">Lưu</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>

                                </table>
                                <hr>
                                <?php
                                if (!empty($arr))
                                    foreach ($arr as $element) {
                                ?>
                                    <div class="mt-5 pt-5">
                                        <div class="d-flex justify-space-between mb-5">
                                            <span style="min-width: 170px; font-weight: 900; font-size: 22px; color:crimson; margin-top: 3px">Lương tháng </span>
                                            <div>
                                                <div class="mb-4">
                                                    <span class="mr-3">=</span><span style="font-size: 18px; color:darkslategrey"><span style="color:green; font-size: 25px; font-weight: bold">[ </span>Lương cơ bản / 26 * số ngày làm việc + phụ cấp + lương thưởng + số giờ tăng ca * 100.000đ<span style="color:green; font-size: 25px; font-weight: bold"> ]</span> - <span style="color:orange; font-size: 25px; font-weight: bold">[ </span>khoản trừ bảo hiểm + khoản trừ khác + thuế * lương cơ bản + số ngày trễ * 100.000đ + số ngày nghỉ có phép (nếu lớn hơn 3) * lương cơ bản / 26<span style="color:orange; font-size: 25px; font-weight: bold"> ]</span>
                                                </div>
                                                <div> <span class="mr-3">=</span><span id="value_luong" style="font-size: 18px; color:darkslategrey"> <span style="color:green; font-size: 25px; font-weight: bold">[ </span><?php echo $element['luongCoBan'] ?> / 26 * <?php echo $element['soNgayLamViec'] ?> + <?php echo $element['phuCap'] ?> + <?php echo $element['luongThuong'] ?> + <?php echo $element['soGioTangCa'] ?> * 100.000đ<span style="color:green; font-size: 25px; font-weight: bold"> ]</span> - <span style="color:orange; font-size: 25px; font-weight: bold">[ </span><?php echo $element['khoanTruBaoHiem'] ?> + <?php echo $element['khoanTruKhac'] ?> + <?php echo $element['thue'] ?> * <?php echo $element['luongCoBan'] ?> + <?php echo $element['soNgayTre'] ?> * 100.000đ + <?php if (isset($getNgayNghiTheoMa[0]['soNgayNghiCoPhep']) && $getNgayNghiTheoMa[0]['soNgayNghiCoPhep'] > 3) echo "(" . $getNgayNghiTheoMa[0]['soNgayNghiCoPhep'] . "- 3)";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            else echo 0 ?> * <?php echo $element['luongCoBan'] ?> / 26<span style="color:orange; font-size: 25px; font-weight: bold"> ]</span></span>
                                                </div>
                                                <div class="mt-3">
                                                    <span class="mr-3">=</span>
                                                    <span id="luong_thang" style="color:crimson; font-size: 25px;"><?php echo number_format($element['thucLanh']) ?>đ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5>Ghi chú: </h5>
                                            <p> .. Số ngày làm việc = 26 - số ngày nghỉ không phép</p>
                                            <p> .. Nếu số ngày nghỉ có phép lớn hơn 3, thì từ ngày nghỉ thứ 4 trở đi, mỗi ngày nghỉ sẽ bị trừ vào 1 ngày công</p>
                                        </div>
                                    </div>
                                <?php }
                                ?>
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
    $(document).ready(function() {
        $('#thang').change(function() {
            var thang = $('#thang').val();
            var nam = $('#nam').val();
            var data = {
                thang: thang,
                nam: nam
            }
            $.ajax({
                url: '/HTTT-DN/pages/main/luong_theothangajax.php',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    let str = '';
                    let str2 = '';
                    let soNgayNghiCoPhep
                    if (result.result2 == '') {
                        soNgayNghiCoPhep = 0
                    } else {
                        soNgayNghiCoPhep = result.result2[0].soNgayNghiCoPhep
                    }

                    if (soNgayNghiCoPhep > 3) {
                        soNgayNghiCoPhepLonHon3 = `(${soNgayNghiCoPhep} - 3)`
                    } else {
                        soNgayNghiCoPhepLonHon3 = 0
                    }
                    let str3 = ''
                    result.result.forEach(element => {
                        str += `<tr>
                                                <td>${element['maNhanVien']}</td>
                                                <td>${element['hoTen']}</td>
                                                <td>${element['soNgayLamViec']}</td>
                                                <td>${Math.ceil(element['luongCoBan']/26)}</td>
                                                <td>${element['soNgayNghiKhongPhep']}</td>
                                                <th>${soNgayNghiCoPhep}</th>
                                                <th>${element['soNgayTre']}</th>
                                                <th>${element['soGioTangCa']}</th>
                                                <td>${element['luongThuong']}</td>
                                                <td>${element['phuCap']}</td>
                                                <td>${element['khoanTruBaoHiem']}</td>
                                                <td>${element['khoanTruKhac']}</td>
                                                <td>${element['thue']}</td>
                                                <td>${element['thucLanh']}</td>
                                            </tr>`
                        str2 += `
                        <span style="color:green; font-size: 25px; font-weight: bold">[ </span>${element['luongCoBan']} / 26 * ${element['soNgayLamViec']} + ${element['phuCap']} + ${element['luongThuong']} + ${element['soGioTangCa']} * 100.000đ<span style="color:green; font-size: 25px; font-weight: bold"> ]</span> - <span style="color:orange; font-size: 25px; font-weight: bold">[ </span>${element['khoanTruBaoHiem']} + ${element['khoanTruKhac']} + ${element['thue']} * ${element['luongCoBan']} + ${element['soNgayTre']} * 100.000đ + ${soNgayNghiCoPhepLonHon3} * ${element['luongCoBan']} / 26<span style="color:orange; font-size: 25px; font-weight: bold"> ]</span>`
                        str3 += `
                        ${element['thucLanh']}
                        `
                    });

                    $('#value_luong').html(str2)
                    $('#luong_thang').html(str3)
                    $('#body_table').html(str)

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })
    })
</script>