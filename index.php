<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <script src="angular.js"></script>
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
                  <h1>ข้อมูลยา ตึกชายโรงพยาบาลพนมสารคาม</h1>
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
            <table>
              <tr>
                <td> <a href="form_save.php" class="btn btn btn-neutral"><i class="fa fa-plus"></i> เพิ่มยา</a></td>
                <td><a href="form_Data_Medi.php" class="btn btn btn-neutral"><i class="fa fa-plus"></i> ข้อมูลยา</a></td>
              </tr>
            </table>
          </div>
          <div class="table-responsive" ng-app="app" ng-controller="ctrl">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>ชื่อยา</th>
                  <th>จำนวน</th>
                  <th>วันหมดอายุ</th>
                  <th>สถานะ</th>
                  <th>จำนวน stock</th>
                  <th>จำนวนที่มีอยู่จริง</th>
                  <th>การทํางาน</th>
                </tr>
              </thead>
              <tbody class="list">

                <?php



                ?>
                <tr dir-paginate="p in categories|itemsPerPage:5" pagination-id="cust">
                  <td> <a href="data.php?name=@{p.name}">@{p.name }</a></td>
                  <td>@{p.num }</td>
                  <td>@{p.last_date | date:'dd-MM-yyyy'}</td>
                  <td ng-style="p.status === 'ใช้งาน' && {'color': 'green','font-size': 'large','font-weight':'bolder'} ||
                  p.status === 'หมดอายุ' && {'color': 'red','font-size': 'large','font-weight':'bolder'} ||
                  p.status === 'ใกล้หมดอายุ' && {'color': 'orange','font-size': 'large','font-weight':'bolder'}">@{p.status}</td>
                  <td>@{p.num_stock}</td>
                  <td>@{p.num_real}</td>
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

          $scope.categories = $scope.categories.slice().sort((a, b) => b.id - a.id);
          
          for (let i = 0; i < $scope.categories.length; i++) {
            var last = new Date($scope.categories[i].last_date);
            var last_six  = new Date(last.setMonth(last.getMonth()-6));
            var date = new Date();
            var last1 = new Date($scope.categories[i].last_date);
            if(last_six > date && last1 > date){
              $scope.categories[i].status = "ใช้งาน";
            }else if(last1 >= date && last_six <= date){
              $scope.categories[i].status = "ใกล้หมดอายุ";
            }else{
              $scope.categories[i].status = "หมดอายุ";
            }
         
          }
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