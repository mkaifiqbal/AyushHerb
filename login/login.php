<?php

session_start();

// Redirect if already logged in
if (isset($_SESSION['user_email'])) {
    if ($_SESSION['is_admin']) {
        header("Location: ../admin/admin1.php");
    } else {
        header("Location: ../Dashboard/dashboard.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login - AYUSH Herb</title>
</head>
<body class="font-sans">
    <nav class="flex justify-between p-4 shadow fixed w-full bg-white top-0 z-50">
        <div class="text-4xl text-green-800 font-semibold font-mono">AYUSH Herb</div>
        <div class="hidden sm:flex space-x-6 text-green-900 text-lg">
            <a href="../index.html"><div class="hover:underline hover:text-green-500">Home</div></a>
            <a href="./login.php"><div class="hover:underline hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="hover:underline hover:text-green-500">Health</div></a>
            <a href="../Dashboard/community.php"><div class="hover:underline hover:text-green-500">Community</div></a>
            <a href="../Dashboard/dashboard.php"><div class="hover:underline hover:text-green-500">Dashboard</div></a>
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
            <a href="./login.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Login</div></a>
            <a href="../Health/health.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Health</div></a>
            <a href="../Dashboard/community.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Community</div></a>
            <a href="../Dashboard/dashboard.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Dashboard</div></a>
        </div>
    </nav>

    <main class="flex justify-center bg-green-50 min-h-screen">
        <div class="bg-white rounded w-full max-w-sm mt-40 text-center p-8 shadow">
            <div class="text-2xl font-bold text-green-600 pt-6">Login</div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $is_admin_login = isset($_POST['admin_login']); // Check if "Login as Admin" button was clicked

                $conn = new mysqli("localhost", "root", "", "ayush_herb");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($is_admin_login) {
                    // Check admins table only
                    $stmt = $conn->prepare("SELECT password FROM admins WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($hashed_password);
                    $stmt->fetch();

                    if ($hashed_password && password_verify($password, $hashed_password)) {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['is_admin'] = true;
                        $stmt->close();
                        $conn->close();
                        header("Location: ../admin/admin1.php");
                        exit();
                    } else {
                        echo '<p class="text-red-500 mt-4">Invalid admin email or password!</p>';
                    }
                    $stmt->close();
                } else {
                    // Check users table only
                    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($hashed_password);
                    $stmt->fetch();

                    if ($hashed_password && password_verify($password, $hashed_password)) {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['is_admin'] = false;
                        $stmt->close();
                        $conn->close();
                        header("Location: ../Dashboard/dashboard.php");
                        exit();
                    } else {
                        echo '<p class="text-red-500 mt-4">Invalid user email or password!</p>';
                    }
                    $stmt->close();
                }

                $conn->close();
            }
            ?>

            <form class="mt-4" method="POST" action="">
                <input type="email" name="email" placeholder="Email" required class="p-2 border w-full rounded mb-4">
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="Password" required class="p-2 w-full rounded mb-4 border">
                    <i class="fa-solid fa-eye absolute right-[5%] top-[25%] text-xs cursor-pointer" id="toggle-password"></i>
                </div>
                <button type="submit" class="w-full p-2 bg-green-600 rounded text-white mb-4">Login</button>
                <button type="submit" name="admin_login" value="1" class="w-full p-2 bg-blue-600 rounded text-white mb-4">Login as Admin</button>
                <div class="hover:underline text-blue-500 font-semibold">
                    <a href="./register.php">Don't have an account? Register</a>
                </div>
            </form>
        </div>
    </main>

    <script src="../script.js"></script>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>

<?php
ob_end_flush(); // Flush output buffer
?>
