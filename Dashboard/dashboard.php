<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - AYUSH Herb</title>
    <script src="../script.js"></script>
</head>
<body>
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
    ?>

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
            <a href="./community.php"><div class="hover:underline hover:text-green-500">Community</div></a>
            <a href="./dashboard.php"><div class="hover:underline hover:text-green-500">Dashboard</div></a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
                <a href="./admin_dashboard.php"><div class="hover:underline hover:text-green-500">Admin</div></a>
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
        <div class="hidden flex-col bg-white absolute top-14 left-0 w-full shadow-md sm:hidden" id="mobile-menu">
            <a href="../index.html"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Home</div></a>
            <a href="../login/login.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Health</div></a>
            <a href="./community.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Community</div></a>
            <a href="./dashboard.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Dashboard</div></a>
            <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
                <a href="./admin_dashboard.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Admin</div></a>
            <?php } ?>
        </div>
    </nav>

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

                
                <a href="gardeningtips.php">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pt-2 pb-2">
                        <div><i class="fa-solid fa-seedling"></i></div>
                        <div><h2>Gardening Tips</h2></div>
                    </div>
                </a>
                <a href="community.php">
                    <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pr-2 pt-2 pb-2">
                        <div><i class="fa-solid fa-comments"></i></div>
                        <div><h2>Community Forum</h2></div>
                    </div>
                </a>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) { ?>
                    <a href="../admin/admin1.php">
                        <div class="flex gap-4 hover:bg-green-600 hover:rounded-md pl-2 text-lg font-semibold pr-2 pt-2 pb-2">
                            <div><i class="fa-solid fa-user-tie"></i></i></div>
                            <div><h2>Admin Dashboard</h2></div>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <a href="../login/logout.php">
                <div class="flex justify-center mt-auto">
                    <button class="bg-red-400 hover:bg-red-500 py-2 px-20 rounded-md font-semibold">Logout</button>
                </div>
            </a>
        </div>

        <!-- Main Content -->
        <div class=" flex-1 mx-auto p-7 w-full md:ml-64">
            <div class="text-3xl">
                <h1 class="text-green-900 font-bold">Welcome Back, <?php echo htmlspecialchars($user_email); ?></h1>
            </div>
            <div class="grid grid-rows lg:grid-cols-3 gap-5 mt-10">
                
                <a href="../index.html">
                    <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl">
                        <div class="text-green-900 text-4xl"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <div class="text-green-900 text-xl font-bold"><h1>Explore New Herbs</h1></div>
                        <div class="text-gray-600 text-lg"><p>Discover new herbs and their<br> benefits.</p></div>
                    </div>
                </a>
                <a href="gardeningtips.php">
                    <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl">
                        <div class="text-green-900 text-4xl"><i class="fa-solid fa-seedling"></i></div>
                        <div class="text-green-900 text-xl font-bold"><h1>Gardening Tips</h1></div>
                        <div class="text-gray-600 text-lg"><p>Learn tips and tricks for herb<br> gardening.</p></div>
                    </div>
                </a>
                <a href="community.php">
                    <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md hover:scale-105 hover:shadow-xl">
                        <div class="text-green-900 text-4xl"><i class="fa-solid fa-comments"></i></div>
                        <div class="text-green-900 text-xl font-bold"><h1>Community Forum</h1></div>
                        <div class="text-gray-600 text-lg"><p>Join discussions with fellow herb <br>enthusiasts.</p></div>
                    </div>
                </a>
            </div>

            <!-- Community Forum Section (Dynamic) -->
            <div class="bg-green-200 mt-10 p-8 rounded-xl space-y-4 shadow-xl relative">
                <h1 class="text-green-900 text-2xl font-bold">Community Forum</h1>
                <?php
                $result = $conn->query("SELECT user_email, content, replies FROM forum_posts ORDER BY created_at DESC LIMIT 3");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="bg-white p-4 rounded-xl">
                            <h1 class="text-gray-600 text-xl font-bold"><?php echo htmlspecialchars($row['content']); ?></h1>
                            <p class="text-gray-500 text-lg">Started by <?php echo htmlspecialchars($row['user_email']); ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="text-gray-600">No recent posts. Be the first to share on the <a href="community.php" class="text-green-800 hover:underline">Community Forum</a>!</p>';
                }
                ?>
                <div class="absolute text-green-800 hover:text-green-900 right-10 font-semibold bottom-1">
                    <a href="community.php">View All Discussions</a>
                </div>
            </div>

            
        </div>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
