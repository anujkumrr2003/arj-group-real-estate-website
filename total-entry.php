<?php include('menu.php') ?>
          <!-- end page title -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="header-title">All Enquiry Records</h4>
                </div>
                
                
                
                
         <?php
ob_start();
include 'config.php';

date_default_timezone_set('Asia/Kolkata');

/* ================= BULK DELETE ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bulk_delete'])) {

    $selected_ids = $_POST['selected_ids'] ?? [];

    if (!is_array($selected_ids)) {
        $selected_ids = [];
    }

    // Only valid integer IDs
    $selected_ids = array_map('intval', $selected_ids);
    $selected_ids = array_filter($selected_ids, function ($id) {
        return $id > 0;
    });
    $selected_ids = array_unique($selected_ids);

    if (!empty($selected_ids)) {

        $ids = implode(',', $selected_ids);

        $delete_sql = "DELETE FROM contact_form WHERE id IN ($ids)";

        if ($conn->query($delete_sql)) {
            $_SESSION['success_message'] = count($selected_ids) . " record(s) deleted successfully.";
        } else {
            $_SESSION['error_message'] = "Unable to delete records: " . $conn->error;
        }

    } else {
        $_SESSION['error_message'] = "Please select at least one record.";
    }

    // JS redirect - header already sent issue avoid karne ke liye
    echo '<script>
        window.location.href = "total-entry.php";
    </script>';
    exit;
}

/* ================= SESSION MESSAGE ================= */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$success_message = $_SESSION['success_message'] ?? '';
$error_message   = $_SESSION['error_message'] ?? '';

unset($_SESSION['success_message'], $_SESSION['error_message']);


/* ================= PAGINATION ================= */
$limit = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;


/* ================= FILTERS ================= */
$search = isset($_GET['search'])
    ? $conn->real_escape_string(trim($_GET['search']))
    : '';

$fromDate = isset($_GET['from'])
    ? $conn->real_escape_string($_GET['from'])
    : '';

$toDate = isset($_GET['to'])
    ? $conn->real_escape_string($_GET['to'])
    : '';


$where = "WHERE 1";

if (!empty($search)) {
    $where .= " AND (
        name LIKE '%$search%'
        OR email LIKE '%$search%'
        OR project_name LIKE '%$search%'
    )";
}

if (!empty($fromDate)) {
    $where .= " AND DATE(submitted_at) >= '$fromDate'";
}

if (!empty($toDate)) {
    $where .= " AND DATE(submitted_at) <= '$toDate'";
}


/* ================= COUNT TOTAL ================= */
$count_sql = "SELECT COUNT(*) AS total FROM contact_form $where";

$count_result = $conn->query($count_sql);

$totalRecords = 0;

if ($count_result) {
    $count_row = $count_result->fetch_assoc();
    $totalRecords = $count_row['total'];
}

$totalPages = ceil($totalRecords / $limit);


/* ================= FETCH RECORDS ================= */
$sql = "SELECT *
        FROM contact_form
        $where
        ORDER BY id DESC
        LIMIT $offset, $limit";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Enquiry Records</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    >

</head>

<body>

