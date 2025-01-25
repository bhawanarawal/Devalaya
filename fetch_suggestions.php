<?php
include('./admin/connection.php');

$query = $_GET['query'] ?? '';
$suggestions = [];

if (!empty($query)) {
    $sql = "SELECT DISTINCT source FROM lessons WHERE source LIKE '%$query%' LIMIT 10";
    $res = $con->query($sql);
    while ($row = $res->fetch_assoc()) {
        $suggestions[] = $row;
    }
}

echo json_encode($suggestions);
?>
