<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <form class="col-12" id="edit-product-form" enctype="multipart/form-data" action="/HTTT-DN/pages/main/nhacungcap-add.php" method="post" onsubmit="return checkForm(event)">
                <div id="back-to-prev-page">
                    <a href="index.php?page=nhacungcap">
                        <div class="icon">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="title">Quay lại</div>
                    </a>
                    <input name="add-nhacungcap-submit" id="submit-form-btn" type="submit" value="Lưu">
                </div>
                <h2 class="page-title">Thêm nhà cung cấp</h2>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Thông tin nhà cung cấp</strong>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body" style="padding-bottom: 30px">
                                <div>
                                    <div class="form-group">
                                        <label for="tenNCC">Tên nhà cung cấp</label>
                                        <input type="text" class="form-control" id="tenNCC" name="tenNCC" autofocus>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="emailNCC">Email</label>
                                            <input type="email" class="form-control" id="emailNCC" name="emailNCC">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sdtNCC">Số điện thoại</label>
                                            <input type="text" class="form-control" id="sdtNCC" name="sdtNCC">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="diaChiNCC">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diaChiNCC" name="diaChiNCC">
                                    </div>                                           
                                </div>
                            </div> <!-- /. card-body -->
                        </div> <!-- /. col -->
                    </div> <!-- /. end-section -->
            </form> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
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
</script>

<script>
    function previewImage() {
        var imageInput = document.getElementById('imageInput');
        var previewImg = document.getElementById('pimage');
        var file = imageInput.files[0]; // Lấy tệp tin đã chọn

        // Kiểm tra xem người dùng đã chọn tệp tin hay chưa
        if (file) {
            var reader = new FileReader();

            // Đọc dữ liệu hình ảnh từ tệp tin
            reader.onload = function(e) {
                previewImg.src = e.target.result; // Hiển thị hình ảnh
            }

            reader.readAsDataURL(file); // Đọc dữ liệu dưới dạng URL dữ liệu
        } else {
            previewImg.src = 'assets/images/no-image.png'; // Reset hình ảnh nếu không có tệp tin được chọn
        }
    }

    function checkForm(e) {
        var phoneRegEx = /^0[0-9]{8,9}$/;
        var ten = document.getElementById("tenNCC");
        var email = document.getElementById("emailNCC");
        var sdt = document.getElementById("sdtNCC");
        var diaChi = document.getElementById("diaChiNCC");

        if (ten.value.trim() == "" || ten.value.trim() == undefined || ten.value.trim() == NaN) {            
            alertMessage("warning", "Bạn chưa nhập tên nhà cung cấp!");
            ten.focus();
            e.preventDefault();
            return false;
        } else if (email.value.trim() == "" || email.value.trim() == undefined || email.value.trim() == NaN) {
            alertMessage("warning", "Bạn chưa nhập email nhà cung cấp!");
            email.focus();
            e.preventDefault();
            return false;
        } else if (sdtNCC.value.trim() == "" || sdtNCC.value.trim() == undefined || sdtNCC.value.trim() == NaN) {
            alertMessage("warning", "Bạn chưa nhập số điện thoại nhà cung cấp!");
            sdtNCC.focus();
            e.preventDefault();
            return false;
        } else if (!phoneRegEx.test(sdtNCC.value.trim()) && sdtNCC.value.trim() != "") {
            alertMessage("warning", "Số điện thoại không đúng định dạng!");
            sdtNCC.focus();
            e.preventDefault();
            return false;
        } else if (diaChi.value.trim() == "" || diaChi.value.trim() == undefined || diaChi.value.trim() == NaN) {            
            alertMessage("warning", "Bạn chưa nhập địa chỉ cung cấp!");
            diaChi.focus();
            e.preventDefault();
            return false;
        }
    }
</script>

<?php
function getImageName($url)
{
    $name = explode("/", $url);
    $name = "/" . $name[count($name) - 2] . "/" . $name[count($name) - 1];
    return $name;
}
?>