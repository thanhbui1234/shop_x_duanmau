<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $products ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-mobile-screen-button fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Loại sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $categories ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-table fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Người dùng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo $users ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Bình Luận
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $commnets ?>


                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-comment  fa-2x text-gray-300 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->



    <!-- GOOGLE CHART -->
    <div>
        <canvas id="myChart"></canvas>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sản phẩm', 'Sản phẩm giảm giá', 'Loại sản phẩm', 'Tài khoản', 'Người dùng', 'Admin',
                'Bình luận', 'Đã duyệt', 'Chưa duyệt'
            ],
            datasets: [{
                label: 'Thống kê',
                data: [
                    <?php echo $products ?>,
                    <?php echo $saleProd ?>,
                    <?php echo $categories ?>,
                    <?php echo $users ?>,
                    <?php echo $userNomal ?>,
                    <?php echo $userAdmin ?>,
                    <?php echo $commnets ?>,
                    <?php echo $cmtDuyet ?>,
                    <?php echo $cmtChuaDuyet ?>,

                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>


    <!-- Content Row -->
    <!-- /.container-fluid -->
</div>