<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['r_user_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      require_once  '../db_connection.php';
      require_once  'data/registrar-office.php';

      $id = $_GET['r_user_id'];
      if (removeRUser($id, $conn)) {
          $sm = "Successfully Deleted!";
          header("Location: registrar-office.php?success$sm");
          exit;
      }else {
          $em = "Unknown error occurred";
          header("Location: registrar-office.php?error$em");
          exit;
      }

    }else{
      header("Location: registrar-office.php");
      exit;
    }
  }else{
      header("Location: registrar-office.php");
      exit;
  }