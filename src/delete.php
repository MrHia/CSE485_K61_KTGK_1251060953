<?php

include('config/db_connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM DOCGIA where madg = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('Location: index.php');
    } else {
        header('Location: error.php');
    }
}
