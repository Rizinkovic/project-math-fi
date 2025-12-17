<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Annuity Calculator</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>

    <div class="note">
        <h1>Loan Annuity</h1>
        <p>Calculate the annual payment for a loan and display the amortization schedule in a clean table. Enter the principal, interest rate, and loan term.</p>
    </div>

    <div class="operation">
        <form id="annuityForm">
            <label>Loan Amount ($):</label>
            <input type="number" name="loan" step="any" required placeholder="e.g. 10000" />

            <label>Annual Interest Rate (%):</label>
            <input type="number" name="rate" step="any" required placeholder="e.g. 5" />

            <label>Loan Term (Years):</label>
            <input type="number" name="years" step="1" required placeholder="e.g. 5" />

            <button type="submit" class="btn">Calculate</button>
        </form>
    </div>

    <div class="answer">
        <h2 id="annuityResult"></h2>
        <table id="scheduleTable" style="display:none; width:100%; margin-top:20px; border-collapse: collapse;">
            <thead>
                <tr style="background:#007BFF; color:white;">
                    <th>Year</th>
                    <th>Payment</th>
                    <th>Interest</th>
                    <th>Principal</th>
                    <th>Remaining Balance</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <?php include './sub-footer.php'; ?>
    </div>

    <script>
    document.getElementById('annuityForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const loan = parseFloat(this.loan.value);
        const rate = parseFloat(this.rate.value) / 100;
        const years = parseInt(this.years.value);
        const n = years;

        const annuity = loan * rate / (1 - Math.pow(1 + rate, -n));
        document.getElementById('annuityResult').innerText = 
            `Annual Payment: $${annuity.toFixed(2)}`;

        let balance = loan;
        const tableBody = document.querySelector('#scheduleTable tbody');
        tableBody.innerHTML = "";

        for (let i = 1; i <= n; i++) {
            const interest = balance * rate;
            const principal = annuity - interest;
            balance -= principal;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${i}</td>
                <td>$${annuity.toFixed(2)}</td>
                <td>$${interest.toFixed(2)}</td>
                <td>$${principal.toFixed(2)}</td>
                <td>$${Math.max(balance, 0).toFixed(2)}</td>
            `;
            tableBody.appendChild(row);
        }

        document.getElementById('scheduleTable').style.display = "table";
    });
    </script>
</body>
</html>
