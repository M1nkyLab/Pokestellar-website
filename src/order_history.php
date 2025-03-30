<?php
include 'db_connect.php';

// Fetch orders from the database using prepared statement for security
$query = "SELECT * FROM pokestellar_orders ORDER BY order_date DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - PokéStellar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<main class="p-8">
    <!-- Navigation Section with Home Button -->
    <section class="mb-12 flex justify-between items-center">
        <h1 class="text-4xl font-bold text-gray-800">Your Order History</h1>
        <a href="index.php" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all text-lg font-medium">🏠 Home</a>
    </section>

    <!-- Orders Table -->
    <section class="bg-white p-8 rounded-2xl shadow-2xl overflow-x-auto">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">📦 Orders</h2>
        
        <table class="w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-red-600 text-white">
                <tr class="text-center">
                    <th class="p-4 border-b text-lg">Order ID</th>
                    <th class="p-4 border-b text-lg">Customer Name</th>
                    <th class="p-4 border-b text-lg">Email</th>
                    <th class="p-4 border-b text-lg">Total Price</th>
                    <th class="p-4 border-b text-lg">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="text-center bg-red-50 hover:bg-red-100 transition-all ease-in-out duration-200">
                            <td class="p-4 border-b"><?= $row['id']; ?></td>
                            <td class="p-4 border-b"><?= htmlspecialchars($row['customer_name']); ?></td>
                            <td class="p-4 border-b"><?= htmlspecialchars($row['customer_email']); ?></td>
                            <td class="p-4 border-b"><?= number_format($row['total_price'], 2, '.', ''); ?></td>
                            <td class="p-4 border-b"><?= htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr class="text-center bg-red-50">
                        <td colspan="5" class="p-4 text-red-600 font-semibold">No orders found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>

<?php $conn->close(); ?>
