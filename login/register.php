<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register - AYUSH Herb</title>
</head>
<body class="font-sans">
    <!-- Navigation Bar -->
    <nav class="flex justify-between p-4 shadow fixed w-full bg-white top-0 z-50">
        <div class="text-4xl text-green-800 font-semibold font-mono">
            AYUSH Herb
        </div>
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

    <!-- Main Content -->
    <main class="flex justify-center bg-green-50 min-h-screen">
        <div class="bg-white rounded w-full max-w-sm mt-40 text-center p-8 shadow">
            <div class="text-2xl font-bold text-green-600 pt-6">Register</div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

               
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<p class="text-red-500 mt-4">Invalid email format!</p>';
                } elseif ($password !== $confirm_password) {
                    echo '<p class="text-red-500 mt-4">Passwords do not match!</p>';
                } elseif (strlen($password) < 6) {
                    echo '<p class="text-red-500 mt-4">Password must be at least 6 characters!</p>';
                } else {
                    // Database connection
                    $conn = new mysqli("localhost", "root", "", "ayush_herb");

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Check if email already exists
                    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        echo '<p class="text-red-500 mt-4">Email already registered!</p>';
                    } else {
                        // Hash the password and insert user
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                        $stmt->bind_param("ss", $email, $hashed_password);

                        if ($stmt->execute()) {
                            echo '<p class="text-green-500 mt-4">Registration successful! Redirecting to login...</p>';
                            header("Refresh: 2; url=./login.php");
                            exit();
                        } else {
                            echo '<p class="text-red-500 mt-4">Registration failed! Please try again.</p>';
                        }
                    }

                    $stmt->close();
                    $conn->close();
                }
            }
            ?>

            <!-- Registration Form -->
            <form class="mt-4" method="POST" action="">
                <input type="email" name="email" placeholder="Email" required class="p-2 border w-full rounded mb-4">
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="Password" required class="p-2 w-full rounded mb-4 border">
                    <i class="fa-solid fa-eye absolute right-[5%] top-[25%] text-xs cursor-pointer" id="toggle-password"></i>
                </div>
                <div class="relative">
                    <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" required class="p-2 w-full rounded mb-4 border">
                    <i class="fa-solid fa-eye absolute right-[5%] top-[25%] text-xs cursor-pointer" id="toggle-confirm-password"></i>
                </div>
                <button type="submit" class="w-full p-2 bg-green-600 rounded text-white mb-4">Register</button>
                <div class="hover:underline text-blue-500 font-semibold">
                    <a href="./login.php">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Scripts -->
    <script src="../script.js"></script>
    <script>
        // Password visibility toggle for password field
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

        // Password visibility toggle for confirm password field
        document.getElementById('toggle-confirm-password').addEventListener('click', function () {
            const confirmPasswordInput = document.getElementById('confirm-password');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
