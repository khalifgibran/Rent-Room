<?php  
  include('../../config.php');
  session_start();

  if(!isset($_SESSION['login_user'])) {
    header('Location: ../../login.php');
  }

  $queryM = mysqli_query($db,"SELECT * FROM `room-male`");
  $dataM   = $queryM->fetch_all(MYSQLI_ASSOC);

  $queryF = mysqli_query($db,"SELECT * FROM `room_female`");
  $dataF   = $queryF->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
        <script src="dashboard.js"></script>
    <script defer src="fontawesome/js/all.js"></script>
    <script src="../../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <title>Admin Panel</title>
    </head>

    <body>

       <div class="alert alert-light" role="alert">

            <div class="container-fluid">

                        <a class="nav-link" href="#">
                            <i class="fas fa-bell ms-5" data-bs-toggle="tooltip" title="Notification"></i>
                        </a>

                        <a class="nav-link" href="../../logout.php">
                            <i class="fas fa-sign-out-alt me-5"  data-bs-toggle="tooltip" title="Logout"></i>
                        </a>

            </div>
         </div>

          <div class="side-bar mb-5 row">
            <div class="side_bar col-md-2 pd-3 pt-3">
                <p class="text-center navbar-brand"><b>ADMIN DASHBOARD</b></p>
              <ul class="nav flex-column mt-5 ms-3 mb-3 ">
                <li class="nav-item">
                  <a class="nav-link active text-white" aria-current="page" href="dashboard.php"><i class=" fas fa-tachometer-alt me-3"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="listroom/listroom_male.php"><i class=" fas fa-person-booth me-3"></i>List Room</a><hr class="bg-secondary">
                </li>
                <li class="nav-item"> 
                  <a class="nav-link text-white" href="history_payment/history_payment.php"><i class="  fas fa-history me-3"></i>History Payment</a><hr class="bg-secondary">
                </li>
              </ul>
            </div>
            <div id="dashboard" class="col-md-10 mt-5 p-5 pt-5">
              <h3><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h3><hr>

              <div class="row">

                <div class="male_room card text-white ms-2" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">MALE ROOM</h5>
                    <hr>
                    <h2 class="card-text"><b><?php echo mysqli_num_rows($queryM); ?></b></h2>
                    <i class="fas fa-male mb-5"></i>
                  </div>
                </div>

                <div class="female_room card text-white ms-4" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">FEMALE ROOM</h5>
                    <hr>
                    <h2 class="card-text"><b><?php echo mysqli_num_rows($queryF); ?></b></h2>
                    <i class="fas fa-female"></i>
                  </div>
                </div>

                <div class="monthly_income card text-white  ms-4" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">MONTHLY INCOME</h5>
                    <hr>
                    <h2 class="card-text"><b>5</b></h2>
                    <i class="fas fa-table"></i>
                  </div>
                </div>

                <div class="yearly_income card text-white  ms-4" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">YEARLY INCOME</h5>
                    <hr>
                    <h2 class="card-text"><b>5</b></h2>
                    <i class="fas fa-table"></i>
                  </div>
                </div>
    
              </div>

              <div class="Chart">

                 <div class="ChartContainer mt-4 me-5">
                    <canvas id="BarChart"></canvas>
                 </div>

                <div class="ChartContainer mt-4">
                    <canvas id="PieChart"></canvas>
                 </div>

             </div>
             
            </div>
          </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>

    // BarChart //
    var ctx = document.getElementById("BarChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Monthly Income", "Yearly Income"],
                datasets: [{
                    label: 'My Bar Chart',
                    data: [5,5
                    ],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });


        // PieChart //
        ctx = document.getElementById('PieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Monthly Income", "Yearly Income"],
                datasets: [{
                    label: '',
                    data: [5,5
                    ],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 206, 86)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script> 
  </body>
</html>