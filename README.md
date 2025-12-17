Project Math FiOpen Source Financial Mathematics CalculatorProject Math Fi is a lightweight, open-source web-based calculator designed for performing common financial mathematics calculations. Built with PHP for server-side processing and JavaScript for interactive client-side functionality, it provides an easy-to-use interface for students, professionals, and anyone needing quick financial computations.FeaturesMultiple financial calculation tools (e.g., compound interest, annuities, depreciation, NPV, IRR, and more – modularly organized)
Clean and responsive user interface
Client-side interactivity via JavaScript
Server-side calculation logic in PHP for accuracy and security
Modular structure for easy extension of new operations

Project Structure

project-math-fi/
├── index.php          # Main entry point – calculator homepage and interface
├── about.php          # About page with project information
├── operations.php     # Central handler or router for financial operations
├── script.js          # Client-side JavaScript for dynamic interactions
├── styles.css         # Styling for the user interface
├── assets/            # Static assets (images, icons, etc.)
├── includes/          # Reusable PHP components (headers, footers, functions, config)
└── operations/        # Individual modules/files for specific financial calculations

Technologies UsedPHP (81%) – Core backend logic and calculations
JavaScript (2%) – Frontend interactivity
CSS (14%) – Styling and responsive design

Installation & UsageSince this is a PHP-based web application, you can run it locally or deploy it to any PHP-enabled web server.Local DevelopmentPrerequisites:PHP 7.4+ (or higher)
A web server (e.g., Apache or Nginx) or built-in PHP server
(Optional) Composer if dependencies are added later

Setup:bash

git clone https://github.com/Rizinkovic/project-math-fi.git
cd project-math-fi

Run Locally:
Use PHP's built-in server:bash

php -S localhost:8000

Then open http://localhost:8000 in your browser.
Deployment:
Upload the files to any PHP-hosted web server. No database is required (as of current version).

ContributingContributions are welcome! Feel free to:Add new financial operations in the operations/ directory
Improve UI/UX in styles.css or script.js
Fix bugs or enhance performance

Please follow standard GitHub workflow:Fork the repository
Create a feature branch
Commit your changes
Open a Pull Request

LicenseThis project is open source and available under the MIT License (LICENSE) (or add one if not present).Made with  for financial math enthusiasts.
If you find this useful, consider giving it a  on GitHub!

