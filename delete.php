<?php
require_once ("connection.php");

$id = $_GET['id'];

$result = mysqli_query($con, "CALL DeleteUser($id)");

header('Location: tables.php');
