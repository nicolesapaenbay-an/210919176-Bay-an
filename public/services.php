<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CIT17 Project - Services</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

  <section class="services-list">
    <h2>Our Services</h2>

    <div class="filters">
      <h3>Filter by:</h3>
      <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="service_type">Service Type:</label>
        <select name="service_type" id="service_type">
          <option value="">All</option>
          </select>

        <label for="price_range">Price Range:</label>
        <select name="price_range" id="price_range">
          <option value="">All</option>
          <option value="0-50">$0 - $50</option>
          <option value="50-100">$50 - $100</option>
          <option value="100+">$100+</option>
        </select>

        <label for="duration">Duration:</label>
        <select name="duration" id="duration">
          <option value="">All</option>
          <option value="30">30 Minutes</option>
          <option value="60">60 Minutes</option>
          <option value="90">90 Minutes</option>
        </select>

        <button type="submit" class="btn">Apply Filters</button>
      </form>
    </div>

    

    <div class="services-container">
      <?php
      // ... (Fetch and display services with filtering and sorting logic) ...
      ?>
    </div>
  </section>

  <script src="js/script.js"></script>
</body>
</html>