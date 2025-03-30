<?php
session_start();
include 'db_connect.php'; // Ensure this file contains the database connection

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle AJAX request to add items to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);

    // Fetch stock from database
    $stmt = $conn->prepare("SELECT stock FROM pokestellar_cards WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($stock);
    $stmt->fetch();
    $stmt->close();

    if ($stock > 0) {
        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['quantity'] < $stock) {
                $_SESSION['cart'][$id]['quantity']++;
                echo json_encode(['success' => true, 'message' => 'Added to cart.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Not enough stock available.']);
            }
        } else {
            $_SESSION['cart'][$id] = ['name' => $name, 'price' => $price, 'quantity' => 1, 'stock' => $stock];
            echo json_encode(['success' => true, 'message' => 'Added to cart.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Out of stock!']);
    }
    exit;
}

// Handle quantity increase/decrease/remove
if (isset($_GET['action'], $_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Fetch stock from database
    $stmt = $conn->prepare("SELECT stock FROM pokestellar_cards WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($stock);
    $stmt->fetch();
    $stmt->close();

    if ($action === 'increase' && isset($_SESSION['cart'][$id])) {
        if ($_SESSION['cart'][$id]['quantity'] < $stock) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            echo "<script>alert('Cannot add more! Only $stock in stock.');</script>";
        }
    } elseif ($action === 'decrease' && isset($_SESSION['cart'][$id]) && $_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    } elseif ($action === 'remove') {
        unset($_SESSION['cart'][$id]);
    }

    header("Location: cart.php");
    exit;
}

    // Calculate total price
    $total = array_reduce($_SESSION['cart'], function($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart - PokéStellar</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-[#c21818] p-4 text-white rounded-[50px] m-4 w-[1400px] h-[60px] mx-auto fixed top-0 left-0 right-0 z-50 shadow-lg flex items-center">
        <div class="flex items-center w-full px-6">
            <h1 class="text-2xl font-bold hover:text-gray-300 transition duration-300">
                <a href="index.php">PokéStellar</a>
            </h1>
            <div class="flex-grow flex justify-center mr-28">
                <ul class="flex space-x-8 items-center">
                    <li><a href="index.php" class="hover:text-gray-300 transition duration-300">Home</a></li>
                    <li><a href="product.php" class="hover:text-gray-300 transition duration-300">Products</a></li>
                    <li><a href="order_history.php" class="hover:text-gray-300 transition duration-300">Order History</a></li>
                    <li><a href="login.php" class="hover:text-gray-300 transition duration-300">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cart Section -->
    <div class="max-w-4xl mx-auto mt-24 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">🛒 Shopping Cart</h1>

        <!-- Cart Table -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-left">Pokémon</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Quantity</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Total</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($_SESSION['cart'])): ?>
                <tr>
                    <td colspan="5" class="text-center py-4">Your cart is empty!</td>
                </tr>
            <?php else: ?>
                <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2"><?= $item['name'] ?></td>
                        <td class="border border-gray-300 px-4 py-2">RM<?= number_format($item['price'], 2) ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="cart.php?action=decrease&id=<?= $id ?>" class="bg-gray-300 text-black px-2 py-1 rounded hover:bg-gray-400">➖</a>
                            <?= $item['quantity'] ?>
                            <a href="cart.php?action=increase&id=<?= $id ?>" class="bg-gray-300 text-black px-2 py-1 rounded hover:bg-gray-400">➕</a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">RM<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="cart.php?action=remove&id=<?= $id ?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">❌ Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

<!-- Total Price -->
<div class="text-right mt-4">
    <p class="text-xl font-semibold">Total: <span class="text-red-600">RM<?= number_format($total, 2) ?></span></p>
</div>

    <!-- Buttons -->
    <div class="mt-6 flex justify-between">
        <a href="product.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">⬅ Continue Shopping</a>
        <?php if (!empty($_SESSION['cart'])): ?>
            <a href="checkout.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Proceed to Checkout ➡
            </a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
