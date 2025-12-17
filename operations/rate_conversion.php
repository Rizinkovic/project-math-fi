<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Conversion</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header include -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>
    <h1>Rate Conversion</h1>
    <div class="note">
        <p>This section is dedicated to the conversion of rates.</p>
    </div>
    <div class="operation">
        <p><strong>Instruction: Input a rate and choose timeframe conversion (for proportional and equivalent rates only!)</strong></p>
        <form method="POST">
            <label>Input a rate:</label>
            <input type="number" name="rate" step="any" required />
            <select name="conversion-type" required>
                <option value="proportional">Proportional</option>
                <option value="equivalent">Equivalent</option>
                <option value="monthly">Monthly</option>
                <option value="weekly">Weekly</option>
                <option value="daily">Daily</option>
            </select>
            <label>Input a timeframe [<i>Optional</i>]: </label>
            <select name="timeframe">
                <option value="">Select Timeframe</option>
                <option value="months">Months</option>
                <option value="weeks">Weeks</option>
            </select>
            <button type="submit" class="btn">Calculate</button>
        </form>
    </div>
    <div class="answer">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rate = filter_input(INPUT_POST, 'rate', FILTER_VALIDATE_FLOAT);
            $conversion_type = $_POST["conversion-type"] ?? '';
            $timeframe = $_POST["timeframe"] ?? '';

            // Validate input
            if ($rate === false || $rate < 0) {
                echo "<h2>Error: Please enter a valid non-negative rate.</h2>";
                exit;
            }

            // Function to handle all conversions
            function calculateRate($rate, $conversion_type, $timeframe) {
                $result = null;
                $output = '';

                switch ($conversion_type) {
                    case 'monthly':
                        $result = $rate / 12;
                        $output = "<h2>Monthly Rate = " . number_format($result, 4) . "%</h2>";
                        break;
                    case 'weekly':
                        $result = $rate / 52;
                        $output = "<h2>Weekly Rate = " . number_format($result, 4) . "%</h2>";
                        break;
                    case 'daily':
                        $result = $rate / 365;
                        $output = "<h2>Daily Rate = " . number_format($result, 4) . "%</h2>";
                        break;
                    case 'proportional':
                        if ($timeframe === 'months') {
                            $result = $rate / 12;
                            $output = "<h2>Proportional Rate (Monthly) = " . number_format($result, 4) . "%</h2>";
                        } elseif ($timeframe === 'weeks') {
                            $result = $rate / 52;
                            $output = "<h2>Proportional Rate (Weekly) = " . number_format($result, 4) . "%</h2>";
                        } else {
                            $output = "<h2>Error: Please select a valid timeframe for proportional rate.</h2>";
                        }
                        break;
                    case 'equivalent':
                        if ($timeframe === 'months') {
                            $result = (pow(1 + $rate / 100, 1 / 12) - 1) * 100;
                            $output = "<h2>Equivalent Rate (Monthly) = " . number_format($result, 4) . "%</h2>";
                        } elseif ($timeframe === 'weeks') {
                            $result = (pow(1 + $rate / 100, 1 / 52) - 1) * 100;
                            $output = "<h2>Equivalent Rate (Weekly) = " . number_format($result, 4) . "%</h2>";
                        } else {
                            $output = "<h2>Error: Please select a valid timeframe for equivalent rate.</h2>";
                        }
                        break;
                    default:
                        $output = "<h2>Error: Invalid conversion type selected.</h2>";
                }
                return $output;
            }

            // Call the function and display result
            echo calculateRate($rate, $conversion_type, $timeframe);
        }
        ?>
    </div>

    <!-- Footer include-->
    <div class="footer">
        <?php include './sub-footer.php'; ?>
    </div>
    <script src="./script.js"></script>

</body>
</html>