<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compound Interest Calculation</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header include -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>
    <div class="note">
        <h1>Compound Interest</h1>
        <p>Calculate compound interest or solve for principal, time, or rate. Enter three of the four values (Amount, Time, Rate, Total Amount) to calculate the missing one.</p>
    </div>
    <div class="operation">
        <form method="POST">
            <label>Principal Amount ($):</label>
            <input type="number" name="principal" step="any" placeholder="e.g., 1000" />
            <label>Time (Years):</label>
            <input type="number" name="time" step="any" placeholder="e.g., 2" />
            <label>Rate (%):</label>
            <input type="number" name="rate" step="any" placeholder="e.g., 5" />
            <label>Total Amount ($)[<i>Optional</i>]:</label>
            <input type="number" name="total_amount" step="any" placeholder="e.g., 1100" />
            <button type="submit" class="btn">Calculate</button>
        </form>
    </div>
    <div class="answer">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and validate inputs
            $principal = filter_input(INPUT_POST, 'principal', FILTER_VALIDATE_FLOAT);
            $time = filter_input(INPUT_POST, 'time', FILTER_VALIDATE_FLOAT);
            $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT);
            $total_amount = filter_input(INPUT_POST, 'total_amount', FILTER_VALIDATE_FLOAT);

            // Function to calculate compound interest
            function calculateCompoundInterest($principal, $rate, $time) {
                $amount = $principal * pow(1 + ($rate / 100), $time);
                $interest = $amount - $principal;
                return ['interest' => $interest, 'amount' => $amount];
            }

            // Function to calculate time
            function calculateTime($principal, $total_amount, $rate) {
                if ($principal <= 0 || $total_amount <= 0 || $rate <= 0) {
                    return false;
                }
                return log($total_amount / $principal) / log(1 + ($rate / 100));
            }

            // Function to calculate rate
            function calculateRate($principal, $total_amount, $time) {
                if ($principal <= 0 || $total_amount <= 0 || $time <= 0) {
                    return false;
                }
                return (pow($total_amount / $principal, 1 / $time) - 1) * 100;
            }

            // Function to calculate principal
            function calculatePrincipal($total_amount, $rate, $time) {
                if ($total_amount <= 0 || $rate <= 0 || $time <= 0) {
                    return false;
                }
                return $total_amount / pow(1 + ($rate / 100), $time);
            }

            // Count non-empty inputs
            $inputs = array_filter([$principal, $time, $rate, $total_amount], function($value) {
                return $value !== false && $value !== null;
            });
            $input_count = count($inputs);

            // Validate inputs
            if ($input_count !== 3) {
                echo "<h2 class='error'>Error: Please provide exactly three of the four values (Principal, Time, Rate, Total Amount).</h2>";
            } else {
                // Calculate based on missing input
                if ($total_amount === false || $total_amount === null) {
                    if ($principal <= 0 || $rate <= 0 || $time <= 0) {
                        echo "<h2 class='error'>Error: Principal, Rate, and Time must be positive numbers.</h2>";
                    } else {
                        $result = calculateCompoundInterest($principal, $rate, $time);
                        echo "<h2>Compound Interest = $" . number_format($result['interest'], 2) . "</h2>";
                        echo "<h2>Total Amount = $" . number_format($result['amount'], 2) . "</h2>";
                    }
                } elseif ($time === false || $time === null) {
                    $time = calculateTime($principal, $total_amount, $rate);
                    if ($time === false) {
                        echo "<h2 class='error'>Error: Invalid inputs for calculating time. Ensure all values are positive.</h2>";
                    } else {
                        echo "<h2>Time = " . number_format($time, 2) . " years</h2>";
                    }
                } elseif ($rate === false || $rate === null) {
                    $rate = calculateRate($principal, $total_amount, $time);
                    if ($rate === false) {
                        echo "<h2 class='error'>Error: Invalid inputs for calculating rate. Ensure all values are positive.</h2>";
                    } else {
                        echo "<h2>Rate = " . number_format($rate, 2) . "%</h2>";
                    }
                } elseif ($principal === false || $principal === null) {
                    $principal = calculatePrincipal($total_amount, $rate, $time);
                    if ($principal === false) {
                        echo "<h2 class='error'>Error: Invalid inputs for calculating principal. Ensure all values are positive.</h2>";
                    } else {
                        echo "<h2>Principal = $" . number_format($principal, 2) . "</h2>";
                    }
                }
            }
        }
        ?>
    </div>
<!-- Footer include-->
    <div class="footer">
        <?php include './sub-footer.php'; ?>
    </div>
    <script src="./script.js"></script>
</section>
</body>
</html>