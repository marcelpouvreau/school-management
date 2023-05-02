<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['role']) && isset($_GET['message_id'])) {
    if ($_SESSION['role'] == 'Admin') {
        require_once '../db_connection.php';
        require_once 'data/message.php';

        $id = $_GET['message_id'];

        if (removeMessage($id, $conn)) {
            $sm = "Successfully Deleted!";
            header("Location: message.php?success=$sm");
            exit;
        } else {
            $em = "Unknown error occurred";
            header("Location: message.php?error=$em");
            exit;
        }
    } else {
        header("Location: message.php");
        exit;
    }
} else {
    header("Location: message.php");
    exit;
}