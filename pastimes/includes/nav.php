<?php
// Start session safely (only if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav style="display:flex;justify-content:space-between;align-items:center; padding:10px; background:#111;">

    <div>
        <a href="dashboard.php">🏠 Home</a>
        <a href="clothes.php">🛍 Shop</a>
        <a href="addClothes.php">➕ Sell</a>
        <a href="cart.php">🛒 Cart</a>
        <a href="orders.php">📦 Orders</a>
    </div>

    <div>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="logout.php">🚪 Logout</a>
        <?php else: ?>
            <a href="login.php">🔐 Login</a>
        <?php endif; ?>
    </div>

</nav>