<?php
include 'config.php';

if (isset($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);
    $query = "SELECT * FROM ck WHERE video LIKE '%$search%' ";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<a href="views.php/' . urlencode($row['blog']) . '" class="list-group-item list-group-item-action">';
            echo htmlspecialchars($row['video']);
            echo '</a>';
        }
    } else {
        echo '<div class="list-group-item text-muted">No matching projects found.</div>';
    }
}
?>
