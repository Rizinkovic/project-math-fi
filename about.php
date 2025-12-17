// © 2025 Rizinkovic - All rights reserved
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About - Math FI Project</title>
    <link rel="stylesheet" href="./styles.css" />
    <style>
        .about-container {
            max-width: 900px;
            margin: 80px auto 60px; 
            padding: 20px;
            text-align: center;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .about-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #007BFF;
        }

        .project-description {
            font-size: 1.15rem;
            line-height: 1.6;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .developer-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .dev-photo {
            width: 80%;
            height: 150px;
            border-radius: 50%;
            background-color: #ddd; 
            background-position: center;
            background-size: cover;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-image: url('./assets/pfp.jpg');
    
        }

        .dev-info {
            max-width: 600px;
            font-size: 1.1rem;
            line-height: 1.5;
            color: #444;
        }

        @media (min-width: 600px) {
            .developer-section {
                flex-direction: row;
                text-align: left;
                gap: 40px;
            }

            .dev-info {
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <?php include './includes/header.php'; ?>
    </div>

    <main class="about-container">
        <h1 class="about-title">About Math FI Project</h1>
        <p class="project-description">
            Project MathFI is a practical web project designed to provide students and finance enthusiasts with easy access to various financial and mathematical calculators. It aims to simplify complex financial concepts through interactive tools, helping users understand and compute interest, annuities, amortization schedules, discounts, and more — all in one place.
        </p>

        <section class="developer-section">
            <div class="dev-photo" title="Your photo here - replace background-image in CSS"></div>
            <div class="dev-info">
                <h2>About the Developer</h2>
                <p>
                    Hello! I'm <strong>Richard</strong>, a junior web developer with a Bachelor's degree in Finance.  
                    I specialize in PHP, JavaScript, HTML, CSS, and SQL — combining finance knowledge with coding skills to build useful, intuitive web apps.  
                    This project reflects my passion for fintech and my goal to make financial education accessible and practical for everyone.
                </p>
            </div>
        </section>
    </main>

    <div class="footer">
        <?php include './includes/footer.php'; ?>
    </div>
    <script src="./script.js"></script>
</body>
</html>
