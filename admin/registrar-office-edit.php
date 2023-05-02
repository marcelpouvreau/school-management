<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])     &&
    isset($_GET['r_user_id'])) {
    
      if ($_SESSION['role'] == 'Admin') {
        require_once  '../db_connection.php';
        require_once  'data/registrar-office.php';

        $r_user_id = $_GET['r_user_id'];
        $r_user = getR_userById($r_user_id, $conn);

        if ($r_user == 0) {
            header ("Location: registrar-office.php");
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Registrar Office User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body >
    <?php
        require_once 'inc/navbar.php';
    ?>
    <div class="container mt-5">
      <a href="registrar-office.php" class="btn btn-dark">Go Back</a>
          <form method="post"
                class="shadow p-3 mt-5 form-w"
                action="req/registrar-office-edit.php">
              <h3>Edit Registrar Office User</h3><hr>
                  <?php if(isset($_GET['error'])) { ?>
                  <div class="alert alert-danger" role="alert">
                      <?=$_GET['error'] ?>
                  </div>
                  <?php } ?>

                  <?php if(isset($_GET['success'])) { ?>
                  <div class="alert alert-success" role="alert">
                      <?=$_GET['success'] ?>
                  </div>
                  <?php } ?>

              <div class="mb-3">
                  <label class="form-label">First name</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['fname']?>"
                         name="fname">
              </div>
              <div class="mb-3">
                  <label class="form-label">Last name</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['lname']?>"
                         name="lname">
              </div>
              <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['username']?>"
                         name="username">
              </div>
              <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['address']?>"
                         name="address">
              </div>
              <div class="mb-3">
                  <label class="form-label">Employee Number</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['employee_number']?>"
                         name="employee_number">
              </div>
              <div class="mb-3">
                  <label class="form-label">Date of Birth</label>
                  <input type="date"
                         class="form-control"
                         value="<?=$r_user['date_of_birth']?>"
                         name="date_of_birth">
              </div>
              <div class="mb-3">
                  <label class="form-label">Phone Number</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['phone_number']?>"
                         name="phone_number">
              </div>
              <div class="mb-3">
                  <label class="form-label">Qualification</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['qualification']?>"
                         name="qualification">
              </div>
              <div class="mb-3">
                  <label class="form-label">Email Address</label>
                  <input type="text"
                         class="form-control"
                         value="<?=$r_user['email_address']?>"
                         name="email_address">
              </div>
              <div class="mb-3">
                  <label class="form-label">Gender</label><br>
                  <input type="radio" <?php if($r_user['gender'] == 'Female') echo 'checked'; ?> value="Female" name="gender">Female
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" value="Male" <?php if($r_user['gender'] == 'Male') echo 'checked'; ?> name="gender">Male
              </div>
              <input type="text"
                     value="<?=$r_user['r_user_id']?>"
                     name="r_user_id"
                     hidden>

              <button type="submit" class="btn btn-primary">Update</button>
          </form>

          <form method="post"
                class="shadow p-3 my-5 form-w"
                action="req/registrar-office-change.php"
                id="change_password">
              <h3>Change Password</h3><hr>
              <?php if(isset($_GET['perror'])) { ?>
              <div class="alert alert-danger" role="alert">
                  <?=$_GET['perror'] ?>
              </div>
              <?php } ?>

              <?php if(isset($_GET['psuccess'])) { ?>
              <div class="alert alert-success" role="alert">
                  <?=$_GET['psuccess'] ?>
              </div>
              <?php } ?>
              <div class="mb-3">
                  <div class="mb-3">
                      <label class="form-label">Admin password</label>
                        <input type="text"
                              class="form-control"
                              name="admin_pass">
                  </div>
                  <label class="form-label">New password</label>
                  <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           name="new_pass"
                           id="passInput">
                    <button class="btn btn-secondary"
                            id="gBtn">Random</button>
                  </div>
              </div>

              <input type="text"
                     value="<?=$r_user['r_user_id']?>"
                     name="r_user_id"
                     hidden>
                     
              <div class="mb-3">
                  <label class="form-label">Confirm new password</label>
                    <input type="text"
                           class="form-control"
                           name="c_new_pass"
                           id="passInput2">
              </div>
              <button type="submit" class="btn btn-primary">Change</button>
          </form>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js""></script>
    <script>
      $(document).ready(function(){
        $("#navLinks li:nth-child(7) a").addClass('active');
      });

      function makePass(length) {
          let result = '';
          const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-+_/@|[{}]*\'"';
          const charactersLength = characters.length;
          let counter = 0;
          while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
          }
          var passInput = document.getElementById('passInput');
          var passInput2 = document.getElementById('passInput2');
          passInput.value = result;
          passInput2.value = result;
      }

      var gBtn = document.getElementById('gBtn');
      gBtn.addEventListener('click', function(e){
        e.preventDefault();
        makePass(8);
      })
    </script>
</body>
</html>

<?php
  }else{
    header("Location: teacher.php");
    exit;
  }
}else{
    header("Location: teacher.php");
    exit;
}


?>