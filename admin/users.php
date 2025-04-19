<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Dashboard - AYUSH Herb</title>
    <script src="../script.js"></script>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['user_email']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
        header("Location: ../login/login.php");
        exit();
    }
    $user_email = $_SESSION['user_email'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "ayush_herb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

    <!-- Navigation Bar -->
    <nav class="flex justify-between p-4 shadow relative w-full bg-white top-0 z-50 flex-grow md:hidden">
        <div class="text-4xl text-green-800 font-semibold font-mono">
            <a href="../index.html">
               AYUSH Herb
            </a>
        </div>
        <div class="hidden sm:flex space-x-6 text-green-900 text-lg">
            <a href="../index.html"><div class="hover:underline hover:text-green-500">Home</div></a>
            <a href="../login/login.php"><div class="hover:underline hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="hover:underline hover:text-green-500">Health</div></a>
            <a href="../Dashboard/community.php"><div class="hover:underline hover:text-green-500">Community</div></a>
            <a href="../Dashboard/dashboard.php"><div class="hover:underline hover:text-green-500">Dashboard</div></a>
            <a href="./admin.php"><div class="hover:underline hover:text-green-500">Admin</div></a>
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
        <div class="hidden flex-col bg-white absolute top-14 left-0 w-full shadow-md sm:hidden" id="mobile-menu">
            <a href="../index.html"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Home</div></a>
            <a href="../login/login.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Health</div></a>
            <a href="../Dashboard/community.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Community</div></a>
            <a href="../Dashboard/dashboard.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Dashboard</div></a>
            <a href="./admin.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Admin</div></a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-green-900 text-white flex flex-col w-64 p-5 h-screen hidden md:flex fixed">
            <div>
                <h1 class="text-3xl font-bold">AYUSH Herb</h1>
            </div>
            <div class="space-y-8 text-[21px] flex flex-col mt-10 flex-grow">
                <a href="../index.html">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pt-2 pb-2">
                        <div><i class="fa-solid fa-house"></i></div>
                        <div><h2>Home</h2></div>
                    </div>
                </a>
                <a href="../Dashboard/dashboard.php">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pt-2 pb-2">
                        <div><i class="fa-solid fa-user"></i></div>
                        <div><h2>User Dashboard</h2></div>
                    </div>
                </a>
                <a href="./users.php">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pt-2 pb-2">
                        <div><i class="fa-solid fa-users"></i></div>
                        <div><h2>Manage Users</h2></div>
                    </div>
                </a>
                <a href="../admin/admin.php">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pt-2 pb-2">
                        <div><i class="fa-solid fa-leaf"></i></div>
                        <div><h2>Manage Herbs</h2></div>
                    </div>
                </a>
                <a href="../Dashboard/community.php">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pr-2 pt-2 pb-2">
                        <div><i class="fa-solid fa-comments"></i></div>
                        <div><h2>Community Forum</h2></div>
                    </div>
                </a>
            </div>
            <a href="../login/logout.php">
                <div class="flex justify-center mt-auto">
                    <button class="bg-red-400 hover:bg-red-500 py-2 px-20 rounded-md font-semibold">Logout</button>
                </div>
            </a>
        </div>

        <div class="flex-1 mx-auto p-7 w-full md:ml-64">
    <div class="text-3xl">
        <h1 class="text-green-900 font-bold">Admin Dashboard, <?php echo htmlspecialchars($user_email); ?></h1>
    </div>

    <!-- Manage Users Card -->
    <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-4 shadow-md mt-8">
        <div class="text-green-900 text-4xl flex gap-6">
            <i class="fa-solid fa-users"></i>
            <p class="text-green-900 text-3xl font-bold">Manage Users</p>
        </div>
        <div class="flex justify-between">
            <div class="text-gray-600 text-lg"><p>View users, admins, their posts, or delete them.</p></div>
        </div>

        <!-- Search Form -->
        <div class="mt-4">
            <form method="GET" class="flex gap-4">
                <input type="email" name="search_email" class="p-2 border rounded-xl border-green-300 placeholder:text-gray-400 w-full md:w-1/3" placeholder="Search by email..." value="<?php echo isset($_GET['search_email']) ? htmlspecialchars($_GET['search_email']) : ''; ?>">
                <button type="submit" class="px-4 py-2 bg-green-800 text-white rounded-xl hover:bg-green-900 transition-colors duration-200">
                    <i class="fa-solid fa-magnifying-glass mr-2"></i>Search
                </button>
                <?php if (isset($_GET['search_email']) && !empty($_GET['search_email'])) { ?>
                    <a href="users.php" class="px-4 py-2 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-colors duration-200">Clear Search</a>
                <?php } ?>
            </form>
        </div>

        <?php
        // Handle delete post
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_post'])) {
            $post_id = $_POST['post_id'];
            $stmt = $conn->prepare("DELETE FROM forum_posts WHERE id = ?");
            $stmt->bind_param("i", $post_id);
            if ($stmt->execute()) {
                echo '<p class="text-green-600 mt-2">Post deleted successfully!</p>';
            } else {
                echo '<p class="text-red-600 mt-2">Error deleting post!</p>';
            }
            $stmt->close();
        }

        // Handle delete user and their posts
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user_completely'])) {
            $email = $_POST['email'];

            // Delete from forum_posts
            $stmt1 = $conn->prepare("DELETE FROM forum_posts WHERE user_email = ?");
            $stmt1->bind_param("s", $email);
            $stmt1->execute();
            $stmt1->close();

            // Delete from users
            $stmt2 = $conn->prepare("DELETE FROM users WHERE email = ?");
            $stmt2->bind_param("s", $email);
            if ($stmt2->execute()) {
                echo '<p class="text-green-600 mt-2">User and their posts deleted successfully!</p>';
            } else {
                echo '<p class="text-red-600 mt-2">Error deleting user!</p>';
            }
            $stmt2->close();
        }

        // Determine if a search is active
        $search_email = isset($_GET['search_email']) ? trim($_GET['search_email']) : '';
        $is_search = !empty($search_email);

        // Users Section
        echo "<h2 class='text-xl font-bold text-green-800 mt-6'>Users</h2>";

        if ($is_search) {
            // Search for user by email in users and forum_posts
            $stmt = $conn->prepare("SELECT DISTINCT email FROM users WHERE email = ? UNION SELECT DISTINCT user_email AS email FROM forum_posts WHERE user_email = ?");
            $stmt->bind_param("ss", $search_email, $search_email);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            // Fetch all users
            $result = $conn->query("SELECT DISTINCT email FROM users");
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $email = htmlspecialchars($row['email']);
                echo '<div class="mt-4 bg-white p-4 rounded shadow">';
                echo "<h3 class='text-green-800 font-semibold'>$email</h3>";

                // Fetch user posts
                $stmt = $conn->prepare("SELECT id, content FROM forum_posts WHERE user_email = ?");
                $stmt->bind_param("s", $row['email']);
                $stmt->execute();
                $posts = $stmt->get_result();

                if ($posts->num_rows > 0) {
                    while ($post = $posts->fetch_assoc()) {
                        echo '<div class="flex justify-between items-center border-t pt-2 mt-2">';
                        echo '<span class="text-gray-700">' . htmlspecialchars($post['content']) . '</span>';
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="post_id" value="' . $post['id'] . '">';
                        echo '<button type="submit" name="delete_post" class="text-red-500 hover:text-red-700 ml-4"><i class="fa-solid fa-trash"></i></button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-gray-500 mt-2">No posts found for this user.</p>';
                }

                echo '<form method="POST" class="mt-4">';
                echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
                echo '<button type="submit" name="delete_user_completely" class="text-white bg-red-500 px-4 py-2 rounded hover:bg-red-700">Delete User & Posts</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-gray-600 mt-2">' . ($is_search ? 'No users or posts found for this email.' : 'No users found.') . '</p>';
        }
        if ($is_search) {
            $stmt->close();
        }

        // Admins Section 
        if (!$is_search) {
            echo "<h2 class='text-xl font-bold text-green-800 mt-10'>Admins</h2>";
            $admin_result = $conn->query("SELECT DISTINCT email FROM admins");
            if ($admin_result->num_rows > 0) {
                while ($admin = $admin_result->fetch_assoc()) {
                    $admin_email = htmlspecialchars($admin['email']);
                    echo '<div class="mt-4 bg-white p-4 rounded shadow">';
                    echo "<h3 class='text-green-800 font-semibold'>$admin_email (Admin)</h3>";

                    // Admin's posts
                    $stmt = $conn->prepare("SELECT id, content FROM forum_posts WHERE user_email = ?");
                    $stmt->bind_param("s", $admin['email']);
                    $stmt->execute();
                    $admin_posts = $stmt->get_result();

                    if ($admin_posts->num_rows > 0) {
                        while ($post = $admin_posts->fetch_assoc()) {
                            echo '<div class="flex justify-between items-center border-t pt-2 mt-2">';
                            echo '<span class="text-gray-700">' . htmlspecialchars($post['content']) . '</span>';
                            echo '<form method="POST">';
                            echo '<input type="hidden" name="post_id" value="' . $post['id'] . '">';
                            echo '<button type="submit" name="delete_post" class="text-red-500 hover:text-red-700 ml-4"><i class="fa-solid fa-trash"></i></button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-500 mt-2">No posts found for this admin.</p>';
                    }

                    echo '</div>';
                }
            } else {
                echo '<p class="text-gray-600 mt-2">No admins found.</p>';
            }
        }
        ?>
    </div>
</div>
</body>
</html>
