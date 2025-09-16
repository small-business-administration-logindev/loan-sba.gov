<?php
session_start();
session_unset();
session_destroy();

// Redirige a una página personalizada (por ejemplo: goodbye.php)
header("Location: goodbye.php");
exit();
