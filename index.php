<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">

  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  <script src="dirPaginate.js"></script>

  <title>ตารางยา</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css" type="text/css">
  <script src="js/angular.min.js"></script>
  <style>
    .button1 a:link {
      background-color: white;
      color: white;
      border: 2px solid #00BFFF;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    .button1 a:hover,
    a:active {
      background-color: #00BFFF;
      color: white;
    }
  </style>

<body>

  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <table>
              <tr>
                <td>
                  <h1>ข้อมูลยา โรงพยาบาลพนมสารคาม</h1>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header border-0">
            <h1 class="mb-0">ตารางยา</h1>
            <br>
            <a href="form_save.php" class="btn btn btn-neutral"><i class="fa fa-plus"></i> เพิ่มยา</a>
          </div>
          <div class="table-responsive" ng-app="app" ng-controller="ctrl">
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>รหัส</th>
                <th>ชื่อยา</th>
                <th>จำนวน</th>
                <th>วันแรก</th>
                <th>วันหมดอายุ</th>
                <th>การทํางาน</th>
              </tr>
            </thead>
              <tbody class="list">
                <tr dir-paginate="p in categories|itemsPerPage:5" pagination-id="cust">
                <td>@{p.id}</td>
                  <td>@{p.name}</td>
                  <td>@{p.num }</td>
                  <td>@{p.first_date | date:'dd-MM-yyyy' }</td>
                  
                  <td>@{p.last_date | date:'dd-MM-yyyy'}</td>
                  <td><a href="form_edit.php?id=@{p.id}" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
                    <a href="delete.php?id=@{p.id}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i> ลบ</a>
                  </td>
                </tr>
              </tbody>
            </table>
            <table>
              <tr>
                <td>
                  <dir-pagination-controls pagination-id="cust" class="button1"></dir-pagination-controls>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
 <script>
     $('.btn-delete').on('click',function(){
        if(confirm("คุณต้องการลบข้อมูลสินค้าหรือไม่?")) {
            var url = "remove.php"+ '/' + $(this).attr('id-delete');
            
            window.location.href = url;
        }
    });
 </script>
  <script type="text/javascript">

    var app = angular.module('app', ['angularUtils.directives.dirPagination']).config(function($interpolateProvider) {
      $interpolateProvider.startSymbol('@{').endSymbol('}');
    });
    app.service('productService', function($http) {
      this.getCategoryList = function() {
        return $http.get('https://script.google.com/macros/s/AKfycbxCxk8olHvDKYDksyZyIYhwmTzWwlC2KuaxEqftG0BEpK_vUtU/exec?action=selects&sheet_name=Medi');
      };

    });
    app.controller('ctrl', function($scope, productService) {
      $scope.categories = [];

      $scope.getCategoryList = function() {
        productService.getCategoryList().then(function(res) {

          $scope.categories = res.data;
          console.log(res.data);
          $scope.categories = $scope.categories.slice().sort((a, b) => b.id - a.id);
        });
      };
      $scope.getCategoryList();


    });
  </script>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>