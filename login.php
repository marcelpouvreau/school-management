<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="icon" href="logo.png">
    <title>Login - Dev Galaxy School</title>
</head>
<body class="body-login">
    <div class="black-fill"><br><br>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <form class="login" method="post" action="req/login.php">
                <div class="text-center">
                    <img src="logo.png" width="100">
                    <h3>Login</h3>
                    <?php if(isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$_GET['error'] ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="uname" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass">
                </div>

                <div class="mb-3">
                    <label class="form-label">Login As</label>
                    <select class="form-control" name="role">
                        <option value="1">Admin</option>
                        <option value="2">Teacher</option>
                        <option value="3">Student</option>
                        <option value="4">Registrar Office</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                <a href="index.php" class="text-decoration-none">Home</a>
            </form>
            
            <br><br>
            <div class="text-center text-light">
                <h5>Copyright &copy; 2023 Dev School. All rights reserved.</h5>
            </div>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js""></script>
</body>
</html>