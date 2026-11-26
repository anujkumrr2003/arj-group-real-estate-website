<?php
include 'config.php';

if (isset($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);

    // Optional: Fetch styling or profile data if needed
    $profile_result = $conn->query("SELECT * FROM profile LIMIT 1");
    $profile_row = $profile_result->fetch_assoc();

    // Search in 'video' and 'content' columns of 'ck' table
    $query = "SELECT * FROM ck WHERE content LIKE '%$search%' OR video LIKE '%$search%'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
      echo '<div class="container my-5 position-relative" style="margin-top: -200px !important; z-index: 1000;">';

echo '<div class="d-flex justify-content-center">'; // center content
echo '<div class="table-responsive" style="max-width: 800px; width: 100%;">'; // control width

echo '<table class="table table-bordered table-hover align-middle text-white" style="background-color: #000;">';

echo '<thead class="text-center" style="background-color: #fff;">';
echo '<tr><th>Projects Name</th></tr>';
echo '</thead>';

echo '<tbody>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td class="text-center">
            <a href="views.php/' . urlencode($row['blog']) . '" class="text-decoration-none text-white">
                ' . htmlspecialchars($row['video']) . '
            </a>
          </td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>'; // end table-responsive
echo '</div>'; // end center wrapper
echo '</div>'; // end container

    } else {
        echo '<div class="container my-5 text-center">';
        echo '<p class="text-muted">No projects found matching your search.</p>';
        echo '</div>';
    }
}
?>


<style>
    .row {
  --bs-gutter-x: 0 !important;
}

.card.transition {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card.transition:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

    </style>
