<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>บันทึกข้อมูลยา</title>
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

    <?php
    $name =  $_GET['name'];
    $chek = 0;
    $url = 'https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=selects&sheet_name=Data_Medi'; // path to your JSON file
    $data = file_get_contents($url); // put the contents of the file into a variable
    $p = json_decode($data); // decode the JSON feed
    ?>
    <?php foreach ($p as $item) {
        if ($item->name == $name) {
            $chek = 1;
    ?>
            <div class="main-content" id="panel">
                <div class="header pb-6 d-flex align-items-center" style="min-height: 300px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
                    <!-- Mask -->
                    <span class="mask bg-gradient-default opacity-8"></span>
                    <!-- Header container -->
                    <div class="container-fluid d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-12 col-md-10">
                                <h1 class="display-1 text-white"><?php echo $item->name; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid mt--6">
                    <div class="row">
                        <div class="col-xl-12 order-xl-1">
                            <div class="card">
                                <div class="card-header">

                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">ยา <?php echo $item->name; ?></h3>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="pl-lg-4">
                                        <img src="https://drive.google.com/thumbnail?id=<?php echo $item->pic; ?>" class="img-responsive" width="300" height="300">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="form-group">
                                                    <h3 class="mb-0">ข้อมูลยา</h3>
                                                    <p><?php echo $item->data_text; ?></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            <?php
                             }
                            }
                            ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <td> <a href="form_Data_Medi.php" class="btn btn btn-neutral"><i class="fa fa-plus"></i> กลับไปหน้าตารางข้อมูลยา</a></td>
                            <td> <a href="index.php" class="btn btn btn-neutral"><i class="fa fa-plus"></i> กลับไปหน้าตารางยา</a></td>
                        </tr>
                    </table>
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
<?php
  if($chek == 0) {
    echo "<script langquage='javascript'>  window.location='error.php'; </script>";
}
?>