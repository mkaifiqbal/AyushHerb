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

        <!-- Main Content Area -->
        <div class=" flex-1 mx-auto p-7 w-full md:ml-64">
            <div class="text-3xl">
                <h1 class="text-green-900 font-bold">Admin Dashboard, <?php echo htmlspecialchars($user_email); ?></h1>
            </div>

            <div class="grid grid-rows lg:grid-cols-4 gap-5 mt-10">
                <!-- Manage Herbs Card (Insert Herb Data) -->
                <a href="../admin/admin.php">
                <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl hover:transition-transform">
                    <div class="text-green-900 text-4xl"><i class="fa-solid fa-leaf"></i></div>
                    <div class="text-green-900 text-xl font-bold"><h1>Manage Herbs</h1></div>
                    <div class="text-gray-600 text-lg"><p>Add new herb details.</p></div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['herb_submit'])) {
                        $name = $_POST['name'];
                        $region = $_POST['region'];
                        $common_name = $_POST['common_name'];
                        $type = $_POST['type'];
                        $botanical_name = $_POST['botanical_name'];
                        $medicinal_use = $_POST['medicinal_use'];
                        $cultivation = $_POST['cultivation'];

                        $stmt = $conn->prepare("INSERT INTO herbs (name, region, common_name, type, botanical_name, medicinal_use, cultivation) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssss", $name, $region, $common_name, $type, $botanical_name, $medicinal_use, $cultivation);
                        if ($stmt->execute()) {
                            echo '<p class="text-green-600 mt-2">Herb added successfully!</p>';
                        } else {
                            echo '<p class="text-red-600 mt-2">Error adding herb!</p>';
                        }
                        $stmt->close();
                    }
                    ?>
                    <form method="POST" class="space-y-2">
                        <input type="text" name="name" placeholder="Herb Name" required class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="region" placeholder="Region" class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="common_name" placeholder="Common Name" class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="type" placeholder="Type" class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="botanical_name" placeholder="Botanical Name" class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="medicinal_use" placeholder="Medicinal Use" class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="cultivation" placeholder="Cultivation Method" class="w-full p-2 border rounded border-green-300">
                        <button type="submit" name="herb_submit" class="w-full p-2 bg-green-600 text-white rounded hover:bg-green-700">Add Herb</button>
                    </form>
                </div>
                </a>

                <!-- Manage Users Card (Display and Delete Users) -->
                <a href="./users.php">

                    <div class="w-full h-[82vh] bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl hover:transition-transform">
                        <div class="text-green-900 text-4xl"><i class="fa-solid fa-users"></i></div>
                        <div class="text-green-900 text-xl font-bold"><h1>Manage Users</h1></div>
                        <div class="text-gray-600 text-lg"><p>View or delete users.</p></div>
                        <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
                        $user_id = $_POST['user_id'];
                        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
                        $stmt->bind_param("i", $user_id);
                        if ($stmt->execute()) {
                            echo '<p class="text-green-600 mt-2">User deleted successfully!</p>';
                        } else {
                            echo '<p class="text-red-600 mt-2">Error deleting user!</p>';
                        }
                        $stmt->close();
                    }
                    
                    $result = $conn->query("SELECT id, email FROM users LIMIT 3");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="flex justify-between items-center mt-2">';
                            echo '<span class="text-gray-600">' . htmlspecialchars($row['email']) . '</span>';
                            echo '<form method="POST" class="inline">';
                            echo '<input type="hidden" name="user_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" name="delete_user" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-600 mt-2">No users found.</p>';
                    }
                    ?>
                </div>
            </a>

                <!-- View Reports Card (Static Data Fetch) -->
                <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl hover:transition-transform">
                    <div class="text-green-900 text-4xl"><i class="fa-solid fa-chart-line"></i></div>
                    <div class="text-green-900 text-xl font-bold"><h1>View Reports</h1></div>
                    <div class="text-gray-600 text-lg"><p>Site activity stats.</p></div>
                    <?php
                    $user_count = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
                    $herb_count = $conn->query("SELECT COUNT(*) as count FROM herbs")->fetch_assoc()['count'];
                    echo '<p class="text-gray-600 mt-2">Total Users: ' . $user_count . '</p>';
                    echo '<p class="text-gray-600">Total Herbs: ' . $herb_count . '</p>';
                    ?>
                </div>

                <!-- Moderate Forum Card (Delete Reported Posts) -->
                <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl hover:transition-transform">
                    <div class="text-green-900 text-4xl"><i class="fa-solid fa-comments"></i></div>
                    <div class="text-green-900 text-xl font-bold"><h1>Moderate Forum</h1></div>
                    <div class="text-gray-600 text-lg"><p>Manage community discussions.</p></div>
                    <?php
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

                    $result = $conn->query("SELECT id, user_email, content FROM forum_posts  LIMIT 3");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="flex justify-between items-center mt-2">';
                            echo '<span class="text-gray-600">' . htmlspecialchars($row['content']) . ' (by ' . htmlspecialchars($row['user_email']) . ')</span>';
                            echo '<form method="POST" class="inline">';
                            echo '<input type="hidden" name="post_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" name="delete_post" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-gray-600 mt-2">No reported posts found.</p>';
                    }
                    ?>
                </div>
            </div>
            

            <!-- Admin Forum Moderation Section (Dynamic) -->
            <div class="bg-green-200 p-8 rounded-xl space-y-4 shadow-xl relative mt-10">
                <h1 class="text-green-900 text-2xl font-bold">Forum Moderation</h1>
                <?php
                $result = $conn->query("SELECT user_email, content, replies FROM forum_posts  ORDER BY created_at DESC LIMIT 3");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="bg-white p-4 rounded-xl">
                            <h1 class="text-gray-600 text-xl font-bold">Reported Post: <?php echo htmlspecialchars($row['content']); ?></h1>
                            <p class="text-gray-500 text-lg">Started by <?php echo htmlspecialchars($row['user_email']); ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="text-gray-600">No reported posts. Check the <a href="community.php" class="text-green-800 hover:underline">Community Forum</a> for activity.</p>';
                }
                ?>
                <div class="absolute text-green-800 hover:text-green-900 right-10 font-semibold bottom-1">
                    <a href="../Dashboard/community.php">View All Reports</a>
                </div>
            </div>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
