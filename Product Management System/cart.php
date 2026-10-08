<?php
include "db.php";
session_start();

$cart_items = [];
$total_amount = 0;

// Agar session me cart items hain to unka data DB se fetch karein
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $ids = implode(',', array_keys($_SESSION['cart']));
    
    if(!empty($ids)) {
        $result = $conn->query("SELECT * FROM menu WHERE id IN ($ids)");

        while ($row = $result->fetch_assoc()) {
            $row['qty'] = $_SESSION['cart'][$row['id']];
            $row['subtotal'] = $row['price'] * $row['qty'];
            $total_amount += $row['subtotal'];
            $cart_items[] = $row;
        }
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-dark text-white py-5">

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fa-solid fa-cart-shopping text-primary me-2"></i> Your Shopping Cart</h2>
        <a href="homes.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left me-1"></i> Continue Shopping</a>
    </div>

    <?php if (!empty($cart_items)) { ?>
        <div class="table-responsive bg-secondary bg-opacity-10 p-4 rounded-4 shadow">
            <table class="table table-dark table-hover align-middle text-center mb-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item) { ?>
                        <tr>
                            <td>
                                <img src="upload/.<?= htmlspecialchars($item['image']) ?>" width="60" height="60" class="rounded object-fit-cover">
                            </td>
                            <td class="fw-semibold"><?= htmlspecialchars($item['name']) ?></td>
                            <td><span class="badge bg-primary"><?= htmlspecialchars($item['category']) ?></span></td>
                            <td>₹<?= htmlspecialchars($item['price']) ?></td>
                            <td><span class="badge bg-info text-dark fs-6"><?= $item['qty'] ?></span></td>
                            <td class="text-info fw-bold">₹<?= $item['subtotal'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-secondary">
                <h4 class="fw-bold mb-0">Total Amount: <span class="text-success">₹<?= $total_amount ?></span></h4>
                <!-- <button class="btn btn-success btn-lg fw-semibold"><i class="fa-solid fa-credit-card me-2"></i> Proceed to Checkout</button> -->
                 <button class="btn btn-success btn-lg fw-semibold" onclick="placeDemoOrder()">
    <i class="fa-solid fa-credit-card me-2"></i> Proceed to Checkout
</button>

<script>
function placeDemoOrder() {
    alert("🎉 Order Placed Successfully!\nThank you for shopping with us.");
    window.location.href = 'homes.php';
}
</script>
            </div>
        </div>
    <?php } else { ?>
        <div class="text-center py-5 bg-secondary bg-opacity-10 rounded-4">
            <i class="fa-solid fa-basket-shopping display-1 text-muted mb-3"></i>
            <h4 class="text-muted mb-3">Your cart is empty!</h4>
            <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-store me-1"></i> Add Products Now</a>
        </div>
    <?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>