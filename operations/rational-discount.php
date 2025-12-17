<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rational Discount</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>

    <div class="note">
        <h1>Rational Discount</h1>
        <p>Calculate the present value using rational discounting based on time and rate.</p>
    </div>

    <div class="operation">
        <form method="POST">
            <label>Nominal Value ($):</label>
            <input type="number" name="nominal" step="any" required placeholder="e.g. 1200" />
            <label>Annual Rate (%):</label>
            <input type="number" name="rate" step="any" required placeholder="e.g. 5" />
            <label>Time (in Years):</label>
            <input type="number" name="time" step="any" required placeholder="e.g. 2" />
            <button class="btn">Calculate</button>
        </form>
    </div>

    <div class="answer">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nominal = filter_input(INPUT_POST, 'nominal', FILTER_VALIDATE_FLOAT);
            $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT);
            $time = filter_input(INPUT_POST, 'time', FILTER_VALIDATE_FLOAT);

            if ($nominal <= 0 || $rate < 0 || $time <= 0) {
                echo "<h2 class='error'>Error: All inputs must be valid positive values.</h2>";
            } else {
                $present = $nominal / (1 + ($rate / 100) * $time);
                $discount = $nominal - $present;

                echo "<h2>Discount: $" . number_format($discount, 2) . "</h2>";
                echo "<h2>Present Value: $" . number_format($present, 2) . "</h2>";
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
// This code calculates the present value and discount using rational discounting based on user inputs for nominal value, rate, and time.