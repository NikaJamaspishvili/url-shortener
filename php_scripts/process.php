<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['long_url'])) {
    $long_url = $_POST['long_url'];
    if(!filter_var($long_url, FILTER_VALIDATE_URL)){
        echo json_encode(["messaage"=>"incorrect url!","status"=>0]);
        mysqli_close($conn);
        exit();
    }
    $random_number = rand();
    $short_url = "http://localhost/php_projects/url_shortener/php_scripts/redirect.php?id=$random_number";

    try {
        $sql = "INSERT INTO urls (shortUrl, longUrl) VALUES ('$random_number', '$long_url')";
        mysqli_query($conn, $sql);
        echo json_encode(["message"=>$short_url,"status"=>1]); // ✅ Return the short URL directly to JS
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

mysqli_close($conn);
?>
