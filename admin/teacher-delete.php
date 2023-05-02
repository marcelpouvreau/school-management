<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['teacher_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      require_once  '../db_connection.php';
      require_once  'data/teacher.php';

      $id = $_GET['teacher_id'];
      if (removeTeacher($id, $conn)) {
          $sm = "Successfully Deleted!";
          header("Location: teacher.php?success$sm");
          exit;
      }else {
          $em = "Unknown error occurred";
          header("Location: teacher.php?error$em");
          exit;
      }

    }else{
      header("Location: teacher.php");
      exit;
    }
  }else{
      header("Location: teacher.php");
      exit;
  }