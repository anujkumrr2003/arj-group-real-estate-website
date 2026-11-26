<?php
include "config.php";

// Get selected ck_id
$ck_id = isset($_GET['ck_id']) ? intval($_GET['ck_id']) : 0;

// Fetch all ck entries
$ck_videos = $conn->query("SELECT id, video, main_image FROM ck");

// Get selected video title
$video_title = '';
if ($ck_id > 0) {
    $stmt = $conn->prepare("SELECT video FROM ck WHERE id = ?");
    $stmt->bind_param("i", $ck_id);
    $stmt->execute();
    $stmt->bind_result($video_title);
    $stmt->fetch();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQs by Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .property-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h2 class="text-center mb-4">Select Property to View FAQs</h2>

    <!-- CK Cards Section -->
    <div class="row mb-5">
        <?php
        // Reset pointer
        $ck_videos->data_seek(0);
        while ($ck = $ck_videos->fetch_assoc()):
        ?>
            <div class="col-md-4 mb-4">
                <a href="property-faq.php?id=<?= $ck['id'] ?>" class="text-decoration-none text-dark">
                    <div class="card property-card shadow-sm">
                        <?php if (!empty($ck['main_image'])): ?>
                            <img src="uploads/<?= htmlspecialchars($ck['main_image']) ?>" class="card-img-top" alt="Property Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($ck['video']) ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- FAQs Section -->
    <div class="row">
        <?php if ($ck_id > 0): ?>
            <h4 class="mb-4">FAQs for: <?= htmlspecialchars($video_title) ?></h4>
            <?php
            $faq_query = $conn->query("SELECT question, answer FROM faq WHERE ck_id = $ck_id");
            if ($faq_query->num_rows > 0):
                while ($faq = $faq_query->fetch_assoc()):
            ?>
                <div class="col-md-6 mb-4">
                    <div class="p-3 border rounded shadow-sm bg-light" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h5 itemprop="name" class="fw-bold" style="color:#e73b0b;">Q. <?= htmlspecialchars($faq['question']) ?></h5>
                        <div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                            <p itemprop="text"><?= htmlspecialchars($faq['answer']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            else: ?>
                <div class="col-12 text-danger">No FAQs found for this property.</div>
            <?php endif; ?>
        <?php else: ?>
            <div class="col-12 alert alert-info text-center">Click on a property above to view its FAQs.</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
