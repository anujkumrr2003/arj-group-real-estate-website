<?php include('menu.php') ?>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title">Add FAQ</h4>
      </div>
      


<?php
include "config.php";

// Delete a group
if (isset($_GET['delete'])) {
    $record_id = intval($_GET['delete']);
    $conn->query("DELETE FROM faq WHERE record_id = $record_id");
   echo "<script>
    alert('FAQ added successfully!');
    window.location.href = 'add-faq.php';
</script>";
exit;

}

// Fetch ck video list
$ck_options = $conn->query("SELECT id, video FROM ck ORDER BY id DESC");

// Insert or Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $record_id = isset($_POST['record_id']) ? intval($_POST['record_id']) : 0;
    $ck_id     = isset($_POST['ck_id']) ? intval($_POST['ck_id']) : 0;
    $questions = $_POST['questions'] ?? [];
    $answers   = $_POST['answers'] ?? [];

    if ($record_id > 0) {
        $conn->query("DELETE FROM faq WHERE record_id = $record_id");
    } else {
        $max = $conn->query("SELECT MAX(record_id) as max_id FROM faq")->fetch_assoc();
        $record_id = ($max['max_id'] ?? 0) + 1;
    }

    for ($i = 0; $i < count($questions); $i++) {
        $q = $conn->real_escape_string($questions[$i]);
        $a = $conn->real_escape_string($answers[$i]);
        $conn->query("INSERT INTO faq (record_id, question, answer, ck_id) VALUES ($record_id, '$q', '$a', $ck_id)");
    }

   echo "<script>
    alert('FAQ added successfully!');
    window.location.href = 'add-faq.php';
</script>";
exit;

}

// Edit
$edit_data = [];
$edit_id = null;
$selected_ck_id = '';
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM faq WHERE record_id = $edit_id");
    while ($row = $res->fetch_assoc()) {
        $edit_data[] = $row;
        $selected_ck_id = $row['ck_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .remove-btn { cursor: pointer; color: red; font-weight: bold; }
    </style>
</head>
<body>
<div class="container py-4">
    <h3><?= $edit_id ? 'Edit FAQ Set' : 'Add New FAQ Set' ?></h3>

    <form method="post">
        <?php if ($edit_id): ?>
            <input type="hidden" name="record_id" value="<?= $edit_id ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="ck_id" class="form-label">Select Property (Video)</label>
            <select name="ck_id" id="ck_id" class="form-select" required>
                <option value="">-- Select --</option>
                <?php while ($ck = $ck_options->fetch_assoc()): ?>
                    <option value="<?= $ck['id'] ?>" <?= ($ck['id'] == $selected_ck_id) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($ck['video']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div id="faqWrapper">
            <?php if (!empty($edit_data)): ?>
                <?php foreach ($edit_data as $item): ?>
                    <div class="row mb-3 faq-group">
                        <div class="col-md-6">
                            <textarea name="questions[]" class="form-control" placeholder="Question" required><?= htmlspecialchars($item['question']) ?></textarea>
                        </div>
                        <div class="col-md-5">
                            <textarea name="answers[]" class="form-control" placeholder="Answer" required><?= htmlspecialchars($item['answer']) ?></textarea>
                        </div>
                        <div class="col-md-1 d-flex align-items-center">
                            <span class="remove-btn">×</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="row mb-3 faq-group">
                    <div class="col-md-6">
                        <textarea name="questions[]" class="form-control" placeholder="Question" required></textarea>
                    </div>
                    <div class="col-md-5">
                        <textarea name="answers[]" class="form-control" placeholder="Answer" required></textarea>
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                        <span class="remove-btn">×</span>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <button type="button" class="btn btn-sm btn-info mb-3" id="addFaq">+ Add FAQ</button>
        <br>
        <button type="submit" class="btn btn-primary">Save FAQs</button>
    </form>

    <hr>
    <h4>All FAQ Sets</h4>
    <div class="row">
       <?php
$sets = $conn->query("SELECT DISTINCT record_id FROM faq ORDER BY record_id DESC");
while ($set = $sets->fetch_assoc()):
    $id = $set['record_id'];

    // Get ck_id from one of the FAQs under this record_id
    $faq_one = $conn->query("SELECT ck_id FROM faq WHERE record_id = $id LIMIT 1")->fetch_assoc();
    $ck_id = $faq_one['ck_id'] ?? 0;

    // Get video title from ck table
    $video = '';
    if ($ck_id > 0) {
        $ck_data = $conn->query("SELECT video FROM ck WHERE id = $ck_id")->fetch_assoc();
        $video = $ck_data['video'] ?? '';
    }

    // Get all FAQs for this record_id
    $faqs = $conn->query("SELECT question, answer FROM faq WHERE record_id = $id");
?>
    <div class="col-md-6 mb-3">
        <div class="card p-3">
            <strong>Property: <?= htmlspecialchars($video) ?></strong>
            <!--<ul>-->
            <!--    <?php while ($faq = $faqs->fetch_assoc()): ?>-->
            <!--        <li><strong><?= htmlspecialchars($faq['question']) ?>:</strong> <?= htmlspecialchars($faq['answer']) ?></li>-->
            <!--    <?php endwhile; ?>-->
            <!--</ul>-->
            <div class="d-flex gap-2">
    <a href="?edit=<?= $id ?>" class="btn btn-sm btn-warning">Edit</a>
    <a href="?delete=<?= $id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this FAQ set?')">Delete</a>
</div>

        </div>
    </div>
<?php endwhile; ?>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addFaq').click(function () {
            $('#faqWrapper').append(`
                <div class="row mb-3 faq-group">
                    <div class="col-md-6">
                        <textarea name="questions[]" class="form-control" placeholder="Question" required></textarea>
                    </div>
                    <div class="col-md-5">
                        <textarea name="answers[]" class="form-control" placeholder="Answer" required></textarea>
                    </div>
                    <div class="col-md-1 d-flex align-items-center">
                        <span class="remove-btn">×</span>
                    </div>
                </div>
            `);
        });

        $(document).on('click', '.remove-btn', function () {
            $(this).closest('.faq-group').remove();
        });
    });
</script>
<!-- Vendor js -->
  <script src="assets/js/vendor.min.js"></script>

  <!-- Daterangepicker js -->
  <script src="assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

  <!-- Apex Charts js -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <!-- Vector Maps js -->
  <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-in-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-au-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-il-chicago-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-uk-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-ca-lcc-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-europe-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-fr-merc-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-es-merc.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-es-mill.js"></script>

  <!-- Vector Maps Demo js -->
  <script src="assets/js/pages/vector-maps.init.js"></script>

  <!-- Dashboard App js -->
  <script src="assets/js/pages/dashboard.js"></script>

  <!-- App js -->
  <script src="assets/js/app.min.js"></script>




</body>

</html>
