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
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th onclick="sortTable(0)">ชื่อยา</th>
                  <th onclick="sortTable()">วันหมดอายุ</th>
                  <th onclick="sortTable(2)">สถานะ</th>
                  <th>จำนวน stock</th>
                  <th>จำนวนที่มีอยู่จริง</th>
                  <th>การทํางาน</th>
                </tr>
              </thead>
              <tbody class="list">

                <?php



                ?>
                <tr dir-paginate="p in categories|itemsPerPage:50" pagination-id="cust">
                  <td> <a href="data.php?name=@{p.name}">@{p.name }</a></td>
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

  <script>
   

    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable");
      switching = true;
      //Set the sorting direction to ascending:
      dir = "asc";
      /*Make a loop that will continue until
      no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /*check if the two rows should switch place,
          based on the direction, asc or desc:*/
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /*If a switch has been marked, make the switch
          and mark that a switch has been done:*/
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          //Each time a switch is done, increase this count by 1:
          switchcount++;
        } else {
          /*If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again.*/
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
  </script>
  <script type="text/javascript">
    function convertDate(d) {
      var p = d.split("-");
      return +(p[2] + p[1] + p[0]);
    }

    function sortByDate() {
      var tbody = document.querySelector("#results tbody");
      // get trs as array for ease of use
      var rows = [].slice.call(tbody.querySelectorAll("tr"));

      rows.sort(function(a, b) {
        return convertDate(a.cells[0].innerHTML) - convertDate(b.cells[0].innerHTML);
      });

      rows.forEach(function(v) {
        tbody.appendChild(v); // note that .appendChild() *moves* elements
      });
    }
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



          for (let i = 0; i < $scope.categories.length; i++) {
            var last = new Date($scope.categories[i].last_date);
            var last_six = new Date(last.setMonth(last.getMonth() - 6));
            var date = new Date();
            var last1 = new Date($scope.categories[i].last_date);
            if (last_six > date && last1 > date) {
              $scope.categories[i].status = 1;
            } else if (last1 >= date && last_six <= date) {
              $scope.categories[i].status = 2;
            } else {
              $scope.categories[i].status = 3;
            }

          }
          $scope.categories = $scope.categories.slice().sort((a, b) => b.status - a.status);

          for (let i = 0; i < $scope.categories.length; i++) {
            if ($scope.categories[i].status == 1) {
              $scope.categories[i].status = 'ใช้งาน';
            } else if ($scope.categories[i].status == 2) {
              $scope.categories[i].status = 'ใกล้หมดอายุ';
            } else if ($scope.categories[i].status == 3) {
              $scope.categories[i].status = 'หมดอายุ';
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