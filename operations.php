// © 2025 Rizinkovic - All rights reserved
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Operations - MathFi</title>
    <link rel="stylesheet" href="./styles.css"> 
</head>
<body>
    
    <!-- Header include -->
    <div class="header">
        <?php include 'includes/header.php'; ?>
    </div>

    <!-- Main content -->
    <div class="main-operations">
        <h1>List of All Operations</h1>
        <ol class="operation-list">
            <li><a href="./operations/simple_interest.php">Simple Interest</a></li>
            <li><a href="./operations/compound_interest.php">Compound Interest</a></li>
            <li><a href="./operations/rate_conversion.php">Rate Conversion</a></li>
            <li><a href="./operations/annuity.php">Annuity Calculations</a></li>
            <li><a href="./operations/amortization.php">Amortization Schedule</a></li>
            <li><a href="./operations/arith-annuity.php">Arithmetic Annuity</a></li>
            <li><a href="./operations/geo-annuity.php">Geometric Annuity</a></li>
            <li><a href="./operations/rational-discount.php">Rational Discounting</a></li>
            <li><a href="./operations/trade-discount.php">Trade Discount</a></li>
        </ol>
    </div>

    <!-- Footer include -->
    <div class="footer">
        <?php include 'includes/footer.php'; ?>
    </div>
<script src="./script.js"></script>
</body>
</html>
