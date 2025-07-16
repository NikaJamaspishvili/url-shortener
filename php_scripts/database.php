<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . "/../vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv -> load();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // ✅ Enable exceptions
// Create connection
try{
  $conn = mysqli_connect($_ENV["DATABASE_SERVER"], $_ENV["DATABASE_USER"], $_ENV["DATABASE_PASSWORD"], $_ENV["DATABASE_NAME"]);
}catch(mysqli_sql_exception $e){
  die("conection failed" . $e -> getMessage());
}

?>