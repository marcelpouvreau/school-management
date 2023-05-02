<?php

session_start();
if (isset($_SESSION['admin_id']) &&
    isset($_SESSION['role']) &&
    isset($_GET['section_id'])) {

    if ($_SESSION['role'] == 'Admin') {
      require_once  '../db_connection.php';
      require_once  'data/section.php';

      $id = $_GET['section_id'];
      if (removeSection($id, $conn)) {
          $sm = "Successfully Deleted!";
          header("Location: section.php?success$sm");
          exit;
      }else {
          $em = "Unknown error occurred";
          header("Location: section.php?error$em");
          exit;
      }

    }else{
      header("Location: section.php");
      exit;
    }
  }else{
      header("Location: section.php");
      exit;
  }