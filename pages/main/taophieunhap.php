<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <img src="./assets/images/logo.svg" class="navbar-brand-img brand-sm mx-auto mb-4"
                                    alt="...">
                                <h2 class="mb-0 text-uppercase">Phiếu nhập</h2>
                            </div>
                            <div class="col-md-5" style="display: flex; gap: 30px; padding-top: 15px;">
                                <div class="">
                                    <p class="small text-muted text-uppercase mb-2">Người nhập hàng</p>
                                    <p class="mb-4">
                                        <strong>Mã NV: 23</strong><br /> Hồ Khang <br /> Nhân viên <br />
                                        hodohoangkhang@gmail.com<br /> 009879234<br />
                                    </p>
                                    <p>
                                        <span class="small text-muted text-uppercase">Mã phiêu nhập #</span><br />
                                        <strong>1806</strong>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="small text-muted text-uppercase mb-2">Nhà cung cấp</p>
                                    <p class="mb-4">
                                        <strong>
                                            <select class="form-control select2" id="validationSelect2" required>
                                                <option value="">Chọn nhà cung cấp</option>
                                                <option value="12">12-Tên NCC12</option>
                                                <option value="14">13-Tên NCC13</option>
                                                <option value="14">14-Tên NCC14</option>
                                            </select>
                                        </strong><br />NCC 1 <br /> Địa chỉ nhà CC Địa chỉ nhà CC Địa chỉ nhà CC <br />
                                        ncc1@gmail.com<br /> 0988723122<br />
                                    </p>
                                    <p>
                                        <small class="small text-muted text-uppercase">Ngày nhập</small><br />
                                        <strong>12/21/2021</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Size</th>
                                            <th scope="col" class="text-right">Giá nhập</th>
                                            <th scope="col" class="text-right">Số lượng</th>
                                            <th scope="col" class="text-right">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td> Creative Design</td>
                                            <td>42</td>
                                            <td class="text-right">$15.00</td>
                                            <td class="text-right">2</td>
                                            <td class="text-right">$30.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td> Creative Design</td>
                                            <td>42</td>
                                            <td class="text-right">$15.00</td>
                                            <td class="text-right">2</td>
                                            <td class="text-right">$30.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td> Creative Design</td>
                                            <td>42</td>
                                            <td class="text-right">$15.00</td>
                                            <td class="text-right">2</td>
                                            <td class="text-right">$30.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td> Creative Design</td>
                                            <td>42</td>
                                            <td class="text-right">$15.00</td>
                                            <td class="text-right">2</td>
                                            <td class="text-right">$30.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="text-right mr-2">
                                            <p class="mb-2 h6">
                                                <span class="text-muted">Thành tiền : </span>
                                                <strong>$285.00</strong>
                                            </p>
                                            <p class="mb-2 h6">
                                                <span class="text-muted">Thuế : </span>
                                                <strong>$28.50</strong>
                                            </p>
                                            <p class="mb-2 h6">
                                                <span class="text-muted">Tiền cần trả : </span>
                                                <span>$313.50</span>
                                            </p>
                                        </div>
                                    </div>
                                </div> <!-- /.row -->
                            </div>
                        </div> <!-- /.row -->

                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
                <div class="row" style="justify-content: space-between; margin-top: 30px;">
                    <h2 class="mb-2 ml-3 page-title">Danh sách sản phẩm</h2>
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
                                            <th>Ảnh</th>
                                            <th>Tên</th>
                                            <th>Giá cũ</th>
                                            <th>Giá mới</th>
                                            <th>Nhãn hiệu</th>
                                            <th>Danh mục</th>
                                            <th>Số lượng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="assets/products/p1.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 1000px;">
                                            </td>
                                            <td>Nike Air</td>
                                            <td>900.000</td>
                                            <td>800.000</td>
                                            <td>Nike</td>
                                            <td>Nam, thể thao</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#chitietsoluong"></span>20</button>
                                            </td>
                                            <td>
                                                <div>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#nhapsanpham"></span>Nhập</button>
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
    <!-- new event modal -->
    <div class="modal fade" id="chitietsoluong" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
        aria-hidden="true">
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
                        <tbody>
                            <tr>
                                <td>30</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>32</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>33</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>34</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>35</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>37</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- new event modal -->
     <!-- new event modal -->
     <div class="modal fade" id="nhapsanpham" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 600px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyModalLabel">Phiếu nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div style="display: flex;">
                    <table class="table datatables" id="dataTable-1">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Kích thước</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                            <tr>
                                <td>30</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>32</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>33</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>34</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>35</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>37</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <table class="table datatables" id="dataTable-1">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Kích thước</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                            <tr>
                                <td>38</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>39</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>41</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>42</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>43</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td>44</td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #1B68FF;">Giá nhập </td>
                                <td>
                                    <input class="form-control" id="example-number" type="number" name="number">
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    </div>    

                    <div style="display: flex; justify-content: end;">
								<input class="btn btn-primary" type="submit" value="Nhập"></input>
					</div>
                </div>

            </div>
        </div>
    </div> <!-- new event modal -->
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
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
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
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
<script src='js/select2.min.js'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
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
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
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