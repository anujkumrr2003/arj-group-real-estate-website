<?php
function getSiteLogo($conn) {
    $stmt = $conn->query("SELECT logo FROM profile_settings LIMIT 1");
    if ($stmt && $stmt->num_rows > 0) {
        $row = $stmt->fetch_assoc();
        return htmlspecialchars($row['logo']); // Safe for HTML
    }
    return false;
}
?>
