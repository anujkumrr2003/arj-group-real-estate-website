<?php
require '../config.php'; // include DB connection

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $rating = (int)$_POST['rating'];

    $imageName = ''; // start empty

    // Handle optional image upload
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $imageName;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Try moving uploaded file
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $imageName = ''; // reset to empty if upload fails
        }
    }

    // Insert into database
    $sql = "INSERT INTO user_reviews (name, description, rating, image)
            VALUES ('$name', '$description', '$rating', '$imageName')";

    if (mysqli_query($conn, $sql)) {
        $message = "Review submitted successfully! Thank you for your feedback.";
        $messageType = "success";
    } else {
        $message = "Error: " . mysqli_error($conn);
        $messageType = "error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --success-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --error-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.18);
            --text-primary: #2d3748;
            --text-secondary: #718096;
            --shadow-light: 0 8px 32px rgba(31, 38, 135, 0.37);
            --shadow-hover: 0 15px 35px rgba(31, 38, 135, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--success-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body.error-bg {
            background: var(--error-gradient);
        }

        /* Animated background elements */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .alert-container {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow-light);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            position: relative;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            animation: slideInUp 0.6s ease-out;
        }

        .alert-container:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .alert-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--success-gradient);
            border-radius: 24px 24px 0 0;
        }

        .alert-container.error::before {
            background: var(--error-gradient);
        }

        .alert-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            animation: bounce 1s ease-in-out;
        }

        .success-icon {
            color: #48bb78;
        }

        .error-icon {
            color: #f56565;
        }

        .alert-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .alert-message {
            font-size: 1.1rem;
            color: var(--text-secondary);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            min-width: 140px;
            justify-content: center;
        }

        .btn-primary {
            background: var(--success-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.8);
            color: var(--text-primary);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.95);
            transform: translateY(-2px);
            color: var(--text-primary);
            text-decoration: none;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            margin-top: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--success-gradient);
            border-radius: 2px;
            animation: progressFill 3s ease-in-out;
        }

        @keyframes progressFill {
            from { width: 0%; }
            to { width: 100%; }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .alert-container {
                padding: 30px 25px;
                margin: 20px;
            }

            .alert-title {
                font-size: 1.5rem;
            }

            .alert-message {
                font-size: 1rem;
            }

            .btn-group {
                flex-direction: column;
                gap: 12px;
            }

            .btn {
                width: 100%;
                padding: 12px 24px;
            }
        }

        @media (max-width: 480px) {
            .alert-container {
                padding: 25px 20px;
                margin: 15px;
            }

            .alert-icon {
                font-size: 3rem;
            }

            .alert-title {
                font-size: 1.3rem;
            }

            .alert-message {
                font-size: 0.95rem;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--success-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
    </style>
</head>
<body <?php echo ($messageType === 'error') ? 'class="error-bg"' : ''; ?>>

    <?php if (!empty($message)): ?>
        <div class="alert-container <?php echo $messageType; ?>">
            <div class="alert-icon">
                <?php if ($messageType === 'success'): ?>
                    <i class="fas fa-check-circle success-icon"></i>
                <?php else: ?>
                    <i class="fas fa-exclamation-triangle error-icon"></i>
                <?php endif; ?>
            </div>
            
            <h2 class="alert-title">
                <?php echo ($messageType === 'success') ? 'Success!' : 'Oops! Something went wrong'; ?>
            </h2>
            
            <p class="alert-message">
                <?php echo htmlspecialchars($message); ?>
            </p>
            
            <div class="btn-group">
                <!--<a href="add_review.html" class="btn btn-secondary">-->
                <!--    <i class="fas fa-plus"></i>-->
                <!--    Add Another Review-->
                <!--</a>-->
                <a href="https://arjgroup.in/review/" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    Go to Homepage
                </a>
            </div>
            
            <?php if ($messageType === 'success'): ?>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            <?php endif; ?>
        </div>

        <script>
            // Auto redirect after successful submission
            <?php if ($messageType === 'success'): ?>
                setTimeout(function() {
                    if (confirm('🎉 Thank you for your review! Would you like to go back to the homepage?')) {
                        window.location.href = 'https://arjgroup.in/';
                    }
                }, 3000);
            <?php endif; ?>

            // Confirmation popup for navigation
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.href.includes('https://arjgroup.in/review/')) {
                        e.preventDefault();
                        if (confirm('🏠 Are you sure you want to go to the homepage?')) {
                            window.location.href = this.href;
                        }
                    } else if (this.href.includes('https://arjgroup.in/review/')) {
                        e.preventDefault();
                        if (confirm('📝 Would you like to add another review?')) {
                            window.location.href = this.href;
                        }
                    }
                });
            });

            // Add some interactive effects
            document.querySelector('.alert-container').addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });

            document.querySelector('.alert-container').addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        </script>

    <?php else: ?>
        <div class="alert-container">
            <div class="alert-icon">
                <i class="fas fa-info-circle" style="color: #4299e1;"></i>
            </div>
            
            <h2 class="alert-title">No Action Performed</h2>
            
            <p class="alert-message">
                Please submit the review form to see the results.
            </p>
            
            <div class="btn-group">
                <a href="https://arjgroup.in/review/" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    Go to Review Form
                </a>
            </div>
        </div>
    <?php endif; ?>

</body>
</html>