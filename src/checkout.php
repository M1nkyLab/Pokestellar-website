<?php
session_start();
include 'db_connect.php';

// Redirect if cart is empty
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Calculate total price
$total = array_reduce($_SESSION['cart'], function ($sum, $item) {
    return $sum + $item['price'] * $item['quantity'];
}, 0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $customer_name = htmlspecialchars($_POST['name']);
    $customer_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $payment_method = htmlspecialchars($_POST['payment']);

    // Insert order into the database
    $sql = "INSERT INTO pokestellar_orders (customer_name, customer_email, address, phone, total_price, payment_method, status) 
            VALUES (?, ?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssds", $customer_name, $customer_email, $address, $phone, $total, $payment_method);
    $stmt->execute();
    
    $order_id = $stmt->insert_id;

    // Insert order items into database
    $sql_item = "INSERT INTO pokestellar_order_items (order_id, product_id, name, price, quantity) 
                VALUES (?, ?, ?, ?, ?)";
    $stmt_item = $conn->prepare($sql_item);
    
    foreach ($_SESSION['cart'] as $id => $item) {
        $stmt_item->bind_param("iisdi", $order_id, $id, $item['name'], $item['price'], $item['quantity']);
        $stmt_item->execute();
    }

    // Clear cart after successful order
    unset($_SESSION['cart']);

    // Redirect to order history with success flag
    header("Location: order_history.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - PokéStellar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-[#c21818] p-4 text-white rounded-[50px] m-4 w-full h-[60px] mx-auto fixed top-0 left-0 right-0 z-50 shadow-lg flex items-center">
    <div class="flex items-center w-full px-6">
        <h1 class="text-2xl font-bold hover:text-gray-300 transition duration-300">
            <a href="index.php">PokéStellar</a>
        </h1>
        <div class="flex-grow flex justify-center mr-28">
            <ul class="flex space-x-8 items-center">
                <li><a href="index.php" class="hover:text-gray-300 transition duration-300">Home</a></li>
                <li><a href="product.php" class="hover:text-gray-300 transition duration-300">Products</a></li>
                <li><a href="cart.php" class="hover:text-gray-300 transition duration-300">Cart</a></li>
                <li><a href="orders.php" class="hover:text-gray-300 transition duration-300">Order History</a></li>
                <li><a href="login.php" class="hover:text-gray-300 transition duration-300">Admin</a></li>
                <li><a href="#" onclick="logout()" class="hover:text-gray-300 transition duration-300">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Checkout Container -->
<div class="max-w-lg mx-auto mt-24 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">📦 Checkout</h1>
    <form action="checkout.php" method="POST">
        <label class="block mb-2 text-gray-600">Full Name</label>
        <input type="text" name="name" required class="w-full p-3 border border-gray-300 rounded-lg mb-4" placeholder="Akmal Old money">

        <label class="block mb-2 text-gray-600">Email</label>
        <input type="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg mb-4" placeholder="Akmal@example.com">

        <label class="block mb-2 text-gray-600">Address</label>
        <textarea name="address" required class="w-full p-3 border border-gray-300 rounded-lg mb-4" placeholder="123 Jalan old money, Malaysia"></textarea>

        <label class="block mb-2 text-gray-600">Phone Number</label>
        <input type="text" name="phone" required class="w-full p-3 border border-gray-300 rounded-lg mb-4" placeholder="+60 123456789">

        <label class="block mb-2 text-gray-600">Payment Method</label>
        <select name="payment" required class="w-full p-3 border border-gray-300 rounded-lg">
            <option value="credit_card">💳 Credit/Debit Card</option>
            <option value="paypal">🅿️ PayPal</option>
            <option value="bank_transfer">🏦 Bank Transfer</option>
            <option value="wise">🌍 WISE (International Transfer)</option>
        </select>

        <div class="bg-gray-200 p-4 rounded-lg mt-4">
            <p class="text-lg font-bold">Total: <span class="text-red-600">RM<?= number_format($total, 2) ?></span></p>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="cart.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">⬅ Back to Cart</a>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Confirm Order ✅</button>
        </div>
    </form>
</div>

</body>
</html>
