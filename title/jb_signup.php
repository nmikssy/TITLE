<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="../title/assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../title/title-img/pri-logo.png" type="image/x-icon">
        <title>Sign Up | Job Seeker</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="../title/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        
        <style>
            body {
                background-color: #f5f5f7;
                font-family: 'Lato', sans-serif;
                font-weight: 400;
                display: flex;
                align-items: center;
                min-height: 100vh;
                margin: 0;
            }

            #form_jbnew {
                max-width: 500px;
                margin: 0 auto;
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
    <?php include 'connection.php'; ?>
    <body class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
            <form id="form_jbnew">
                <a href="index.php"><img style="display: block; margin: 0 auto;" class="mb-2" src="../title/title-img/pri-logo.png" alt="Title" width="57" height="57"></a>
                <h1 style="text-align:center;" class="h3 mb-2 fw-normal">Sign Up</h1>
                <p style="text-align:center;">Sign up as a job seeker today.</p>
                <div class="form-floating my-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                    <label for="name">Full Name</label>
                </div>
                <div class="form-floating my-2">
                    <input type="date" class="form-control" name="bday" id="bday" placeholder="Enter Birth Date.">
                    <label for="bday">Birthday</label>
                </div>
                <div class="form-floating my-2">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email Address</label>
                </div>
                <div class="form-floating my-2">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
                    <label for="phone">Phone Number</label>
                </div>   
                <div class="form-floating my-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating my-2">
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                    <label for="cpassword">Confirm Password</label>
                </div>       
                <div class="my-3>
                    <label for="education" class="form-label" style="padding-bottom: 7px">Education</label>
                    <textarea class="form-control" name="education" id="education" style="height: 100px" placeholder="Ex. Studied Bachelor of Science in Computer Science at ABC University in 2020 with honors in Data Analytics. (Should be in a paragraph.)"></textarea>
                </div>
                <div class="my-3>
                    <label for="experience" class="form-label" style="padding-bottom: 7px">Work Experience</label>
                    <textarea class="form-control" name="experience" id="experience" style="height: 100px" placeholder="Ex. Worked as a Software Developer at XYZ Corp for 2 years, involved in front-end development and project management. (Should be in a paragraph.)"></textarea>
                </div>
                <div class="my-3>
                    <label for="skills" class="form-label">Skills</label>
                    <textarea class="form-control" name="skills" id="skills" style="height: 100px" placeholder="Outline your key skills and competencies. (Should be in a paragraph.)"></textarea>
                </div>
                <button class="btn btn-primary w-100 my-3" type="submit">Sign up</button> 
                <p style="text-align:center;">Already have an account? <a href="login.php">Login Now.</a></p>
            </form>
        </main>
    
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#form_jbnew").submit(function (event) {
                    event.preventDefault(); // prevent submit

                    var name = $('#name').val();
                    var bday = $('#bday').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var password = $('#password').val();
                    var cpassword = $('#cpassword').val();
                    var education = $('#education').val();
                    var experience = $('#experience').val();
                    var skills = $('#skills').val();

                    if ($("#form_jbnew")[0].checkValidity()) {
                        $.ajax({
                            type: "POST",
                            url: 'process_jbsignup.php',
                            data: {
                                name: name,
                                bday: bday,
                                email: email,
                                phone: phone,
                                password: password,
                                cpassword: cpassword,
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
