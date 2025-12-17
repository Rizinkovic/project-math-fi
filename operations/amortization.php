<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Amortization Schedule</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <?php include './sub-header.php'; ?>
    </div>

    <div class="note">
        <h1>Loan Amortization</h1>
        <p>Enter the loan amount, annual interest rate, and term in years to calculate a monthly amortization schedule with constant payments.</p>
    </div>

    <div class="operation">
        <form id="amortizationForm">
            <label>Loan Amount ($):</label>
            <input type="number" name="loan" step="any" required placeholder="e.g. 10000" />

            <label>Annual Interest Rate (%):</label>
            <input type="number" name="rate" step="any" required placeholder="e.g. 6.5" />

            <label>Loan Term (Years):</label>
            <input type="number" name="years" step="1" required placeholder="e.g. 5" />

            <button type="submit" class="btn">Calculate</button>
        </form>
    </div>

    <div class="answer">
        <h2 id="amortizationResult"></h2>
        <table id="amortizationTable" style="display:none; width:100%; margin-top:20px; border-collapse: collapse;">
            <thead>
                <tr style="background:#007BFF; color:white;">
                    <th>Month</th>
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
    document.getElementById('amortizationForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const loan = parseFloat(this.loan.value);
        const annualRate = parseFloat(this.rate.value) / 100;
        const years = parseInt(this.years.value);
        const months = years * 12;
        const monthlyRate = annualRate / 12;

        const monthlyPayment = loan * monthlyRate / (1 - Math.pow(1 + monthlyRate, -months));
        document.getElementById('amortizationResult').innerText = 
            `Monthly Payment: $${monthlyPayment.toFixed(2)} over ${months} months`;

        let balance = loan;
        const tableBody = document.querySelector('#amortizationTable tbody');
        tableBody.innerHTML = "";

        for (let i = 1; i <= months; i++) {
            const interest = balance * monthlyRate;
            const principal = monthlyPayment - interest;
            balance -= principal;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${i}</td>
                <td>$${monthlyPayment.toFixed(2)}</td>
                <td>$${interest.toFixed(2)}</td>
                <td>$${principal.toFixed(2)}</td>
                <td>$${Math.max(balance, 0).toFixed(2)}</td>
            `;
            tableBody.appendChild(row);
        }

        document.getElementById('amortizationTable').style.display = "table";
    });
    </script>
</body>
</html>
