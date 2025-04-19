<!-- filepath: c:\xampp\htdocs\php\project\sda\contribute.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['dataFile']) && $_FILES['dataFile']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['dataFile']['name']);

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $uploadFile)) {
            $message = "Thank you for contributing! Your file has been uploaded successfully.";
        } else {
            $message = "Failed to upload the file. Please try again.";
        }
    } else {
        $message = "No file uploaded or an error occurred.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribute Data | DropTrace</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
        }
        .bg-primary {
            background-color: #08141B;
        }
        .bg-secondary {
            background-color: #11212D;
        }
        .bg-tertiary {
            background-color: #233745;
        }
        .bg-accent {
            background-color: #4A5C6A;
        }
        .text-light {
            color: #9BAAAB;
        }
        .text-lighter {
            color: #CCD0CF;
        }
        .hover\:bg-tertiary:hover {
            background-color: #233745;
        }
    </style>
</head>
<body class="bg-secondary text-light font-sans">
    <!-- Navigation -->
    <nav class="bg-primary text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-2xl text-accent mr-2"></i>
                    <span class="font-semibold text-xl">DropTrace</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-light hover:text-white">Home</a>
                    <a href="analysis.php" class="text-light hover:text-white">Analysis</a>
                    <a href="intervensions.php" class="text-light hover:text-white">Interventions</a>
                    <a href="aboutus.php" class="text-light hover:text-white font-medium">About Us</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="text-light hover:text-white">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-accent hover:bg-tertiary text-white px-4 py-2 rounded">Login</a>
                    <?php endif; ?>
                </div>
                <button class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold text-center text-accent mb-6">Contribute Dropout Data</h1>
        <p class="text-xl text-center text-lighter mb-8">
            Help us improve our analysis by contributing dropout data. Your contributions will help us create better insights and solutions.
        </p>

        <!-- Display message -->
        <?php if (isset($message)): ?>
            <div class="text-center mb-6">
                <div class="bg-<?php echo strpos($message, 'successfully') !== false ? 'green' : 'red'; ?>-100 text-<?php echo strpos($message, 'successfully') !== false ? 'green' : 'red'; ?>-700 p-4 rounded">
                    <?php echo $message; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Upload Form -->
        <div class="flex justify-center">
            <form action="contribute.php" method="POST" enctype="multipart/form-data" class="bg-tertiary p-6 rounded-lg shadow-md w-full max-w-lg">
                <div class="mb-4">
                    <label for="dataFile" class="block text-lighter font-medium mb-2">Choose a CSV file:</label>
                    <input type="file" name="dataFile" id="dataFile" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-accent">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-accent hover:bg-tertiary text-white font-medium py-2 px-6 rounded">
                        Upload File
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer class="bg-primary text-white py-12 mt-28">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <p>&copy; <?= date('Y') ?> DropTrace. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
    </footer>
</body>
</html>