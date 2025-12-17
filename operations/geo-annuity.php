<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Geometric Annuity</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="header">
    <?php include './sub-header.php'; ?>
  </div>

  <div class="note">
    <h1>Geometric Annuity</h1>
    <p>Enter initial payment, growth rate, interest rate, and number of periods. The annuity grows by a fixed percentage each period.</p>
  </div>

  <div class="operation">
    <form id="geoForm">
      <label>Initial Payment A₁ ($):</label>
      <input type="number" name="a1" step="any" required placeholder="e.g. 1000" />
      <label>Growth Rate g (%):</label>
      <input type="number" name="g" step="any" required placeholder="e.g. 5" />
      <label>Interest Rate i (%):</label>
      <input type="number" name="i" step="any" required placeholder="e.g. 8" />
      <label>Number of Periods (n):</label>
      <input type="number" name="n" required placeholder="e.g. 5" />
      <button class="btn">Calculate</button>
    </form>
  </div>

  <div class="answer">
    <h2 id="geoTotal"></h2>
    <table id="geoTable" style="display:none; width:100%; margin-top:20px;">
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
    document.getElementById('geoForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const a1 = parseFloat(this.a1.value);
      const g = parseFloat(this.g.value) / 100;
      const i = parseFloat(this.i.value) / 100;
      const n = parseInt(this.n.value);

      const tbody = document.querySelector('#geoTable tbody');
      tbody.innerHTML = "";
      let total = 0;

      for (let t = 1; t <= n; t++) {
        const payment = a1 * Math.pow(1 + g, t - 1);
        total += payment / Math.pow(1 + i, t);

        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${t}</td>
          <td>$${payment.toFixed(2)}</td>
        `;
        tbody.appendChild(row);
      }

      document.getElementById('geoTotal').innerText = `Present Value: $${total.toFixed(2)}`;
      document.getElementById('geoTable').style.display = 'table';
    });
  </script>
</body>
</html>
