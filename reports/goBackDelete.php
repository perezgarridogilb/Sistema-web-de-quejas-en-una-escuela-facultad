<?php
include("../funcs/conexion.php");
session_start();
if ($_SESSION['usertype'] != 1) {
    header("Location: ../");
}

$id = $_GET['id'];
echo $id;
echo mysqli_query($conn, "UPDATE reports SET deleted_at=NULL WHERE id = $id");

header("Location: ./adminReports.php");
