   <!-- Total Applications -->
    <?php include'config.php';?>
   <div class="mt-5">
            <?php
            $sql = "SELECT COUNT(*) AS total FROM enquiry";
            $result = $conn->query($sql);
            $totalApplications = ($result && $row = $result->fetch_assoc()) ? $row['total'] : 0;
            ?>
            <h4>Total Applications: <?= $totalApplications; ?></h4>
        </div>

        <!-- Applications Table -->
        <?php
        $sql = "SELECT * FROM enquiry ORDER BY id DESC";
        $result = $conn->query($sql);
        ?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Resume</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['first']); ?></td>
                            <td><?= htmlspecialchars($row['last']); ?></td>
                            <td><?= htmlspecialchars($row['mobile']); ?></td>
                            <td><?= htmlspecialchars($row['email12']); ?></td>
                            <td>
                                <a href="<?= htmlspecialchars($row['file']); ?>" download>Download PDF</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No applications found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
