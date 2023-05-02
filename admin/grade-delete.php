<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['grade_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      require_once  '../db_connection.php';
      require_once  'data/grade.php';

      $id = $_GET['grade_id'];
      if (removeGrade($id, $conn)) {
          $sm = "Successfully Deleted!";
          header("Location: grade.php?success$sm");
          exit;
      }else {
          $em = "Unknown error occurred";
          header("Location: grade.php?error$em");
          exit;
      }

    }else{
      header("Location: grade.php");
      exit;
    }
  }else{
      header("Location: grade.php");
      exit;
  }