<div class="container my-4">

    <h2 class="mb-4">All Enquiries Record</h2>


    <!-- ================= SUCCESS / ERROR MESSAGE ================= -->

    <?php if (!empty($success_message)): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle"></i>
            <?= htmlspecialchars($success_message) ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>

    <?php endif; ?>


    <?php if (!empty($error_message)): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle"></i>
            <?= htmlspecialchars($error_message) ?>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>

    <?php endif; ?>


    <!-- ================= FILTERS ================= -->

    <div class="row g-2 align-items-end mb-3">

        <div class="col-md-3">

            <label for="fromDate" class="form-label">
                From Date
            </label>

            <input
                type="date"
                id="fromDate"
                class="form-control"
                value="<?= htmlspecialchars($fromDate) ?>"
            >

        </div>


        <div class="col-md-3">

            <label for="toDate" class="form-label">
                To Date
            </label>

            <input
                type="date"
                id="toDate"
                class="form-control"
                value="<?= htmlspecialchars($toDate) ?>"
            >

        </div>


        <div class="col-md-4">

            <label for="search" class="form-label">
                Search
            </label>

            <input
                type="text"
                id="search"
                class="form-control"
                placeholder="Name, Email, or Project"
                value="<?= htmlspecialchars($search) ?>"
            >

        </div>


        <div class="col-md-2">

            <button
                id="searchBtn"
                class="btn btn-primary w-100"
            >
                Search
            </button>

        </div>


        <div class="col-md-3">

            <a
                href="total-entry.php"
                class="btn btn-success w-100"
            >
                <i class="fa fa-refresh" aria-hidden="true"></i>
                Refresh
            </a>

        </div>


        <div class="col-md-2">

            <button
                id="downloadBtn"
                class="btn btn-success w-100"
            >
                <i class="fa fa-download"></i>
                Download Excel
            </button>

        </div>

    </div>


    <!-- ================= TOTAL + DELETE ================= -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h5 class="mb-0">
            Total Enquiries:
            <span><?= $totalRecords ?></span>
        </h5>


        <div class="d-flex align-items-center gap-2">

            <span
                id="selectedCount"
                class="badge bg-secondary"
                style="display:none;"
            >
                0 Selected
            </span>


            <button
                type="button"
                id="deleteSelectedBtn"
                class="btn btn-danger"
                style="display:none;"
                onclick="confirmBulkDelete()"
            >
                <i class="fa fa-trash"></i>
                Delete Selected
            </button>

        </div>

    </div>


    <!-- ================= BULK DELETE FORM ================= -->

    <form
        method="POST"
        id="bulkDeleteForm"
    >

        <input
            type="hidden"
            name="bulk_delete"
            value="1"
        >


        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th style="width:50px;" class="text-center">

                            <input
                                type="checkbox"
                                id="selectAll"
                                class="form-check-input"
                            >

                        </th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Project Name</th>

                        <th>Submitted At</th>

                    </tr>

                </thead>


                <tbody>

                    <?php if ($result && $result->num_rows > 0): ?>

                        <?php while ($row = $result->fetch_assoc()): ?>

                            <tr>

                                <td class="text-center">

                                    <input
                                        type="checkbox"
                                        name="selected_ids[]"
                                        value="<?= (int)$row['id'] ?>"
                                        class="recordCheckbox form-check-input"
                                    >

                                </td>


                                <td>
                                    <?= htmlspecialchars($row['name']) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars($row['email']) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars(
                                        $row['country_code'] . ' ' . $row['mobile']
                                    ) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars($row['project_name']) ?>
                                </td>


                                <td>

                                    <?php

                                    $dt = new DateTime(
                                        $row['submitted_at'],
                                        new DateTimeZone('UTC')
                                    );

                                    $dt->setTimezone(
                                        new DateTimeZone('Asia/Kolkata')
                                    );

                                    echo $dt->format('d-m-Y h:i:s A');

                                    ?>

                                </td>

                            </tr>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="6"
                                class="text-center"
                            >
                                No records found
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </form>


    <!-- ================= PAGINATION ================= -->

    <?php if ($totalPages > 1): ?>

        <nav>

            <ul class="pagination">

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                    <li
                        class="page-item <?= ($i == $page) ? 'active' : '' ?>"
                    >

                        <a
                            class="page-link"
                            href="?search=<?= urlencode($search) ?>&from=<?= urlencode($fromDate) ?>&to=<?= urlencode($toDate) ?>&page=<?= $i ?>"
                        >
                            <?= $i ?>
                        </a>

                    </li>

                <?php endfor; ?>

            </ul>

        </nav>

    <?php endif; ?>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>

/* ================= SELECT ALL ================= */

$('#selectAll').on('change', function () {

    $('.recordCheckbox').prop(
        'checked',
        $(this).is(':checked')
    );

    updateSelectedCount();

});


/* ================= INDIVIDUAL CHECKBOX ================= */

$(document).on('change', '.recordCheckbox', function () {

    updateSelectedCount();

    let total = $('.recordCheckbox').length;

    let selected = $('.recordCheckbox:checked').length;

    $('#selectAll').prop(
        'checked',
        total > 0 && total === selected
    );

});


/* ================= UPDATE SELECTED COUNT ================= */

function updateSelectedCount() {

    let selected = $('.recordCheckbox:checked').length;

    if (selected > 0) {

        $('#selectedCount')
            .text(selected + ' Selected')
            .show();

        $('#deleteSelectedBtn').show();

    } else {

        $('#selectedCount').hide();

        $('#deleteSelectedBtn').hide();

    }

}


/* ================= CONFIRM DELETE ================= */

function confirmBulkDelete() {

    let selected = $('.recordCheckbox:checked').length;

    if (selected === 0) {

        alert('Please select at least one record.');

        return false;

    }


    let confirmation = confirm(
        'Are you sure you want to permanently delete ' +
        selected +
        ' selected record(s)?\n\nThis action cannot be undone.'
    );


    if (confirmation) {

        $('#bulkDeleteForm').submit();

    }

}


/* ================= SEARCH ================= */

$('#searchBtn').click(function () {

    let search = $('#search').val();

    let from = $('#fromDate').val();

    let to = $('#toDate').val();


    let url = 'total-entry.php?search='
        + encodeURIComponent(search);


    if (from) {

        url += '&from='
            + encodeURIComponent(from);

    }


    if (to) {

        url += '&to='
            + encodeURIComponent(to);

    }


    window.location.href = url;

});


/* ================= DOWNLOAD ================= */

$('#downloadBtn').click(function () {

    let search = $('#search').val();

    let from = $('#fromDate').val();

    let to = $('#toDate').val();


    let url = 'download_records.php?search='
        + encodeURIComponent(search);


    if (from) {

        url += '&from='
            + encodeURIComponent(from);

    }


    if (to) {

        url += '&to='
            + encodeURIComponent(to);

    }


    window.location.href = url;

});

</script>

</body>
</html>

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