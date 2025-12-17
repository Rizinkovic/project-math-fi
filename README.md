📊 Project Math‑FI

> **Open source financial maths calculator** built with **PHP**, **JavaScript**, **HTML/CSS** for computing common financial formulas interactively online. ([GitHub][1])

---

## 🚀 Overview

**Project Math‑FI** is a lightweight web application that provides users with tools to perform financial and mathematical calculations through a responsive interface. It combines server‑side logic in **PHP** with dynamic front‑end interactions via **JavaScript** to compute results without full page refreshes.

---

## 📁 Repository Structure

```
project‑math‑fi/
├─ assets/                # Static assets (images, icons, fonts)
├─ includes/              # PHP include files (shared functions, headers/footers)
├─ operations/            # Logic for financial/math operations
├─ index.php              # Main application UI
├─ about.php              # About / project info page
├─ script.js              # Front‑end interaction logic
├─ styles.css             # Custom UI styles
└─ README.md              # Project documentation
```

---

## 🧠 Features

✔ Core financial calculation functions (e.g., interest, ROI, annuities)
✔ Clean, responsive UI built in PHP + CSS
✔ Dynamic input handling via JavaScript
✔ Modular folder structure for easy expansion
✔ No external dependencies required

---

## 🛠 Installation

1. **Clone the repo**

```sh
git clone https://github.com/Rizinkovic/project-math-fi.git
cd project-math-fi
```

2. **Setup a PHP server**

Use XAMPP / MAMP / LAMP or built‑in PHP server:

```sh
php -S localhost:8000
```

3. **Open in browser**

Navigate to:

```
http://localhost:8000/index.php
```

---

## 🧩 How It Works

### 🧾 Front‑End

* **index.php** — Main UI form for taking numeric inputs
* **script.js** — Listens for input events, validates values, and sends requests if needed
* **styles.css** — Custom styling for layout and components

### 🔁 Back‑End

* **operations/** — Houses calculation logic (e.g., formulas, business math logic)
* **includes/** — Shared helper files (sanitize inputs, constants, UI components)
* **PHP pages** — Render views and tie logic + UI

---

## 🧪 Example Usage

From the UI, users can:

* Calculate **interest earned** over time
* Compute **payment schedules**
* Evaluate **financial ratios**
* Compare different investment outcomes

*(Exact operations depend on the files in `operations/` — adjust this section to list them.)*

---

## 🧑‍💻 Contributing

Contributions are welcome. Suggested workflow:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/x`)
3. Commit changes (`git commit -m "Add new operation"`)
4. Push and open a pull request

---

## 📜 License

Specify the license (if any). If none, add:

```
This project is unlicensed — use at your own risk.
```

---

## 📌 Notes & Next Steps

* Add **unit tests** for operation functions
* Create **API endpoints** for AJAX responses
* Improve **styling / UX** with frameworks like Bootstrap or Tailwind
* Document each calculation with formula references

---

READMe written with ChatGPT but the entire website was coded by me.

[1]: https://github.com/Rizinkovic/project-math-fi "GitHub - Rizinkovic/project-math-fi: Open source financial maths calculator made with PHP & JavaScript."

