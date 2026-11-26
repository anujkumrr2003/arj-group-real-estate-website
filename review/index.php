<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Review - Modern Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
      background: var(--primary-gradient);
      min-height: 100vh;
      padding: 20px;
      position: relative;
      overflow-x: hidden;
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

    .container {
      max-width: 100%;
      padding: 0 15px;
    }

    .review-form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 40px);
    }

    .review-form {
      background: var(--glass-bg);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-radius: 24px;
      border: 1px solid var(--glass-border);
      box-shadow: var(--shadow-light);
      padding: 40px;
      width: 100%;
      max-width: 600px;
      position: relative;
      transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
      overflow: hidden;
    }

    .review-form::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--secondary-gradient);
      border-radius: 24px 24px 0 0;
    }

    .review-form:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-hover);
    }

    .form-header {
      text-align: center;
      margin-bottom: 35px;
      position: relative;
    }

    .form-header h1 {
      font-size: 2.5rem;
      font-weight: 700;
      background: var(--secondary-gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
      line-height: 1.2;
    }

    .form-header p {
      color: var(--text-secondary);
      font-size: 1.1rem;
      font-weight: 400;
    }

    .form-group {
      margin-bottom: 25px;
      position: relative;
    }

    .form-label {
      display: block;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 8px;
      font-size: 0.95rem;
      letter-spacing: 0.5px;
    }

    .form-label i {
      margin-right: 8px;
      color: #667eea;
    }

    .form-control, .form-select {
      width: 100%;
      padding: 16px 20px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 16px;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      font-size: 1rem;
      font-weight: 400;
      color: var(--text-primary);
      transition: all 0.3s ease;
      outline: none;
    }

    .form-control:focus, .form-select:focus {
      border-color: #667eea;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
      transform: translateY(-2px);
    }

    .form-control::placeholder {
      color: var(--text-secondary);
      font-weight: 300;
    }

    textarea.form-control {
      resize: vertical;
      min-height: 120px;
    }

    .rating-options {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 12px;
      margin-top: 8px;
    }

    .rating-option {
      position: relative;
    }

    .rating-option input[type="radio"] {
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    .rating-label {
      display: flex;
      align-items: center;
      padding: 12px 16px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.7);
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .rating-label:hover {
      background: rgba(255, 255, 255, 0.9);
      transform: translateY(-2px);
    }

    .rating-option input[type="radio"]:checked + .rating-label {
      background: var(--secondary-gradient);
      color: white;
      border-color: transparent;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .rating-stars {
      font-size: 1.2rem;
      margin-right: 8px;
    }

    .file-upload-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
      width: 100%;
    }

    .file-upload-input {
      position: absolute;
      left: -9999px;
      opacity: 0;
    }

    .file-upload-label {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      border: 2px dashed rgba(102, 126, 234, 0.4);
      border-radius: 16px;
      background: rgba(255, 255, 255, 0.5);
      cursor: pointer;
      transition: all 0.3s ease;
      text-align: center;
      font-weight: 500;
      color: var(--text-primary);
    }

    .file-upload-label:hover {
      border-color: #667eea;
      background: rgba(255, 255, 255, 0.8);
      transform: translateY(-2px);
    }

    .file-upload-label i {
      font-size: 2rem;
      margin-bottom: 8px;
      color: #667eea;
    }

    .submit-btn {
      width: 100%;
      padding: 18px;
      border: none;
      border-radius: 16px;
      background: var(--secondary-gradient);
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .submit-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .submit-btn:hover::before {
      left: 100%;
    }

    .submit-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .submit-btn:active {
      transform: translateY(-1px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      body {
        padding: 15px;
      }

      .review-form {
        padding: 30px 25px;
        border-radius: 20px;
      }

      .form-header h1 {
        font-size: 2rem;
      }

      .rating-options {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 10px;
      }

      .review-form {
        padding: 25px 20px;
        border-radius: 16px;
      }

      .form-header h1 {
        font-size: 1.8rem;
      }

      .form-control, .form-select {
        padding: 14px 16px;
      }

      .submit-btn {
        padding: 16px;
        font-size: 1rem;
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
      background: var(--secondary-gradient);
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: linear-gradient(135deg, #f5576c 0%, #f093fb 100%);
    }

    /* Animation for form elements */
    .form-group {
      opacity: 0;
      transform: translateY(20px);
      animation: slideInUp 0.6s ease forwards;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }

    @keyframes slideInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="review-form-wrapper">
      <form action="insert_review.php" method="POST" enctype="multipart/form-data" class="review-form">
        <div class="form-header">
            <h2 style="color:#fff;">Share Your Experience</</h2>
          <p style="color:#fff;">Your feedback helps us improve and grow</p>
        </div>

        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-user"></i>Full Name
          </label>
          <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-comment-alt"></i>Your Review
          </label>
          <textarea name="description" class="form-control" rows="4" placeholder="Share your thoughts and experience with us..." required></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-star"></i>Rate Your Experience
          </label>
          <div class="rating-options">
            <div class="rating-option">
              <input type="radio" id="rating5" name="rating" value="5" required>
              <label for="rating5" class="rating-label">
                <span class="rating-stars">⭐⭐⭐⭐⭐</span>
                <!--<span>Excellent</span>-->
              </label>
            </div>
            <div class="rating-option">
              <input type="radio" id="rating4" name="rating" value="4" required>
              <label for="rating4" class="rating-label">
                <span class="rating-stars">⭐⭐⭐⭐</span>
                <!--<span>Very Good</span>-->
              </label>
            </div>
            <div class="rating-option">
              <input type="radio" id="rating3" name="rating" value="3" required>
              <label for="rating3" class="rating-label">
                <span class="rating-stars">⭐⭐⭐</span>
                <!--<span>Good</span>-->
              </label>
            </div>
            <div class="rating-option">
              <input type="radio" id="rating2" name="rating" value="2" required>
              <label for="rating2" class="rating-label">
                <span class="rating-stars">⭐⭐</span>
                <!--<span>Fair</span>-->
              </label>
            </div>
            <div class="rating-option">
              <input type="radio" id="rating1" name="rating" value="1" required>
              <label for="rating1" class="rating-label">
                <span class="rating-stars">⭐</span>
                <!--<span>Poor</span>-->
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-image"></i>Add Photo (Optional)
          </label>
          <div class="file-upload-wrapper">
            <input type="file" name="image" class="file-upload-input" id="imageUpload" accept="image/*">
            <label for="imageUpload" class="file-upload-label">
              <div>
                <i class="fas fa-cloud-upload-alt"></i>
                <div>Click to upload or drag and drop</div>
                <small>PNG, JPG, GIF up to 10MB</small>
              </div>
            </label>
          </div>
        </div>

        <!-- Submit Button -->
<button type="submit" class="submit-btn" onclick="return confirmSubmit()">
  <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
  Submit Review
</button>

<!-- Confirmation Script -->
<script>
function confirmSubmit() {
  return confirm("Are you sure you want to submit your review?");
}
</script>
      </form>
    </div>
  </div>

  <script>
    // File upload preview
    document.getElementById('imageUpload').addEventListener('change', function(e) {
      const file = e.target.files[0];
      const label = document.querySelector('.file-upload-label div');
      
      if (file) {
        label.innerHTML = `
          <i class="fas fa-check-circle" style="color: #28a745;"></i>
          <div>${file.name}</div>
          <small>File selected successfully</small>
        `;
      }
    });

    // Form validation and submission
    document.querySelector('.review-form').addEventListener('submit', function(e) {
      const submitBtn = document.querySelector('.submit-btn');
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Submitting...';
      submitBtn.disabled = true;
    });

    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
  </script>

</body>
</html>