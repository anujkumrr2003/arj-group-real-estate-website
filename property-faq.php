<?php
include "config.php";

$ck_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($ck_id <= 0) {
    echo "Invalid property ID.";
    exit;
}

// Fetch property details
$stmt = $conn->prepare("SELECT video, main_image FROM ck WHERE id = ?");
$stmt->bind_param("i", $ck_id);
$stmt->execute();
$stmt->bind_result($video, $main_image);
$stmt->fetch();
$stmt->close();

// Fetch FAQs
$faqs = $conn->query("SELECT question, answer FROM faq WHERE ck_id = $ck_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($video) ?> - FAQs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <a href="view-faq.php" class="btn btn-secondary mb-4">← Back to Property List</a>

    <!-- Property Info -->
    <div class="row mb-4">
        <div class="col-md-6">
            <?php if (!empty($main_image)): ?>
                <img src="uploads/<?= htmlspecialchars($main_image) ?>" class="img-fluid rounded shadow" alt="Property Image">
            <?php else: ?>
                <p>No image available.</p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <h2><?= htmlspecialchars($video) ?></h2>
        </div>
    </div>

    <!-- FAQs -->
    <h4 class="mb-3">Frequently Asked Questions</h4>
    <div class="row">
        <?php if ($faqs->num_rows > 0): ?>
            <?php while ($faq = $faqs->fetch_assoc()): ?>
                <div class="col-md-6 mb-4">
                    <div class="p-3 border rounded shadow-sm bg-light" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h5 itemprop="name" class="fw-bold" style="color:#e73b0b;">Q. <?= htmlspecialchars($faq['question']) ?></h5>
                        <div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                            <p itemprop="text"><?= htmlspecialchars($faq['answer']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-danger">No FAQs found for this property.</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
