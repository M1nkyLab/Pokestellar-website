<?php
include 'db_connect.php';

// Fetch only Legendary cards
$sql = "SELECT id, name, description, price, stock, image, rarity FROM pokestellar_cards WHERE rarity = 'Legendary'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokéStellar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-[#c21818] p-4 text-white rounded-full m-4 w-[90%] max-w-[1400px] h-[60px] mx-auto fixed top-0 left-0 right-0 z-50 shadow-lg flex items-center">
        <div class="flex items-center w-full px-6">
            <h1 class="text-2xl font-bold hover:text-gray-300 transition duration-300">
                <a href="index.php">PokéStellar</a>
            </h1>
            <div class="flex-grow flex justify-center">
                <ul class="flex space-x-8 items-center">
                    <li><a href="index.php" class="hover:text-gray-300">Home</a></li>       
                    <li><a href="login.php" class="hover:text-gray-300">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Spacer for Navbar -->
    <div class="h-20"></div>

    <!-- Banner Section (Auto-Slideshow) -->
    <section class="relative w-full h-[600px] overflow-hidden">
        <div id="slider" class="relative w-full h-full flex justify-center items-center">
            <?php 
            $images = [
                "../asset/pok-mon-tcg-are-vmax-full-arts-or-secret-rares-worth-the-most (1).png",
                "../asset/rarest-cards-pokemon-tcg-pocket-4a801bf.png",
                "../asset/eng_top_banner_SV08_1.png",
                "../asset/eng_top_banner_SV8.5.png"
            ];
            foreach ($images as $img): ?>
                <img src="<?= $img ?>" 
                    class="slide absolute w-full h-full object-cover opacity-0 transition-opacity duration-700" 
                    loading="lazy">
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Products Section -->
    <section class="container mx-auto p-8 max-w-screen-2xl w-[90%]">
        <h2 class="text-4xl font-bold text-gray-800 text-center mb-8">
            Our Most <span class="text-red-600 hover:underline">Rare Pokémon</span> Cards
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="relative bg-white/70 backdrop-blur-lg shadow-xl rounded-2xl p-6 border border-gray-300 transform transition hover:scale-105 hover:shadow-2xl flex flex-col items-center">
                    <div class="absolute top-3 right-3 bg-yellow-400 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg">
                        Legendary
                    </div>
                    <img src="<?= !empty($row['image']) ? 'data:image/jpeg;base64,' . base64_encode($row['image']) : 'images/default_card.jpg'; ?>" 
                        alt="<?= htmlspecialchars($row['name']); ?>" 
                        class="w-48 h-64 object-cover rounded-xl border border-gray-200">
                    
                    <div class="mt-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-900"><?= htmlspecialchars($row['name']); ?></h3>
                        <p class="text-gray-500 text-sm line-clamp-2"><?= htmlspecialchars($row['description']); ?></p>
                        <p class="text-sm font-medium text-gray-600">Stock: <?= htmlspecialchars($row['stock']); ?> available</p>
                        <p class="text-xl font-bold text-red-600 mt-3">RM<?= number_format($row['price'], 2); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Shop Others Button -->
    <div class="flex justify-center mt-6">
        <a href="product.php">
            <button class="bg-[#fa0101] text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 text-lg font-semibold shadow-lg">
                Shop Others →
            </button>
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-[#c21818] text-white w-full p-4 mt-6 text-center">
        <p>&copy; 2025 PokéStellar. Crafted with 💖 by Haziqq.</p>
        <ul class="flex justify-center space-x-4 mt-2">
            <li><a href="aboutus.php" class="hover:text-gray-300">About Us</a></li>
            <li><a href="contactus.php" class="hover:text-gray-300">Contact Us</a></li>
        </ul>
    </footer>

    <!-- JavaScript for Auto-Slideshow -->
    <script>
        let slides = document.querySelectorAll(".slide");
        let index = 0;
        
        function showSlide() {
            slides.forEach(slide => slide.classList.add("opacity-0"));
            slides[index].classList.remove("opacity-0");
            index = (index + 1) % slides.length;
        }
        
        setInterval(showSlide, 3000);
        showSlide();
    </script>
</body>
</html>

<?php
$conn->close();
?>
