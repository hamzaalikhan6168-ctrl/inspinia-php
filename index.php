    <?php
    if (isset($_GET['success']) && $_GET['success'] == "inserted!") {
        echo "<div class='alert alert-success alert-dismissible fade show ' role='alert'>
    <strong>Success!</strong> Successfully inserted!.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    }
    ?>

    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Login</title>

        <link href="theme/css/bootstrap.min.css" rel="stylesheet">
        <link href="theme/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="theme/css/animate.css" rel="stylesheet">
        <link href="theme/css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">IN+</h1>

                </div>
                <h3>Welcome to IN+</h3>
                <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>
                <p>Login in. To see it in action.</p>
                <div class="alert alert-danger d-none" id="error"></div>
                <form class="m-t" role="form" id="login-form">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="sk-spinner sk-spinner-wave d-none " id="spinner">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                        <div class="sk-rect4"></div>
                        <div class="sk-rect5"></div>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#"><small>Forgot password?</small></a>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="SignUp.php">Create an account</a>
                </form>
                <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="theme/js/jquery-3.1.1.min.js"></script>
        <script src="theme/js/popper.min.js"></script>
        <script src="theme/js/bootstrap.js"></script>

        <script>
            $('#login-form').submit(function(e) {
                e.preventDefault()
                let data = $(this).serialize()
                // console.log(data)   
                // return;

                $.ajax({
                    url: "http://localhost/bantu/backend/login.php",
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        $(':submit').attr('disabled', true)
                        $('#error').addClass('d-none')
                        $('#spinner').removeClass('d-none')
                    },
                    error: function() {
                        $(':submit').attr('disabled', false)
                        $('#spinner').addClass('d-none')
                        alert("error on backend")
                    },
                    success: function(response) {
                        let res = JSON.parse(response)
                        if (res.success) {
                            window.location.href = "http://localhost/bantu/dashboard.php"
                        }
                        if (res.error) {
                            $('#error').text(res.message)
                            $('#error').removeClass('d-none')
                            $(':submit').attr('disabled', false)
                            $('#spinner').addClass('d-none')

                            // alert(res.message)
                        }
                    }
                })

            })
        </script>

    </body>

    </html>