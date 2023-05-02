<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['class_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      require_once  '../db_connection.php';
      require_once  'data/class.php';

      $id = $_GET['class_id'];
      if (removeClass($id, $conn)) {
          $sm = "Successfully Deleted!";
          header("Location: class.php?success$sm");
          exit;
      }else {
          $em = "Unknown error occurred";
          header("Location: class.php?error$em");
          exit;
      }

    }else{
      header("Location: class.php");
      exit;
    }
  }else{
      header("Location: class.php");
      exit;
  }