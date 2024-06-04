<?php
include 'session_jb.php';
include 'connection.php';

$jobseeker_id = $_SESSION['jbid'];

$query = "SELECT * FROM tbl_jobseekers WHERE id = $jobseeker_id";

$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $education = $row['education'];
    $experience = $row['experience'];
    $skills = $row['skills'];

    // You may need to format the birthday here if needed
    $formatted_bday = $row['bday'];
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="../title/assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
        <title>Edit Profile | Job Seeker</title>

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
                            <a class="nav-link" href="jb_profile.php">Go Back to Profile</a>
                    </ul>
                </div>
                </header>
            </div>
        </main>
        <!-- end of header --> 
        
        <div class="container">
        <div class="row justify-content-md-center">
        <div class="col-md-10">
        <form id="form_jbedit">
            <h1 style="text-align:left;" class="h3 mb-2 fw-normal">Edit Profile</h1>
            <div class="form-floating my-2">
                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="<?php echo $name; ?>">
                <label for="name">Full Name</label>
            </div>
            <div class="form-floating my-2">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo $email; ?>">
                <label for="email">Email Address</label>
            </div>
            <div class="form-floating my-2">
                <input type="date" class="form-control" name="bday" id="bday" placeholder="Enter Birth Date." value="<?php echo $formatted_bday; ?>">
                <label for="bday">Birthday</label>
            </div>
            <div class="form-floating my-2">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" value="<?php echo $phone; ?>">
                <label for="phone">Phone Number</label>
            </div>  
            <div class="my-3">
                <label for="education" class="form-label" style="padding-bottom: 7px">Education</label>
                <textarea class="form-control" name="education" id="education" style="height: 100px" placeholder="Ex. Studied Bachelor of Science in Computer Science at ABC University in 2020 with honors in Data Analytics. (Should be in a paragraph.)"><?php echo $education; ?></textarea>
            </div>
            <div class="my-3">
                <label for="experience" class="form-label" style="padding-bottom: 7px">Work Experience</label>
                <textarea class="form-control" name="experience" id="experience" style="height: 100px" placeholder="Ex. Worked as a Software Developer at XYZ Corp for 2 years, involved in front-end development and project management. (Should be in a paragraph.)"><?php echo $experience; ?></textarea>
            </div>
            <div class="my-3">
                <label for="skills" class="form-label">Skills</label>
                <textarea class="form-control" name="skills" id="skills" style="height: 100px" placeholder="Outline your key skills and competencies. (Should be in a paragraph.)"><?php echo $skills; ?></textarea>
            </div>
            <button class="btn btn-primary w-100 my-3" type="submit">Save Changes</button> 
        </form>
        </div>
        </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#form_jbedit").submit(function (event) {
                    event.preventDefault(); // prevent submit

                    var name = $('#name').val();
                    var bday = $('#bday').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var education = $('#education').val();
                    var experience = $('#experience').val();
                    var skills = $('#skills').val();

                    if ($("#form_jbedit")[0].checkValidity()) {
                        $.ajax({
                            type: "POST",
                            url: 'process_jbeditprofile.php',
                            data: {
                                name: name,
                                bday: bday,
                                email: email,
                                phone: phone,
                                education: education,
                                experience: experience,
                                skills: skills
                            },
                            success: function (data) {
                                var response_data = JSON.parse(data);
                                alert(response_data.title + "! " + response_data.message);

                                if (response_data.title === 'Success') {
                                    window.location.href = response_data.redirect_url;
                                }
                            }
                        });
                    } else {
                        alert("Warning! " + "Please enter required fields.");
                    }
                });
            });
        </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../title/assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

        