<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gardening Tips</title>
    <script src="hide.js"></script>
    <script src="../script.js"></script>
</head>
<body>
    <nav class="flex justify-between p-4 shadow relative w-full bg-white top-0 z-50 flex-grow ">
        
        <div class="text-4xl text-green-800 font-semibold font-mono ">
            <a href="../index.html">
               AYUSH Herb
            </a>
        </div>
    
        <!-- Desktop Menu -->
        <div class="hidden sm:flex space-x-6 text-green-900 text-lg">

            <a href="../index.html">
            <div class="hover:underline hover:text-green-500">Home</div></a>

            <a href="../login/login.php">
         <div class="hover:underline hover:text-green-500">Login</div></a>

            <a href="../Health/health.php"><div class="hover:underline hover:text-green-500">Health</div></a>
            <a href="./community.php">
            <div class="hover:underline hover:text-green-500">Community</div>
            </a>
            <a href="./dashboard.php">
                <div class="hover:underline hover:text-green-500">Dashboard</div>
            </a>
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
            <a href="../index.html">
            <div class="p-4 hover:bg-gray-100 hover:text-green-500">Home</div></a>
            <a href="../login/login.php">
            <div class="p-4 hover:bg-gray-100 hover:text-green-500">Login</div>
            </a>
            <a href="../Health/health.php"><div class="p-4 hover:bg-gray-100 hover:text-green-500">Health</div></a>
            <a href="./community.php">
            <div class="p-4 hover:bg-gray-100 hover:text-green-500">Community</div>
            </a>
            <a href="./dashbord.php">
                <div class="p-4 hover:bg-gray-100 hover:text-green-500">Dashboard</div>
            </a>
        </div>
    </nav>
    <div class="flex bg-green-200 flex-col lg:flex-row lg:m-10 sm:mt-auto rounded-xl">
        <div class="flex flex-col flex-1 space-y-8 p-5 justify-center">
            <div><h1 class="text-3xl text-green-900 font-bold">Gardening Tips</h1></div>
            <div><p class="text-xl">Master the art of gardening with our essential tips and tricks. From soil preparation to plant care, learn how to make your garden flourish and grow beautiful blooms.</p></div>
            <div class="pl-5"><ul class="text-gray-800 list-disc text-lg">
                <li>Choosing the right plants for your climate</li>
                <li>Soil enrichment techniques</li>
                <li>Watering schedules for different plant types</li>
                <li>Pest control without chemicals</li>
            </ul></div>
            <div class="bg-green-900 w-fit py-2 px-3 rounded-md"><a href="https://en.wikipedia.org/wiki/Gardening"><button class="text-white w-full cursor-pointer">Learn More</button></a></div>
        </div>
        <div class="flex flex-1 m-2 rounded relative overflow-hidden">
            <img src="https://ideogram.ai/assets/progressive-image/balanced/response/NJw1wxWVT3WlWdd8iyDJtw" class="w-full h-full object-cover rounded-xl absolute transition-all slides duration-1000" alt="Image 1">
            <img src="https://hips.hearstapps.com/hmg-prod/images/gardening-1521662873.jpg" class="w-full h-full object-cover rounded-xl absolute transition-all slides duration-1000" alt="Image 2">
            <img src="https://t3.ftcdn.net/jpg/01/38/06/76/360_F_138067641_nhB3jLhnIc1PIdjmWziWPN3bMy07unqX.jpg" class="w-full h-full object-cover rounded-xl absolute transition-all slides duration-1000" alt="Image 3">
            <img src="https://cdn.britannica.com/42/91642-050-332E5C66/Keukenhof-Gardens-Lisse-Netherlands.jpg" class="w-full h-full object-cover rounded-xl absolute transition-all slides duration-1000" alt="Image 4">
            <img src="https://publichealth.tulane.edu/wp-content/uploads/sites/3/2024/04/benefits-of-community-gardens.jpg" class="w-full h-full object-cover rounded-xl absolute transition-all slides duration-1000" alt="Image 5">
        </div>
    </div>
    <!-- body -->
    <div class="sm:pt-5 lg:pt-0">
        <div class="flex flex-col w-auto h-auto lg:h-50 lg:m-10 shadow-xl rounded-xl lg:flex-row">
            <div class="m-2">
                <img src="https://ideogram.ai/assets/progressive-image/balanced/response/uBUZ7jNtTbuPXoyz1MuI9A" class="w-full h-full object-contain rounded-xl">
            </div>
            <div class="flex-col space-y-2 m-5">
                <div class="text-2xl text-green-900 font-bold">
                    <h1>Watering Tips</h1>
                </div>
                <div class="text-gray-800">
                    <p>Water early in the morning or late in the evening to reduce evaporation.</p>
                </div>
                <div class="text-xl text-green-900 font-semibold cursor-pointer" onclick="toggleDetails(this)">
                    <h1>Show Details</h1>
                </div>
                <div class="text-gray-800 hidden details">
                    <p>Avoid watering the leaves to prevent fungal growth and always use deep watering to encourage strong roots.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-auto h-auto lg:h-50 lg:m-10 shadow-xl rounded-xl lg:flex-row">
            <div class="m-2">
                <img src="../assets/soilprep.webp" class="w-full h-full object-contain rounded-xl">
            </div>
            <div class="flex-col space-y-2 m-5">
                <div class="text-2xl text-green-900 font-bold">
                    <h1>Soil Preparation</h1>
                </div>
                <div class="text-gray-800">
                    <p>Healthy soil is the foundation of a thriving garden.</p>
                </div>
                <div class="text-xl text-green-900 font-semibold cursor-pointer" onclick="toggleDetails(this)">
                    <h1>Show Details</h1>
                </div>
                <div class="text-gray-800 hidden details">
                    <p>Add organic compost to enrich the soil and maintain a balanced pH level. Consider mulching to retain moisture.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-auto h-auto lg:h-50 lg:m-10 shadow-xl rounded-xl lg:flex-row">
            <div class="m-2">
                <img src="https://cdn.shopify.com/s/files/1/0569/9675/7697/files/use-homemade-plant-fertilizer-garden_1024x1024.jpg?v=1655088627" class="w-full lg:w-63 h-full object-contain rounded-xl">
            </div>
            <div class="flex-col space-y-2 m-5">
                <div class="text-2xl text-green-900 font-bold">
                    <h1>Fertilizing Frequency</h1>
                </div>
                <div class="text-gray-800">
                    <p>Fertilize every 4-6 weeks during the growing season to maintain soil health.</p>
                </div>
                <div class="text-xl text-green-900 font-semibold cursor-pointer" onclick="toggleDetails(this)">
                    <h1>Show Details</h1>
                </div>
                <div class="text-gray-800 hidden details">
                    <p>Use a balanced fertilizer or organic alternatives like compost tea. Make sure to follow instructions to avoid over-fertilization.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-auto h-auto lg:h-50 lg:m-10 shadow-xl rounded-xl lg:flex-row">
            <div class="m-2">
                <img src="https://media.istockphoto.com/id/1092812454/photo/woman-spraying-flowers-in-the-garden.jpg?s=612x612&w=0&k=20&c=eelbPD_-Tmr-Al0-z9hTLzASK3chsdeiOCopB_ATDFU=" class="w-full lg:w-63 h-full object-contain rounded-xl">
            </div>
            <div class="flex-col space-y-2 m-5">
                <div class="text-2xl text-green-900 font-bold">
                    <h1>Pest Control</h1>
                </div>
                <div class="text-gray-800">
                    <p>Protect your plants from pests with natural remedies.</p>
                </div>
                <div class="text-xl text-green-900 font-semibold cursor-pointer" onclick="toggleDetails(this)">
                    <h1>Show Details</h1>
                </div>
                <div class="text-gray-800 hidden details">
                    <p>Use neem oil, garlic spray, or companion planting to deter pests without harming beneficial insects.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-auto h-auto lg:h-50 lg:m-10 shadow-xl rounded-xl lg:flex-row">
            <div class="m-2">
                <img src="https://cdn.shopify.com/s/files/1/0069/5854/6980/files/4._Shade_Cloths_fb65f336-36ad-4efd-8e7d-a96985d472f7_600x600.jpg?v=1717095057Q" class="w-full h-full object-contain rounded-xl">
            </div>
            <div class="flex-col space-y-2 m-5">
                <div class="text-2xl text-green-900 font-bold">
                    <h1>Sunlight Management</h1>
                </div>
                <div class="text-gray-800">
                    <p>Ensure your plants receive the appropriate amount of sunlight.</p>
                </div>
                <div class="text-xl text-green-900 font-semibold cursor-pointer" onclick="toggleDetails(this)">
                    <h1>Show Details</h1>
                </div>
                <div class="text-gray-800 hidden details">
                    <p>Most vegetables need at least 6 hours of direct sunlight per day. Consider growing shade-tolerant plants in low-light areas.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-green-200 lg:m-10 rounded-xl">
        <h1 class="text-3xl font-bold  text-green-900 m-8 pt-5">Gardening Video</h1>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5 p-5 ">
            <div class="w-full">
                <iframe class="w-full aspect-video rounded-lg shadow-lg"
                    src="https://www.youtube.com/embed/Kg5NR6S52FM"
                    title="YouTube video player" 
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="w-full">
                <iframe class="w-full aspect-video rounded-lg shadow-lg"
                    src="https://www.youtube.com/embed/BO8yuSTc3fo"
                    title="YouTube video player" 
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="w-full">
                <iframe class="w-full aspect-video rounded-lg shadow-lg"
                    src="https://www.youtube.com/embed/B0DrWAUsNSc"
                    title="YouTube video player" 
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="w-full">
                <iframe class="w-full aspect-video rounded-lg shadow-lg"
                    src="https://www.youtube.com/embed/XZhDdE434_o"
                    title="YouTube video player" 
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>        
    </div>


    
<!-- Footer Section -->
<footer class=" text-green-800 py-12 px-6 md:px-10 lg:px-20 shadow-xl border-t-2  mt-6">
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
<script src="slider.js"></script>   
</body>
</html>
