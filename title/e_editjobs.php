<?php
session_start();
include 'session_e.php';
include 'connection.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $pid = $_GET['id'];

    $query = "SELECT * FROM tbl_jobs WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $pid);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
            $qualifications = $row['qualifications'];
            $salary = $row['salary'];
            $location = $row['location'];
            $work_sched = $row['work_sched'];
            $work_arrangement = $row['work_arrangement'];
            $status = $row['status'];
        } else {
            echo "No job found with the given ID.";
            exit;
        }
    } else {
        echo "Error: " . $stmt->error;
        exit;
    }
} else {
    echo "Error: No ID found in URL.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../title/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
    <title>Edit Job Post | Employer</title>
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
    <?php
    include 'connection.php';
    ?>
    <main>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <img class="bi me-2" src="../title/title-img/sec-logo.png" width="80" height="30" role="img" aria-label="Title"></img>
            <!-- navigators-->
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="e_home.php">Back to Home</a>
                    </li>
              </div>
            </header>
        </div>
    </main>

    <!-- Form Section -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h2>Edit Job Post</h2>
                <form id="form_editjobs" method="POST" action="process_editjobs.php">
                <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
                <input type="hidden" name="submitPost" value="true">
                    <div class="mb-3">
                        <label for="title" class="form-label"><strong>Job Title</strong></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title of the posistion." value="<?php echo $title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Job Description</strong></label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Provide a brief description of the job responsibilities."><?php echo $description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="qualifications" class="form-label"><strong>Qualifications</strong></label>
                        <textarea class="form-control" name="qualifications" id="qualifications" rows="3" placeholder="List the qualifications and skills required for the position (Educational Background, Professional Experience, Skills, etc.)."><?php echo $qualifications; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label"><strong>Salary</strong></label>
                        <div class="input-group mb-3">
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control" name="salary" id="salary" placeholder="Indicate the salary for the position." value="<?php echo $salary; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label"><strong>Location</strong></label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Specify the location of the job (city, state)." value="<?php echo $location; ?>">
                    </div>
                    <div class="mb-3"> 
                        <label for="work_sched" class="form-label"><strong>Work Schedule</strong></label>
                        <select class="form-select" name="work_sched" id="work_sched">
                            <option selected>Select Work Schedule</option>
                            <option value="Full-Time" <?php echo ($work_sched == 'Full-Time') ? 'selected' : ''; ?>>Full-time</option>
                            <option value="Part-Time" <?php echo ($work_sched == 'Part-Time') ? 'selected' : ''; ?>>Part-time</option>
                            <option value="Contract" <?php echo ($work_sched == 'Contract') ? 'selected' : ''; ?>>Contract</option>
                            <option value="Temporary" <?php echo ($work_sched == 'Temporary') ? 'selected' : ''; ?>>Temporary</option>
                        </select>
                    </div>
                    <div class="mb-3"> 
                        <label for="work_arrangement" class="form-label"><strong>Work Arrangement</strong></label>
                        <select class="form-select" name="work_arrangement" id="work_arrangement">
                            <option selected>Select Work Arrangement</option>
                            <option value="Remote" <?php echo ($work_arrangement == 'Remote') ? 'selected' : ''; ?>>Remote</option>
                            <option value="On-Site" <?php echo ($work_arrangement == 'On-Site') ? 'selected' : ''; ?>>On-Site</option>
                    </select>
                    </div>
                    <div class="mb-3"> 
                        <label for="status" class="form-label"><strong>Application Status</strong></label>
                        <select class="form-select" name="status" id="status">
                            <option selected>Select Application Status</option>
                            <option value="Open" <?php echo ($status == 'Open') ? 'selected' : ''; ?>>Open</option>
                            <option value="Closed" <?php echo ($status == 'Closed') ? 'selected' : ''; ?>>Closed</option>
                        </select>
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary" name="submitPost" id="submitPost" type="submit">Save Changes</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>  
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../title/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#form_editjobs").on('submit', function (event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: 'process_editjobs.php',
                    data: $(this).serialize() + "&submitPost=true",
                    dataType: 'json',
                    success: function (response) {
                        alert(response.title + "! " + response.message);
                        if (response.title === 'Success') {
                            window.location.href = response.redirect_url;
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
