<?php
include 'products.php';

$category = $_GET['category'] ?? '';
$minPrice = $_GET['min_price'] ?? 0;
$maxPrice = $_GET['max_price'] ?? 1000;
$salesStatus = $_GET['sales_status'] ?? '';
$page = $_GET['page'] ?? 1;

function getCategories($conn) {
    $result = $conn->query("SELECT DISTINCT category FROM products");
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
    }
    return $categories;
}

$categories = getCategories($conn);

$products = getProducts($category, $minPrice, $maxPrice, $salesStatus, $page);
include 'partials/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form id="filter-form" method="GET" action="index.php">
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select id="category" name="category" class="form-select">
                        <option value="">All</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $cat === $category ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="min_price" class="form-label">Min Price:</label>
                    <input type="range" class="form-range" id="min_price" name="min_price" min="0" max="1000" value="<?php echo htmlspecialchars($minPrice, ENT_QUOTES, 'UTF-8'); ?>">
                    <span id="min_price_value"><?php echo htmlspecialchars($minPrice, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>

                <div class="mb-3">
                    <label for="max_price" class="form-label">Max Price:</label>
                    <input type="range" class="form-range" id="max_price" name="max_price" min="0" max="1000" value="<?php echo htmlspecialchars($maxPrice, ENT_QUOTES, 'UTF-8'); ?>">
                    <span id="max_price_value"><?php echo htmlspecialchars($maxPrice, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>

                <div class="mb-3">
                    <label for="sales_status" class="form-label">Sales Status:</label>
                    <select id="sales_status" name="sales_status" class="form-select">
                        <option value="">All</option>
                        <option value="available" <?php echo $salesStatus === 'available' ? 'selected' : ''; ?>>Available</option>
                        <option value="out_of_stock" <?php echo $salesStatus === 'out_of_stock' ? 'selected' : ''; ?>>Out of Stock</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="col-md-9">
            <div class="row">
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($product['image'] ?? 'images/default.jpg', ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name'] ?? 'Product Image', ENT_QUOTES, 'UTF-8'); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($product['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <p class="card-text">Category: <?php echo htmlspecialchars($product['category'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                                    <p class="card-text">Price: $<?php echo htmlspecialchars($product['price'] ?? '0.00', ENT_QUOTES, 'UTF-8'); ?></p>
									<?php if ($product['sales_status'] === 'available'): ?>
									Status: <p class="card-text text-success">Available</p>
													<?php elseif ($product['sales_status'] === 'out_of_stock'): ?>
									Status: <p class="card-text text-danger">Out of Stock</p>
								<?php else: ?>
									<p class="card-text">Status: Unknown</p>
								<?php endif; ?>                                </div>
											</div>
										</div>
									<?php endforeach; ?>
								<?php else: ?>
									<p>No products found.</p>
								<?php endif; ?>
            </div>

            <nav>
                <ul class="pagination">
                    <?php
                    $totalProductsResult = $conn->query("SELECT COUNT(*) AS total FROM products WHERE 1=1");
                    $totalProducts = $totalProductsResult->fetch_assoc()['total'];
                    $totalPages = ceil($totalProducts / 12);

                    for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&category=<?php echo urlencode($category); ?>&min_price=<?php echo urlencode($minPrice); ?>&max_price=<?php echo urlencode($maxPrice); ?>&sales_status=<?php echo urlencode($salesStatus); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
