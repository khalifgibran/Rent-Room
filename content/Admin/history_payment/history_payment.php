<?php  
  include('../../../config.php');
  session_start();

  if(!isset($_SESSION['login_user'])) {
    header('Location: ../../../login.php');
  }

  $totalDataPage = 4;
  $queryData = mysqli_query($db,"SELECT * FROM `history_payment`");
  $totalData = mysqli_num_rows($queryData);
  $totalPage = ceil($totalData / $totalDataPage);
  $activePage = (isset($_GET['page']) ) ? $_GET['page'] : 1;

  $earlyData = ($totalDataPage * $activePage) - $totalDataPage;

  $queryP = mysqli_query($db,"SELECT * FROM `history_payment` LIMIT $earlyData, $totalDataPage");
  $dataP = $queryP->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../../../bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../dashboard.css">
        <script src="../dashboard.js"></script>
    <script defer src="fontawesome/js/all.js"></script>
    <script src="../../../bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

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
                  <a class="nav-link active text-white" aria-current="page" href="../dashboard.php"><i class=" fas fa-tachometer-alt me-3"></i>Dashboard</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="../listroom/listroom_male.php"><i class=" fas fa-person-booth me-3"></i>List Room</a><hr class="bg-secondary">
                </li>
                <li class="nav-item"> 
                  <a class="nav-link text-white" href="../history_payment/history_payment.php"><i class="  fas fa-history me-3"></i>History Payment</a><hr class="bg-secondary">
                </li>
              </ul>
            </div>

            <div id="list_room" class="col-md-10 mt-5 p-5 pt-5">
              <h3><i class="fas fa-tachometer-alt me-2"></i>History Payment</h3><hr>

              <div class="row">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Name</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Payment Date</th>
                      <th scope="col">Proof</th>
                      <th scope="col">Description</th>
                      <th scope="col">Optional</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($dataP as $history_payment) {   ?>
                    <tr>
                      <td><b><?php echo $history_payment['id']; ?></b></td>
                      <td><?php echo $history_payment['name']; ?></td>
                      <td><?php echo $history_payment['payment']; ?></td>
                      <td><?php echo $history_payment['payment_date']; ?></td>
                      <td><?php echo '<img src="../proof_payment/'. $history_payment['proof_payment'] .'" width="100" >';?></td>
                      <td><div style="width: 100px;" class="bg-primary text-white p-2"><?php echo $history_payment['description']; ?></div></td>
                      <td><span class="bg-danger p-2 text-center"><a href='../process/delete_history.php?id="  <?php echo $history_payment['id']; ?>"'><i class="fas fa-trash text-white"></i></a></span></td>
                    <?php  }  ?>
                    </tr>
                  </tbody>
                </table>

                <img src="" alt="">

                <div class="pagination_square row">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">

                        <?php if($activePage > 1) :  ?>
                            <li class="page-item"><a class="text-dark page-link" href="?page=<?= $activePage - 1  ?>">Previous</a></li>
                        <?php endif;  ?>

                        <?php for($i = 1; $i <= $totalPage; $i++) :  ?>
                          <?php if($i == $activePage) :?>
                              <li class="page-item"><a class="text-white bg-dark page-link" href="?page=<?= $i  ?>"><?= $i;  ?></a></li>
                            <?php else :?>
                              <li class="page-item"><a class="text-dark page-link" href="?page=<?= $i  ?>"><?= $i;  ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if($activePage < $totalPage) :  ?>
                           <li class="page-item"><a class="text-dark page-link"href="?page=<?= $activePage + 1  ?>">Previous</a></li>
                        <?php endif;  ?>
                        
                      </ul>
                    </nav>
                </div>

              </div>
             
            </div>
          </div>
  </body>
</html>