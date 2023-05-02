<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])) {
    
      if ($_SESSION['role'] == 'Admin') {
        require_once  '../db_connection.php';
        require_once  'data/teacher.php';
        require_once  'data/subject.php';
        require_once  'data/grade.php';
        require_once  'data/section.php';
        require_once  'data/class.php';

        if (isset($_GET['teacher_id'])) {
            $teacher_id = $_GET['teacher_id'];
            $teacher = getTeacherById($teacher_id, $conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Teachers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body >
    <?php
        require_once 'inc/navbar.php';
        if ($teacher != 0) {
    ?>
    <div class="container mt-5">

      <div class="card" style="width: 22rem;">
        <img src="../img/teacher-<?=$teacher['gender']?>.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">@<?php echo $teacher['username']; ?></h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">First name: <?php echo $teacher['fname']; ?></li>
          <li class="list-group-item">Last name: <?php echo $teacher['lname']; ?></li>
          <li class="list-group-item">Username: <?php echo $teacher['username']; ?></li>
          <li class="list-group-item">Address: <?php echo $teacher['address']; ?></li>
          <li class="list-group-item">Employee Number: <?php echo $teacher['employee_number']; ?></li>
          <li class="list-group-item">Date of birth: <?php echo $teacher['date_of_birth']; ?></li>
          <li class="list-group-item">Phone Number: <?php echo $teacher['phone_number']; ?></li>
          <li class="list-group-item">Qualification: <?php echo $teacher['qualification']; ?></li>
          <li class="list-group-item">Email: <?php echo $teacher['email_address']; ?></li>
          <li class="list-group-item">Gender: <?php echo $teacher['gender']; ?></li>
          <li class="list-group-item">Subject: 
            <?php
                $s = '';
                $subjects = str_split(trim($teacher['subjects']));
                foreach ($subjects as $subject) {
                  $s_temp = getSubjectById($subject, $conn);
                  if ($s_temp != 0)
                  $s .=$s_temp['subject_code'].', ';
                }
                echo $s;
                ?>
          </li>
          <li class="list-group-item">Class:
                <?php
                    $c = '';
                    $classes = str_split(trim($teacher['class']));
                    foreach ($classes as $class_id) {
                        $class = getClassById($class_id, $conn);
                        $c_temp = getGradeById($class['grade'], $conn);
                        $section = getSectionById($class['section'], $conn);
                        if ($c_temp != 0)
                          $c .=$c_temp['grade_code'].' - '.$c_temp['grade'].$section['section'].', ';
                    }
                    echo $c;
                ?>
          </li>
        </ul>
        <div class="card-body">
          <a href="teacher.php" class="card-link">Go Back</a>
        </div>
      </div>

    </div>
    <?php
    }else{
      header("Location: teacher.php");
      exit;
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js""></script>
    <script>
      $(document).ready(function(){
        $("#navLinks li:nth-child(2) a").addClass('active');
      });
    </script>
</body>
</html>

<?php
    }else{
      header("Location: teacher.php");
      exit;
    }
  }else{
    header("Location: ../login.php");
    exit;
  }
}else{
    header("Location: ../login.php");
    exit;
}

?>