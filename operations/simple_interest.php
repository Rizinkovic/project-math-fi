<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Interest Calculation</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header include -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>


    <section>
    <div class="note">
        <h1>Simple Interest</h1>
        <p>Simple Interest is interest calculated on short terms (that is periods usually <= 1year)</p>
    </div>
    <div class="operation 1">
        <p class="notice">IMPORTANT NOTICE : It is possible to calculate time, rate, or AMount given other variables.</p>
        <label>Enter Amount, Time and Rate(%) :</label>
        <form method="POST">
            <label>Amount :</label>
            <input type="number" name="amount"/>
            <label>Time(Yrs) :</label>
            <input type="number" name="time"/>
            <label>Rate(%) :</label>
            <input type="number" name="rate"/>
            <label>Interest[Optional] :</label>
            <input type="number" name="interest"/>
            <button type="submit" class="btn">Calculate</button>
        </form>
    </div>
    <div class="answer">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $principal = $_POST["amount"];
            $time = $_POST["time"];
            $rate = $_POST["rate"];
            $interest = $_POST["interest"];

    }

    function findTime() {
        $principal = $_POST["amount"];
            $time = $_POST["time"];
            $rate = $_POST["rate"];
            $interest = $_POST["interest"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
             if (($principal && $interest && $rate > 0) && $time == null) {
            $time = ($interest * 100)/$principal * $rate;
            echo "<h2>Time taken = " . $rate . " years(s)</h2>"; 
        }
        }   
    }

    function findRate() {
        $principal = $_POST["amount"];
            $time = $_POST["time"];
            $rate = $_POST["rate"];
            $interest = $_POST["interest"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
             if (($principal && $interest && $time > 0) && $rate ==null ) {
            $rate = ($interest * 100)/$principal * $time;
            echo "<h2>Rate = " . $rate . " %</h2>"; 
        }
        }
    }

    function findAmount() {
        $principal = $_POST["amount"];
            $time = $_POST["time"];
            $rate = $_POST["rate"];
            $interest = $_POST["interest"];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
             if (($time && $interest && $rate > 0) && $principal == null) {
            $principal = ($interest * 100) / $rate * $time;
            echo "<h2>Principal(Initial AMount) = " . $principal . " </h2>";
        }
        }
    }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            

            if ($principal && $time && $rate > 0) {
                $simple_interest= $principal * ($rate / 100) * $time;
                echo "<h2>Simple Interest = " . $simple_interest . "</h2>";
            } elseif ($time == null) {
                findTime();
            } elseif ($rate == null) {
                findRate();
            } elseif ($principal == null) {
                findAmount();
            } else {
                echo"Enter a valid value";
            }

        }
    ?>

    </div>
    </section>
    
<!-- Footer include-->
    <div class="footer">
        <?php include './sub-footer.php'; ?>
    </div>
    <script src="./script.js"></script>
</section>
</body>
</html>