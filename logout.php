<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Degree-Progress-Simulation/index.php");
exit();

?>
