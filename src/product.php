<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "pokestellar");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM pokestellar_cards";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokéStellar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-200">
    
    <nav class="bg-[#c21818] p-4 text-white rounded-full m-4 w-[1400px] h-[60px] mx-auto fixed top-0 left-0 right-0 z-50 shadow-lg flex items-center">
        <div class="flex items-center w-full px-6">
            <h1 class="text-2xl font-bold hover:text-gray-300 transition duration-300">
                <a href="index.php">PokéStellar</a>
            </h1>
            <div class="flex-grow flex justify-center">
                <ul class="flex space-x-8 items-center">
                    <li><a href="index.php" class="hover:text-gray-300 transition duration-300">Home</a></li>       
                    <li><a href="cart.php" class="hover:text-gray-300 transition duration-300">Cart</a></li>
                    <li><a href="order_history.php" class="hover:text-gray-300 transition duration-300">Order History</a></li>
                    <li><a href="login.php" class="hover:text-gray-300 transition duration-300">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="h-20"></div>

    <div class="container mx-auto p-6 text-center">
        <h2 class="text-4xl font-bold text-gray-800">
            <span class="text-red-600 no-underline hover:underline">Pokémon</span> Cards Collection
        </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-6 px-6">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="bg-white/70 backdrop-blur-lg shadow-xl rounded-2xl p-6 border border-gray-300 transform transition hover:scale-105 hover:shadow-2xl flex flex-col items-center">
                <img src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" class="w-48 h-64 object-cover rounded-xl border border-gray-200">
                <div class="mt-4 text-center">
                    <h3 class="text-xl font-semibold text-gray-900"><?= htmlspecialchars($row['name']) ?></h3>
                    <p class="text-gray-500 text-sm"><?= htmlspecialchars($row['description']) ?></p>
                    <p class="text-xl font-bold text-red-600 mt-2">RM<?= number_format($row['price'], 2) ?></p>
                    <p class="text-md font-semibold <?= $row['stock'] > 0 ? 'text-green-600' : 'text-red-600' ?> mt-2">
                        Stock: <?= $row['stock'] > 0 ? $row['stock'] : 'Out of Stock' ?>
                    </p>
                </div>
                <button 
                    onclick="addToCart(<?= $row['id'] ?>, '<?= addslashes($row['name']) ?>', <?= $row['price'] ?>)" 
                    class="mt-4 w-full bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded-lg hover:opacity-90 transition duration-300"
                    <?= $row['stock'] <= 0 ? 'disabled' : '' ?> >
                    <?= $row['stock'] > 0 ? 'Add to Cart 🛒' : 'Out of Stock' ?>
                </button>
            </div>
        <?php endwhile; ?>
    </div>

    <footer class="bg-[#c21818] text-white w-full p-4 mt-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 PokéStellar. Crafted with 💜 by Haziqq.</p>
            <ul class="flex justify-center space-x-4 mt-2">
                <li><a href="aboutus.php" class="hover:text-gray-300 transition duration-300">About Us</a></li>
                <li><a href="contactus.php" class="hover:text-gray-300 transition duration-300">Contact Us</a></li>
            </ul>
        </div>
    </footer>


    <script>
    function addToCart(id, name, price) {
        fetch("cart.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id=${id}&name=${encodeURIComponent(name)}&price=${price}`
        })
        .then(response => response.text())
        .then(() => alert(name + " added to cart!"))
        .catch(error => console.error("Error:", error));
    }
    </script>
</body>
</html>

<?php
$conn->close();
?>
