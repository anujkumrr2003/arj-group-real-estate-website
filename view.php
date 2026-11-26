<?php
include "config.php";
$res = $conn->query("SELECT * FROM ck ORDER BY id DESC");

while ($row = $res->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc; margin:15px; padding:10px'>";
    echo "<h3>About Property</h3>" . htmlspecialchars_decode($row['content']);
    echo "<h4>Highlights</h4>" . htmlspecialchars_decode($row['highlights']);
    echo "<h4>Amenities</h4>" . htmlspecialchars_decode($row['amenities']);
    echo "<h4>Floor Plan</h4>" . htmlspecialchars_decode($row['floor_plan']);
    echo "<hr>";
    echo "<a href='ad-ck.php?edit=" . $row['id'] . "'>Edit</a>";
    echo "</div>";
}
?>
