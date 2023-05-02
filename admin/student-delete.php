<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['student_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      require_once  '../db_connection.php';
      require_once  'data/student.php';

      $id = $_GET['student_id'];
      if (removeStudent($id, $conn)) {
          $sm = "Successfully Deleted!";
          header("Location: student.php?success$sm");
          exit;
      }else {
          $em = "Unknown error occurred";
          header("Location: student.php?error$em");
          exit;
      }

    }else{
      header("Location: student.php");
      exit;
    }
  }else{
      header("Location: student.php");
      exit;
  }