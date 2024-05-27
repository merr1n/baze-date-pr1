<?php
require_once ("connection.php");

mysqli_query($con, "DROP TRIGGER IF EXISTS UserInserted");
$insertTrigger = "
CREATE TRIGGER UserInserted
AFTER INSERT ON account
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, user_id, timestamp) VALUES ('User inserted', NEW.id, NOW());
END;
";
mysqli_query($con, $insertTrigger);

mysqli_query($con, "DROP TRIGGER IF EXISTS UserUpdated");

$updateTrigger = "
CREATE TRIGGER UserUpdated
AFTER UPDATE ON account
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, user_id, timestamp) VALUES ('User updated', NEW.id, NOW());
END;
";
mysqli_query($con, $updateTrigger);

mysqli_query($con, "DROP TRIGGER IF EXISTS UserDeleted");
$deleteTrigger = "
CREATE TRIGGER UserDeleted
AFTER DELETE ON account
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, user_id, timestamp) VALUES ('User deleted', OLD.id, NOW());
END;
";
mysqli_query($con, $deleteTrigger);