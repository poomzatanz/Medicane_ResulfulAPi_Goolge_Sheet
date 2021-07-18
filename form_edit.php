<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>แก้ไขข้อมูลยา</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css" type="text/css">
</head>

<body>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-12 col-md-10">
                        <h1 class="display-1 text-white">แก้ไขข้อมูลยา</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">แก้ไขข้อมูลยา</h3>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $id =  $_GET['id'];
                            $url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=selects&sheet_name=Medi'; // path to your JSON file
                            $data = file_get_contents($url); // put the contents of the file into a variable
                            $p = json_decode($data); // decode the JSON feed
                            ?>

                            <form action="save_edit.php" method="post">
                                <?php foreach ($p as $item) {
                                    if ($item->id == $id) {
                                ?>
                                        <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                        <input type="hidden" name="first_date" value="<?php echo $item->first_date; ?>">
                                        <input type="hidden" name="last_date" value="<?php echo $item->last_date; ?>">
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-username">ชื่อยา</label>
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="ชื่อยา" value="<?php echo $item->name; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-first-name">จำนวนยา stock</label>
                                                        <input type="text" id="num_stock" name="num_stock" class="form-control" placeholder="จำนวนยา" value="<?php echo $item->num_stock; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-first-name">จำนวนยาที่มีอยู่จริง</label>
                                                        <input type="text" id="num_real" name="num_real" class="form-control" placeholder="จำนวนยา" value="<?php echo $item->num_real; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-first-name">วันหมดอายุ</label>
                                                        <input type="date" id="last_date" name="last_date" class="form-control" placeholder="วันหมดอายุ" value="<?php echo strftime('%Y-%m-%d', strtotime($item->last_date)); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                <input type="submit" class="btn btn-success" value="ตกลง">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->

        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>