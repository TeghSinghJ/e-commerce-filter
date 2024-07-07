<?php
include 'db.php';

// Function to fetch products with filters and pagination
function getProducts($category = null, $minPrice = null, $maxPrice = null, $salesStatus = null, $page = 1, $perPage = 12) {
    global $conn;

    // Start building the SQL query
    $sql = "SELECT * FROM products WHERE 1=1";

    // Add filters
    if (!empty($category)) {
        $sql .= " AND category = '" . $conn->real_escape_string($category) . "'";
    }
    if (!empty($minPrice)) {
        $sql .= " AND price >= " . $conn->real_escape_string($minPrice);
    }
    if (!empty($maxPrice)) {
        $sql .= " AND price <= " . $conn->real_escape_string($maxPrice);
    }
    if (!empty($salesStatus)) {
        $sql .= " AND sales_status = '" . $conn->real_escape_string($salesStatus) . "'";
    }

    // Pagination
    $offset = ($page - 1) * $perPage;
    $sql .= " LIMIT $offset, $perPage";

    // Execute query
    $result = $conn->query($sql);

    if ($result === false) {
        throw new mysqli_sql_exception("Query failed: " . $conn->error);
    }

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    return $products;
}
?>
