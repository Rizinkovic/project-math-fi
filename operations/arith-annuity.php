<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arithmetic Annuity</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="header">
    <?php include './sub-header.php'; ?>
  </div>

  <div class="note">
    <h1>Arithmetic Annuity</h1>
    <p>Each payment increases by a fixed amount. Enter the first payment, the increase amount, number of periods, and interest rate.</p>
  </div>

  <div class="operation">
    <form id="arithForm">
      <label>First Payment A₁ ($):</label>
      <input type="number" name="a1" step="any" required placeholder="e.g. 1000" />
      <label>Increase d ($):</label>
      <input type="number" name="d" step="any" required placeholder="e.g. 50" />
      <label>Interest Rate i (%):</label>
      <input type="number" name="i" step="any" required placeholder="e.g. 6" />
      <label>Number of Periods (n):</label>
      <input type="number" name="n" required placeholder="e.g. 5" />
      <button class="btn">Calculate</button>
    </form>
  </div>

  <div class="answer">
    <h2 id="arithTotal"></h2>
    <table id="arithTable" style="display:none; width:100%; margin-top:20px;">
      <thead>
        <tr>
          <th>Period</th>
          <th>Payment (Aₜ)</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

  <div class="footer">
    <?php include './sub-footer.php'; ?>
  </div>

  <script>
    document.getElementById('arithForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const a1 = parseFloat(this.a1.value);
      const d = parseFloat(this.d.value);
      const i = parseFloat(this.i.value) / 100;
      const n = parseInt(this.n.value);

      const tbody = document.querySelector('#arithTable tbody');
      tbody.innerHTML = "";
      let total = 0;

      for (let t = 1; t <= n; t++) {
        const payment = a1 + (t - 1) * d;
        total += payment / Math.pow(1 + i, t);

        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${t}</td>
          <td>$${payment.toFixed(2)}</td>
        `;
        tbody.appendChild(row);
      }

      document.getElementById('arithTotal').innerText = `Present Value: $${total.toFixed(2)}`;
      document.getElementById('arithTable').style.display = 'table';
    });
  </script>
</body>
</html>
