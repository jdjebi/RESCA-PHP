<?php 

// Initialise et inclut tous les fichiers communs aux pages de l'administration

session_start();

require_once "../config/defines.php";

require "../database/db_auto_connect.php";

require "../app/auth.php";

require_once "../app/utils.php";

require "../app/filters/admin.filter.php";

?>