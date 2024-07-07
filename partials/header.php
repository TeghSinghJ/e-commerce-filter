<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
    <title>E-commerce Website</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
		<a class="navbar-brand" href="#">E-commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            
        </div>
		</div>
    </nav>

    <div class="loading-overlay">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
	<script>
document.addEventListener('DOMContentLoaded', function() {
    var minPriceRange = document.getElementById('min_price');
    var maxPriceRange = document.getElementById('max_price');
    var minPriceValue = document.getElementById('min_price_value');
    var maxPriceValue = document.getElementById('max_price_value');
    minPriceValue.textContent = minPriceRange.value;
    maxPriceValue.textContent = maxPriceRange.value;
    minPriceRange.addEventListener('input', function() {
        minPriceValue.textContent = this.value;
    });

    maxPriceRange.addEventListener('input', function() {
        maxPriceValue.textContent = this.value;
    });
});
</script>

