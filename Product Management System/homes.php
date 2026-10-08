<?php
include "db.php";
session_start();

// 1. ADD TO CART LOGIC
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += 1;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }

    // Dynamic self-redirect 
    header("Location: " . $_SERVER['PHP_SELF'] . "?status=added");
    exit();
}

// 2. FETCH PRODUCTS LOGIC
$result = $conn->query("SELECT id, image, name, disc, price, category FROM menu");

$products = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// 3. CART COUNT LOGIC
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart_count += $qty;
    }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-Commerce Store Dashboard</title>

    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font  Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        body {
            padding-top: 75px;
            background-color: #0f172a;
            color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Styling */
        .navbar-custom {
            background-color: #1e293b !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* E-Commerce Premium Carousel Wrapper */
        .custom-carousel-wrapper {
            background: 
                radial-gradient(circle at 20% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.15) 0%, transparent 40%),
                linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            border-radius: 20px;
            padding: 30px 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        /* Carousel Product Cards */
        .carousel-product-card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .carousel-product-card:hover {
            transform: translateY(-6px);
            background: rgba(255, 255, 255, 0.08);
            border-color: #6366f1;
        }

        .carousel-img-wrapper {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .carousel-img {
            max-height: 100%;
            max-width: 100%;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Grid Main Product Cards */
        .store-card {
            background-color: #1e293b;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .store-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5);
            border-color: #6366f1;
        }

        .store-card-img-wrapper {
            height: 240px;
            overflow: hidden;
            background-color: #0f172a;
            position: relative;
        }

        .store-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .store-card:hover .store-card-img {
            transform: scale(1.06);
        }

        .category-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(99, 102, 241, 0.85);
            color: #fff;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
        }

        .price-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: #38bdf8;
        }

        .carousel-control-prev, .carousel-control-next {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev { left: -10px; }
        .carousel-control-next { right: -10px; }
    </style>
</head>

<body>
    <!-- Navbar Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="fa-solid fa-store text-primary me-2"></i>E-Shop Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php"><i class="fa-solid fa-house me-1"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add.php"><i class="fa-solid fa-plus me-1"></i> Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view.php"><i class="fa-solid fa-list me-1"></i> View Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="export.php"><i class="fa-solid fa-file-export me-1"></i> Export Data</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <a href="cart.php" class="btn btn-outline-primary btn-sm position-relative">
                            <i class="fa-solid fa-cart-shopping me-1"></i> Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $cart_count ?>
                            </span>
                        </a>
                        <form class="d-flex m-0" action="logout.php">
                            <button class="btn btn-outline-danger btn-sm" type="submit">
                                <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <div class="container-fluid px-4">
            
            <!-- Dynamic 5 Products Carousel -->
            <div class="custom-carousel-wrapper mb-5">
                <h5 class="text-white mb-4 fw-bold"><i class="fa-solid fa-fire text-warning me-2"></i> Featured Products</h5>
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                        if (!empty($products)) {
                            $chunks = array_chunk($products, 5); 
                            foreach ($chunks as $index => $chunk) { 
                        ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                                    <?php foreach ($chunk as $item) { ?>
                                        <div class="col">
                                            <div class="carousel-product-card">
                                                <div class="carousel-img-wrapper">
                                                    <img src="upload/.<?= htmlspecialchars($item['image']) ?>" class="carousel-img" alt="<?= htmlspecialchars($item['name']) ?>">
                                                </div>
                                                <div class="text-truncate fw-semibold text-white small"><?= htmlspecialchars($item['name']) ?></div>
                                                <div class="text-info fw-bold my-1">₹<?= htmlspecialchars($item['price']) ?></div>
                                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=add&id=<?= $item['id'] ?>" class="btn btn-primary btn-sm w-100">
                                                    <i class="fa-solid fa-cart-plus me-1"></i> Add
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php 
                            } 
                        } else {
                            echo "<p class='text-center text-muted'>No featured products available.</p>";
                        }
                        ?>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>

            <!-- E-Commerce Product Grid Section -->
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0 text-white"><i class="fa-solid fa-boxes-stacked text-primary me-2"></i> Product Catalog</h3>
                    <a href="add.php" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i> Add New Product</a>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <?php if (!empty($products)) { ?>
                        <?php foreach ($products as $row) { ?>
                            <div class="col">
                                <div class="store-card">
                                    <div class="store-card-img-wrapper">
                                        <span class="category-badge"><?= htmlspecialchars($row['category']) ?></span>
                                        <img class="store-card-img" src="upload/.<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                                    </div>
                                    <div class="card-body p-3">
                                        <h5 class="card-title text-white fw-bold text-truncate"><?= htmlspecialchars($row['name']) ?></h5>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <span class="price-text">₹<?= htmlspecialchars($row['price']) ?></span>
                                        </div>
                                        <hr class="border-secondary my-2">
                                        <div class="d-flex gap-2 mt-3">
                                            <!-- Fixed Dynamic Add to Cart Link -->
                                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=add&id=<?=$row['id']?>" class="btn btn-outline-light btn-sm flex-fill">
                                                <i class="fa-solid fa-cart-shopping me-1"></i> Add to Cart
                                            </a>               
                                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="col-12 text-center py-5">
                            <h4 class="text-muted">No products found in database.</h4>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </main>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>