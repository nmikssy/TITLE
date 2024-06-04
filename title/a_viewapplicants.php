<?php
include 'session_a.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
        <title>Manage Applicants | Admin</title>

    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <style>
            body {
                background-color: #f5f5f7;
                font-family: 'Lato', sans-serif;
                font-weight: 400;
            }
    </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="../title/title-img/pri-logo.png" alt="Title Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text">Title</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a class="d-block">Welcome, Admin!</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
            <li class="nav-item">
              <a href="a_home.php" class="nav-link">
                <p>Manage Job Listings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <p>Manage Applicants</p>
              </a>
            </li>
        </ul>
      </nav>

      <nav class="fixed-bottom">
        <ul class="nav nav-sidebar flex-column">
          <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <p>Logout</p>
              </a>
            </li>
        </ul>
      </nav>

      </div>
      <!-- /.sidebar -->
</aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Applications Received:</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th class="text-center">Application Id</th>
                    <th class="text-center">Job Title</th>
                    <th class="text-center">Applicant's Name</th>
                    <th class="text-center">Date Applied</th>
                    <th class="text-center">Skills</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Accept</th>
                    <th class="text-center">Reject</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        include 'connection.php';

                        $sql = "SELECT id, jbid, pid, 
                                    (SELECT name FROM tbl_jobseekers WHERE id=tbl_appliedjobs.jbid) AS jbname,
                                    date,
                                    (SELECT title FROM tbl_jobs WHERE id=tbl_appliedjobs.pid) AS title,
                                    (SELECT skills FROM tbl_jobseekers WHERE id=tbl_appliedjobs.jbid) AS skills,
                                    status 
                                FROM tbl_appliedjobs;";

                        $appresult = $conn->query($sql);
                        if ($appresult->num_rows > 0) {
                            // output data of each row
                            while ($row = $appresult->fetch_assoc()) {
                                $id = $row['id'];
                                $pid = $row['pid'];
                                $jbname = $row['jbname'];
                                $title = $row['title'];
                                $date = $row['date'];
                                $skills = $row['skills'];
                                $status = $row['status'];

                    ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $jbname; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $skills; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><button class="btn btn-outline-success btn-sm" onclick="window.location.href='process_acceptapplication.php?id=<?php echo $id; ?>'">Accept</button></td>
                                    <td><button class="btn btn-outline-danger btn-sm" onclick="window.location.href='process_rejectapplication.php?id=<?php echo $id; ?>'">Reject</button></td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No applications available</td></tr>";
                        }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th class="text-center">Application Id</th>
                    <th class="text-center">Job Title</th>
                    <th class="text-center">Applicant's Name</th>
                    <th class="text-center">Date Applied</th>
                    <th class="text-center">Skills</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Accept</th>
                    <th class="text-center">Reject</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>

    <!-- Your custom scripts (if any) -->
    <!-- <script src="path/to/your/custom/scripts.js"></script> -->
</body>
</html>
