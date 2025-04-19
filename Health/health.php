<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AYUSH Herb - Health</title>
</head>

<body>
    <nav class="flex justify-between p-4 shadow fixed w-full bg-white top-0 z-50">

        <div class="text-4xl text-green-800 font-semibold font-mono ">
            <a href="../index.html">
               AYUSH Herb
            </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden sm:flex space-x-6 text-green-900 text-lg">

            <a href="../index.html">
                <div class="hover:underline hover:text-green-500">Home</div>
            </a>

            <a href="../login/login.php">
                <div class="hover:underline hover:text-green-500">Login</div>
            </a>
            <a href="">
                <div class="hover:underline text-green-500">Health</div>
            </a>

            <a href="../Dashboard/community.php">
                <div class="hover:underline hover:text-green-500">Community</div>
            </a>

            <a href="../Dashboard/dashboard.php">
                <div class="hover:underline hover:text-green-500">Dashboard</div>
            </a>
        </div>


        <div class="md:hidden cursor-pointer" id="menu-btn">
            <i class="fa-solid fa-bars text-xl"></i>
        </div>


        <div class="hidden lg:flex space-x-3">

        </div>


        <div class="hidden flex-col bg-white absolute top-14 left-0 w-full shadow-md sm:hidden" id="mobile-menu">
            <a href="../index.html">
                <div class="p-4 hover:bg-gray-100 hover:text-green-500">Home</div>
            </a>
            <a href="../login/login.php">
                <div class="p-4 hover:bg-gray-100 hover:text-green-500">Login</div>
            </a>
            <div class="p-4 hover:bg-gray-100 hover:text-green-500">Health</div>
            <a href="../Dashboard/community.php">
                <div class="p-4 hover:bg-gray-100 hover:text-green-500">Community</div>
            </a>
            <a href="../Dashboard/dashboard.php">
                <div class="p-4 hover:bg-gray-100 hover:text-green-500">Dashboard</div>
            </a>
        </div>
    </nav>



    <main>
        <div class="py-8 px-4 text-center pt-36">
            <h3 class="text-3xl font-bold mb-6 text-green-800">Explore Health & Wellness Categories</h3>
            <p class="text-lg mb-8 text-gray-600 mx-auto max-w-3xl">Discover the power of natural remedies and holistic
                living through our curated categories. Learn more about plants that can improve your skin, hair,
                fitness, and overall well-being.</p>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 px-2 sm:px-10">

            <!-- box1 -->


            <div
                class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer duration-300 ease-in-out">
                <a href="https://en.wikipedia.org/wiki/Skin_care" target="_blank">
                    <img class="w-full h-48 object-cover" src="../assets/skincare.png" alt="Skin Care">
                    <div class="p-4">
                        <h3 class="text-xl pb-2 font-semibold">Skin Care</h3>
                        <p class="text-sm text-gray-500">Explore plants and herbs known for their healing and wellness
                            properties.</p>
                    </div>

                </a>
            </div>


            <div
                class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer duration-300 ease-in-out">
                <a href="https://en.wikipedia.org/wiki/Hair_care" target="_blank">
                    <img class="w-full h-48 object-cover" src="../assets/haircare.png" alt="Skin Care">
                    <div class="p-4">
                        <h3 class="text-xl pb-2 font-semibold">Hair Care</h3>
                        <p class="text-sm text-gray-500">Explore plants and herbs known for their healing and wellness
                            properties.</p>
                    </div>
                </a>
            </div>


            <div
                class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer duration-300 ease-in-out">
                <a href="https://en.wikipedia.org/wiki/Medicinal_plants" target="_blank">
                    <img class="w-full h-48 object-cover" src="../assets/diseases.png" alt="Skin Care">
                    <div class="p-4">
                        <h3 class="text-xl pb-2 font-semibold">Diseases</h3>
                        <p class="text-sm text-gray-500">Explore plants and herbs known for their healing and wellness
                            properties.</p>
                    </div>
                </a>
            </div>


            <div
                class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer duration-300 ease-in-out">
                <a href="https://en.wikipedia.org/wiki/Plant_nutrition" target="_blank">
                    <img class="w-full h-48 object-cover" src="../assets/nutrition.png" alt="Skin Care">
                    <div class="p-4">
                        <h3 class="text-xl pb-2 font-semibold">Nutrition</h3>
                        <p class="text-sm text-gray-500">Explore plants and herbs known for their healing and wellness
                            properties.</p>
                    </div>
                </a>
            </div>

            <div
                class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer duration-300 ease-in-out">
                <a href="https://en.wikipedia.org/wiki/List_of_plants_used_in_herbalism" target="_blank">
                    <img class="w-full h-48 object-cover" src="../assets/fitness.png" alt="Skin Care">
                    <div class="p-4">
                        <h3 class="text-xl pb-2 font-semibold">Fitness</h3>
                        <p class="text-sm text-gray-500">Explore plants and herbs known for their healing and wellness
                            properties.</p>
                    </div>
                </a>
            </div>


            <div
                class="bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer duration-300 ease-in-out">
                <a href="https://en.wikipedia.org/wiki/List_of_psychoactive_plants" target="_blank">
                    <img class="w-full h-48 object-cover" src="../assets/mentalhealth.png" alt="Skin Care">
                    <div class="p-4">
                        <h3 class="text-xl pb-2 font-semibold">Mental Health</h3>
                        <p class="text-sm text-gray-500">Explore plants and herbs known for their healing and wellness
                            properties.</p>
                    </div>
                </a>
            </div>


        </div>


        <div class="mt-12 px-4">
            <h2 class="text-3xl font-bold mb-10 text-center">Wellness Tips</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center max-w-5xl mx-auto">
                <div class="bg-green-100 p-6 rounded-lg shadow-md max-w-md mx-auto">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Hydrate Regularly</h3>
                    <p class="text-gray-600">Drinking enough water is crucial for maintaining optimal health. It aids
                        digestion, skin health, and regulates body temperature.</p>
                </div>
                <div class="bg-green-100 p-6 rounded-lg shadow-md max-w-md mx-auto">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Eat Whole Foods</h3>
                    <p class="text-gray-600">Incorporate more fruits, vegetables, whole grains, and nuts into your diet
                        to improve overall wellness and energy levels.</p>
                </div>
                <div class="bg-green-100 p-6 rounded-lg shadow-md max-w-md mx-auto">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Daily Exercise</h3>
                    <p class="text-gray-600">Physical activity boosts your immune system, improves mood, and helps
                        maintain a healthy weight.</p>
                </div>
                <div class="bg-green-100 p-6 rounded-lg shadow-md max-w-md mx-auto">
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Mental Wellness</h3>
                    <p class="text-gray-600">Practicing mindfulness and meditation can significantly reduce stress and
                        promote emotional balance.</p>
                </div>
            </div>
            <div class="mt-16 bg-green-50 py-8 px-6 rounded-lg shadow-lg max-w-4xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-green-700 mb-4">Take a Step Towards Better Health</h3>
                <p class="text-lg text-gray-700 mb-6 max-w-2xl mx-auto">Embrace natural living and enhance your
                    well-being by integrating these herbs and practices into your daily life. Join us in a journey
                    towards a healthier, balanced lifestyle.</p>
                    <a href="../index.html#herbTilesContainer" >
                        <button class="py-3 px-6 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition-transform transform hover:scale-105">
                            Get Started Now
                        </button>
                    </a>
            </div>
        </div>
    </main>


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

    </main>

    <script src="script.js"></script>
</body>

</html>