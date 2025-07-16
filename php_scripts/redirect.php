<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];  // Example: ?id=123

    // ✅ Proper SQL with quotes
    $query = "SELECT longUrl FROM urls WHERE shortUrl = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $longUrl = $row['longUrl'];

        // ✅ Redirect to the real URL
        header("Location: $longUrl");
        exit();
    } else {
        echo "❌ No matching URL found.";
    }
} else {
    echo "❌ No ID provided.";
}
?>
