<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PokéStellar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-[#c21818] p-4 text-white rounded-[50px] m-4 w-full h-[60px] fixed top-0 left-0 right-0 z-50 shadow-lg">
        <div class="w-full flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">
                <a href="index.php" aria-label="Go to homepage">PokéStellar</a>
            </h1>
            <div class="flex-grow flex justify-center">
                <ul class="flex space-x-8 items-center">
                    <li><a href="index.php" class="hover:underline" aria-label="Go to Home page">Home</a></li>
                    <li><a href="product.php" class="hover:underline" aria-label="Go to Products page">Products</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="mt-20 flex-grow">
        <!-- About Us Main Card -->
        <div class="max-w-4xl mx-auto bg-red-100 p-8 rounded-lg shadow-lg mt-10">
            <h1 class="text-4xl font-bold text-center text-red-600 mb-6">About Us</h1>

            <!-- Sub-cards for each section -->
            <section class="bg-red-200 p-6 rounded-lg shadow-md border border-red-400 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Who We Are</h2>
                <p class="text-gray-600 mt-2">Welcome to <strong class="text-red-600">PokéStellar</strong>, a premier Pokémon Trading Card Marketplace! We are passionate Pokémon collectors and traders, dedicated to providing the best platform for buying and selling authentic Pokémon cards.</p>
            </section>

            <section class="bg-red-200 p-6 rounded-lg shadow-md border border-red-400 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Our Mission</h2>
                <p class="text-gray-600 mt-2">At <strong class="text-red-600">PokéStellar</strong>, our mission is to create a trusted and secure marketplace where Pokémon fans can find rare and valuable cards at competitive prices.</p>
            </section>

            <section class="bg-red-200 p-6 rounded-lg shadow-md border border-red-400 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Why Us?</h2>
                <ul class="list-disc list-inside text-gray-600 mt-2 space-y-2">
                    <li>✅ 100% Authentic Pokémon Cards</li>
                    <li>✅ Secure Transactions</li>
                    <li>✅ Wide Range of Pokémon Collections</li>
                    <li>✅ Fast & Reliable Shipping</li>
                </ul>
            </section>

            <section class="bg-red-200 p-6 rounded-lg shadow-md border border-red-400">
                <h2 class="text-2xl font-semibold text-gray-800">Contact Us</h2>
                <p class="text-gray-600 mt-2">If you have any questions, feel free to <a href="contactus.php" class="text-red-600 font-semibold hover:underline">contact us</a>.</p>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#c21818] text-white w-full p-4 mt-6 text-center">
        <p>&copy; 2025 PokéStellar. Crafted with 💜 by Haziqq.</p>
        <ul class="flex justify-center space-x-4 mt-2">
            <li><a href="contactus.php" class="hover:underline" aria-label="Go to Contact Us page">Contact Us</a></li>
        </ul>
    </footer>
</body>
</html>
