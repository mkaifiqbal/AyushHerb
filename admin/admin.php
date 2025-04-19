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
            <a href="./admin.php">
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

    <div class=" flex-1 p-10 w-full md:ml-64">
        <div class="text-3xl">
            <h1 class="text-green-900 font-bold">Admin Dashboard, <?php echo htmlspecialchars($user_email); ?></h1>
        </div>

        <div class="mt-10">
            <!-- Manage Herbs Card -->
            <div class="w-full bg-green-200 rounded-xl mx-auto p-6 space-y-2 shadow-md ">
                <div class="text-green-900 text-4xl"><i class="fa-solid fa-leaf"></i></div>
                <div class="text-green-900 text-xl font-bold"><h1>Manage Herbs</h1></div>
                <div class="text-gray-600 text-lg"><p>Add new herb details.</p></div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['herb_submit'])) {
                    $name = $_POST['name'];
                    $bio = $_POST['bio'];
                    $region = $_POST['region'];
                    $common_name = $_POST['common_name'];
                    $type = $_POST['type'];
                    $botanical_name = $_POST['botanical_name'];
                    $medicinal_use = $_POST['medicinal_use'];
                    $cultivation = $_POST['cultivation'];
                    $image =$_POST['image'];
                    $img1=$_POST['img1'];
                    $img2=$_POST['img2'];
                    $img3=$_POST['img3'];
                    $frame_url= $_POST['frame_url'];
                    $audio_url = $_POST['audio_url'];

                    $stmt = $conn->prepare("INSERT INTO herbs (name, region, common_name, type, botanical_name, medicinal_use, cultivation, image,bio,img1,img2,img3,frame_url,audio_url) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssssssssss", $name, $region, $common_name, $type, $botanical_name, $medicinal_use, $cultivation,$image,$bio,$img1,$img2,$img3,$frame_url,$audio_url);
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
                    <input type="text" name="bio" placeholder="Bio" required class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="region" placeholder="Region" class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="common_name" placeholder="Common Name" class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="type" placeholder="Type" class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="botanical_name" placeholder="Botanical Name" class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="medicinal_use" placeholder="Medicinal Use" class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="cultivation" placeholder="Cultivation Method" class="w-full p-2 border rounded border-green-300">
                    <div class="flex">
                        <input type="text" name="image" placeholder="Image Name" required class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="img1" placeholder="Image 2" required class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="img2" placeholder="Image 3" required class="w-full p-2 border rounded border-green-300">
                        <input type="text" name="img3" placeholder="Image 4" required class="w-full p-2 border rounded border-green-300">
                    </div>
                    <input type="text" name="frame_url" placeholder="3d URL" required class="w-full p-2 border rounded border-green-300">
                    <input type="text" name="audio_url" placeholder="Audio Name" required class="w-full p-2 border rounded border-green-300">

                    <button type="submit" name="herb_submit" class="w-full p-2 bg-green-600 text-white rounded hover:bg-green-700">Add Herb</button>
                </form>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
