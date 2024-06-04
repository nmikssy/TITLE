<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="../title/assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
        <title>Title</title>

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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>
                    <div>
                        <button class="btn btn-outline-primary" onclick="window.location.href='login.php'">Log In</button>
                        <button class="btn btn-outline-primary" onclick="window.location.href='e_signup.php'">Sign Up as an Employer</button>
                        <button class="btn btn-outline-primary" onclick="window.location.href='jb_signup.php'">Sign Up as a Job Seeker</button>
                    </div>
                </header>
            </div>
        </main>
        <!-- end of header --> 
        
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="input-group">
                    <select class="form-select " id="searchOption">
                        <option value="title">Title</option>
                        <option value="qualifications">Qualifications</option>
                        <option value="salary">Salary</option>
                        <option value="location">Location</option>
                        <option value="work_sched">Work Schedule</option>
                        <option value="work_arrangement">Work Arrangement</option>
                        <option value="status">Status</option>
                    </select>
                    <input type="text" id="searchQuery" class="form-control" placeholder="Search..." aria-label="Search input">
                    <button id="submitSearch" class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
        </div>

        <div id="searchResults"  style="width: 100%; padding-left: 50px; padding-right: 50px; " class="row">
            <script>
                $(document).ready(function() {
                    $('#submitSearch').click(function() {
                        var searchQuery = $('#searchQuery').val();  

                        $.ajax({
                            url: 'search.php',
                            method: 'GET',
                            data: { q: searchQuery },
                            success: function(data) {
                                var jobListings = JSON.parse(data);

                                $('.job-listings').empty();

                                jobListings.forEach(function(job) {
                                    var jobCard = `
                                        <div class="col-md-4 crd" style="margin: 20px; background-color:#FFFFFF; padding: 20px;">
                                            <h3 style="color: #0D6EFD"> <b> ${job.title} </b> </h3>
                                            <h6>By: ${job.ename}</h6>
                                            <h5><b>Job Description:</b><br>${job.description}</h5>
                                            <h5><b>Qualifications:</b><br>${job.qualifications}</h5>
                                            <h5><b>Salary:</b> ${job.salary}</h5>
                                            <h5><b>Location:</b> ${job.location}</h5>
                                            <h5><b>Work Schedule:</b> ${job.work_sched}</h5>
                                            <h5><b>Work Arrangement:</b> ${job.work_arrangement}</h5>
                                            <h5><b>Status:</b> ${job.status}</h5>
                                            <div class="d-flex justify-content-end mt-auto">
                                                <button class="btn btn-outline-primary ms-2 apply-btn" data-pid="${job.id}">Apply</button>
                                            </div>
                                        </div>
                                    `;
                                    $('.job-listings').append(jobCard);
                                });

                            },
                            error: function() {
                                console.log('Error in AJAX request');
                            }
                        });
                    });
                });
            </script>
        </div>

            <div style="width: 100%; padding-left: 50px; padding-right: 50px; " class="row job-listings">
                <?php
                include 'connection.php';
                    
                $queryJobs = "SELECT j.*, e.name as ename FROM tbl_jobs j
                INNER JOIN tbl_employers e ON j.eid = e.id";
                $resultJobs = mysqli_query($conn, $queryJobs);
  

                    if ($resultJobs && mysqli_num_rows($resultJobs) > 0) {
                        while ($row = mysqli_fetch_assoc($resultJobs)) {
                            $pid = $row['id'];
                            $title = $row['title'];
                            $description = $row['description'];
                            $qualifications = $row['qualifications'];
                            $salary = $row['salary'];
                            $location = $row['location'];
                            $workSched = $row['work_sched'];
                            $workArrangement = $row['work_arrangement'];
                            $status = $row['status'];
                            $ename = $row['ename'];
                            ?>
                            <div class="col-md-4 crd" style="margin: 20px; background-color:#FFFFFF; padding: 20px;">
                                <h3 style="color: #0D6EFD"> <b> <?php echo $title; ?> </b> </h3>
                                <h6>By: <?php echo $ename; ?></h6>
                                <h5><b>Job Description:</b><br><?php echo $description; ?></h5>
                                <h5><b>Qualifications:</b><br><?php echo $qualifications; ?></h5>
                                <h5><b>Salary:</b> <?php echo $salary; ?></h5>
                                <h5><b>Location:</b> <?php echo $location; ?></h5>
                                <h5><b>Work Schedule:</b> <?php echo $workSched; ?></h5>
                                <h5><b>Work Arrangement:</b> <?php echo $workArrangement; ?></h5>
                                <h5><b>Status:</b> <?php echo $status; ?></h5>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="text-center">';
                        echo ' <img src="title-img/error.png" width=600px /> ';
                        echo '</div>';
                    }
                ?>
            </div>


        <script src="../title/assets/dist/js/bootstrap.bundle.min.js"></script>
        
  </body>
</html>
