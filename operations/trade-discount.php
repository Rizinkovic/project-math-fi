<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Discount</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>

    <div class="note">
        <h1>Trade Discount</h1>
        <p>Calculate the net price after applying a trade discount.</p>
    </div>

    <div class="operation">
        <form method="POST">
            <label>Nominal Value ($):</label>
            <input type="number" name="nominal" step="any" required placeholder="e.g. 1000" />
            <label>Discount Rate (%):</label>
            <input type="number" name="rate" step="any" required placeholder="e.g. 10" />
            <button class="btn">Calculate</button>
        </form>
    </div>

    <div class="answer">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nominal = filter_input(INPUT_POST, 'nominal', FILTER_VALIDATE_FLOAT);
            $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT);

            if ($nominal <= 0 || $rate < 0) {
                echo "<h2 class='error'>Error: Please enter valid positive values.</h2>";
            } else {
                $discount = $nominal * ($rate / 100);
                $net = $nominal - $discount;

                echo "<h2>Discount: $" . number_format($discount, 2) . "</h2>";
                echo "<h2>Net Price: $" . number_format($net, 2) . "</h2>";
            }
        }
        ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        <?php include './sub-footer.php'; ?>
    </div>
</body>
</html>
