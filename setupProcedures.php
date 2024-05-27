<?php
require_once ("connection.php");

mysqli_query($con, "DROP PROCEDURE IF EXISTS InsertUser");
$insertProcedure = "
CREATE PROCEDURE InsertUser(IN p_username VARCHAR(100), IN p_email VARCHAR(100), IN p_password VARCHAR(100))
BEGIN
    INSERT INTO account (username, email, password) VALUES (p_username, p_email, p_password);
END;
";
mysqli_query($con, $insertProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS UpdateUser");

$updateProcedure = "

CREATE PROCEDURE UpdateUser(IN id INT, IN p_username VARCHAR(100), IN p_email VARCHAR(100), IN p_password VARCHAR(100))
BEGIN
    UPDATE account SET username = p_username, email = p_email, password = p_password WHERE id = id;
END;
";
mysqli_query($con, $updateProcedure);

mysqli_query($con, "DROP PROCEDURE IF EXISTS DeleteUser");
$deleteProcedure = "
CREATE PROCEDURE DeleteUser(IN user_id INT)
BEGIN
    DELETE FROM account WHERE id = user_id;
END;
";
mysqli_query($con, $deleteProcedure);

