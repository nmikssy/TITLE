<?php include 'session_jb.php'; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="../title/assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
        <title>Application History | Job Seeker</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../title/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        
        <style>
            body {
                background-color: #f5f5f7;
                font-family: 'Lato', sans-serif;
                font-weight: 400;
            }

            .container-table {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }   

            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }
        </style>
        
    </head>
    <body>
        <!-- header -->
        <main>
            <div class="container">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <img class="bi me-2" src="../title/title-img/sec-logo.png" width="80" height="30" role="img" aria-label="Title"></img>
                <!-- navigators-->
                <div class="d-flex justify-content-between align-items-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="jb_home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Application History</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="jb_profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" onclick="window.location.href='logout.php'">Logout</a></li>
                            </ul>
                        </li>
                </div>
                </header>
            </div>
        </main>
        <!-- end of header --> 

        <!-- table -->
        <div class="container-table">
        <div style=" height: 100vh; margin-top:0%;" class="col-md-11">
            <div>
                <h3>Jobs Applied by you:</h3>
            </div>
            <table class="table table-bordered" id='appliedjobsTable'>
                <thead>
                    <th>Post Id</th>
                    <th>Company Name</th>
                    <th>Job Title</th>
                    <th>Date Applied</th>
                    <th>Salary</th>
                    <th>Job Description</th>
                    <th>Status</th>
                </thead>
                <tbody>
                <?php
                    include 'connection.php'; 

                    $jbid = $_SESSION['jbid'];

                    $sql = "SELECT id, (SELECT name FROM tbl_employers WHERE id = tbl_jobs.eid) as ename, title, salary, description,
                                    (SELECT date FROM tbl_appliedjobs WHERE pid = tbl_jobs.id AND jbid = $jbid) AS date,
                                    (SELECT status FROM tbl_appliedjobs WHERE pid = tbl_jobs.id AND jbid = $jbid) AS status
                                FROM tbl_jobs
                                WHERE id IN (SELECT pid FROM tbl_appliedjobs WHERE jbid = $jbid);";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ename = $row['ename'];
                            $id = $row['id'];
                            $title = $row['title'];
                            $date = $row['date'];
                            $salary = $row['salary'];
                            $description = $row['description'];
                            $status = $row['status'];

                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $ename; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $salary; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>    