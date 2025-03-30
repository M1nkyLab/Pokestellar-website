<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Follow Us - PokéStellar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen font-sans">
    <!-- Navbar -->
    <nav class="bg-red-600 p-4 text-white rounded-full m-4 w-[90%] max-w-[1400px] h-[60px] mx-auto fixed top-0 left-0 right-0 z-50 shadow-lg flex items-center px-6">
        <h1 class="text-2xl font-bold">
            <a href="index.php">PokéStellar</a>
        </h1>
        <div class="flex-grow flex justify-center">
            <ul class="flex space-x-8 items-center">
                <li><a href="index.php" class="hover:underline">Home</a></li>
                <li><a href="product.php" class="hover:underline">Products</a></li>
                <li><a href="aboutus.php" class="hover:underline">About Us</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Spacer to prevent content from being hidden under navbar -->
    <div class="h-24"></div>
    
    <!-- Social Media Section -->
    <div class="max-w-6xl mx-auto bg-red-100 p-8 rounded-xl shadow-2xl mt-10 flex-grow">
        <h1 class="text-4xl font-bold text-center text-red-600 mb-6">Follow Us</h1>
        <p class="text-gray-600 text-center mb-12">Stay connected with us on social media!</p>
        
        <!-- Social Media Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Facebook Card -->
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-lg hover:scale-105 hover:shadow-2xl transition-all duration-300 transform border-2 border-blue-700">
                <a href="https://www.facebook.com" target="_blank" class="flex flex-col items-center">
                    <i class="fab fa-facebook-f text-5xl mb-4"></i>
                    <span class="text-xl font-semibold text-center">Facebook</span>
                </a>
            </div>
            <!-- Instagram Card -->
            <div class="bg-pink-600 text-white p-6 rounded-lg shadow-lg hover:scale-105 hover:shadow-2xl transition-all duration-300 transform border-2 border-pink-700">
                <a href="https://www.instagram.com" target="_blank" class="flex flex-col items-center">
                    <i class="fab fa-instagram text-5xl mb-4"></i>
                    <span class="text-xl font-semibold text-center">Instagram</span>
                </a>
            </div>
            <!-- X Card (formerly Twitter) -->
            <div class="bg-blue-400 text-white p-6 rounded-lg shadow-lg hover:scale-105 hover:shadow-2xl transition-all duration-300 transform border-2 border-blue-500">
                <a href="https://twitter.com" target="_blank" class="flex flex-col items-center">
                    <i class="fab fa-twitter text-5xl mb-4"></i>
                    <span class="text-xl font-semibold text-center">X</span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-[#c21818] text-white w-full p-6 mt-12 text-center rounded-t-lg shadow-lg">
        <p>&copy; 2025 PokéStellar. Crafted with 💜 by Haziqq.</p>
        <ul class="flex justify-center space-x-4 mt-2">
            <li><a href="aboutus.php" class="hover:underline">About Us</a></li>
        </ul>
    </footer>
</body>
</html>
