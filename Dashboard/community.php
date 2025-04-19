<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Community Forum - AYUSH Herb</title>
    <script src="../script.js"></script>
</head>
<body class="bg-gray-100">
    <?php
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("Location: ../login/login.php");
        exit();
    }
    $user_email = $_SESSION['user_email'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "ayush_herb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle post submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_submit'])) {
        $content = trim($_POST['content']);
        if (empty($content)) {
            $error = "Please fill out this field.";
        } else {
            $stmt = $conn->prepare("INSERT INTO forum_posts (user_email, content) VALUES (?, ?)");
            $stmt->bind_param("ss", $user_email, $content);
            if ($stmt->execute()) {
                $success = "Post submitted successfully!";
            } else {
                $error = "Error submitting post.";
            }
            $stmt->close();
        }
    }
    ?>

    <!-- Navigation Bar -->
    <nav class="flex justify-between p-4 shadow relative w-full bg-white top-0 z-50 flex-grow">
        <div class="text-4xl text-green-800 font-semibold font-mono">
            <a href="../index.html">
               AYUSH Herb
            </a>
        </div>
        <div class=" space-x-6 text-green-900 text-lg hidden md:flex">
            <a href="../index.html"><div class="hover:underline hover:text-green-500">Home</div></a>
            <a href="../login/login.php"><div class="hover:underline hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="hover:underline hover:text-green-500">Health</div></a>
            <a href="./community.php"><div class="hover:underline text-green-500">Community</div></a>
            <a href="./dashboard.php"><div class="hover:underline hover:text-green-500">Dashboard</div></a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
                <a href="../admin/admin1.php"><div class="hover:underline hover:text-green-500">Admin</div></a>
            <?php } ?>
        </div>
        <div class="md:hidden cursor-pointer" id="menu-btn">
            <i class="fa-solid fa-bars text-xl"></i>
        </div>
        <div class="hidden lg:flex space-x-3">
            <i class="fa-solid fa-magnifying-glass my-auto text-lg text-green-800"></i>
            <input type="text" class="flex-grow p-2 border rounded-xl border-green-300 placeholder:text-gray-400" placeholder="Search for plants...">
            <button class="px-4 py-2 border border-green-800 text-green-800 rounded-xl bg-green-50 hover:bg-green-800 hover:text-white transition-colors duration-200">
                <i class="fa-solid fa-question-circle mr-2"></i>Quiz
            </button>
        </div>
        <div class="flex-col bg-white absolute top-14 left-0 w-full shadow-md md:hidden" id="mobile-menu">
            <a href="../index.html"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Home</div></a>
            <a href="../login/login.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Health</div></a>
            <a href="./community.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Community</div></a>
            <a href="./dashboard.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Dashboard</div></a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
                <a href="../dashboard/admin1.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Admin</div></a>
            <?php } ?>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto mt-16 p-6">
        <h1 class="text-3xl text-green-900 font-bold text-center mb-6">Community Forum</h1>

        <!-- Post Form -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <form method="POST">
                <textarea name="content" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" 
                          placeholder="Ask a question or share your thoughts..."></textarea>
                <?php if (isset($error)) { ?>
                    <p class="text-red-500 text-sm mt-2"><?php echo $error; ?></p>
                <?php } elseif (isset($success)) { ?>
                    <p class="text-green-500 text-sm mt-2"><?php echo $success; ?></p>
                <?php } ?>
                <div class="flex justify-end mt-4">
                    <button type="submit" name="post_submit" class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors">Post</button>
                </div>
            </form>
        </div>

        <!-- Latest Posts -->
        <div class="space-y-4">
            <?php
            $result = $conn->query("SELECT user_email, content, created_at, upvotes, downvotes, replies FROM forum_posts ORDER BY created_at DESC LIMIT 5");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $formatted_date = date("n/j/Y, g:i:s A", strtotime($row['created_at']));
                    ?>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center mr-3">
                                <span class="text-lg"><?php echo strtoupper(substr($row['user_email'], 0, 1)); ?></span>
                            </div>
                            <div>
                                <p class="text-gray-800 font-semibold"><?php echo htmlspecialchars($row['user_email']); ?></p>
                                <p class="text-gray-500 text-sm"><?php echo $formatted_date; ?></p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4"><?php echo htmlspecialchars($row['content']); ?></p>
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-4">
                                <span class="text-gray-600"><i class="fa-solid fa-thumbs-up"></i> <?php echo $row['upvotes']; ?></span>
                                <span class="text-gray-600"><i class="fa-solid fa-thumbs-down"></i> <?php echo $row['downvotes']; ?></span>
                            </div>
                            <div>.</div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-gray-600 text-center">No posts yet. Be the first to share!</p>';
            }
            ?>
        </div>
    </div>


    
<!-- Footer Section -->
<footer class=" text-green-800 py-12 px-6 md:px-10 lg:px-20 shadow-xl border-t-2 border mt-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 items-center">
        
        <div class="flex justify-center lg:justify-start">
            <h1 class="text-6xl font-bold font-sans">AYUSH Herb</h1>
        </div>

        
        <div class="text-center lg:text-left">
            <div class="flex items-center justify-center lg:justify-start mb-4">
                <i class="fa-solid fa-location-dot text-green-800 text-2xl mr-4"></i>
                <p class="text-lg text-green-800">
                    <span class="block">Lovely Professional University,</span>
                    Jalandhar, 144411 (Punjab)
                </p>
            </div>
            <div class="flex items-center justify-center lg:justify-start mb-4">
                <i class="fa-solid fa-envelope text-green-800 text-2xl mr-4"></i>
                <p class="text-lg text-green-800">ayushherb@gmail.com</p>
            </div>
        </div>

        
        <div class="text-center lg:text-left">
            <span class="text-xl font-bold text-green-800">Technology Stack Used:</span>
            <div class="flex justify-center lg:justify-start mt-6 space-x-6">
                <a href="#" class="text-4xl hover:text-green-600">
                    <i class="fab fa-node-js text-4xl text-green-500"></i>
                </a>
                <a href="#" class="text-4xl hover:text-green-600">
                    <i class="fas fa-database text-4xl text-yellow-500"></i>
                </a>
                
                <a href="#" class="text-4xl hover:text-green-600">
                    <i class="fab fa-css3-alt text-4xl text-blue-600 "></i>
                </a>
                <a href="#" class="text-4xl hover:text-green-600">
                    <i class="fa-brands fa-php text-5xl text-blue-500"></i>
                </a>
            </div>
        </div>

    </div>

    
    <h3 class="text-center mt-10 pt-6 border-t-2 border-gray-300 text-lg font-medium italic bold  gap-1 ">
                © Copyright 2025 AYUSH Herb - All Rights Reserved. Designed and Developed by 
                <a href="https://github.com/2784alok" target="_blank" class=" hover:text-red-600 font-medium hover:font-semibold transition-transform duration-200 hover:scale-105">
                    Alok </a> , 
                <a href="https://github.com/Arun0041" target="_blank" class=" hover:text-red-600 font-medium hover:font-semibold transition-transform duration-200 hover:scale-105">
                    Arun </a> , 
                <a href="https://github.com/mkaifiqbal" target="_blank" class=" hover:text-red-600 font-medium hover:font-semibold transition-transform duration-200 hover:scale-105">
                    Mohammad Kaif</a>  & 
                <a href="https://github.com/Gaurav1A2B" target="_blank" class=" hover:text-red-600 font-medium hover:font-semibold transition-transform duration-200 hover:scale-105">
                    Gaurav </a>
            </h3>
</footer>

    <?php $conn->close(); ?>
</body>
</html>
